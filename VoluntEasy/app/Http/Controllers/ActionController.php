<?php namespace App\Http\Controllers;

use App\Http\Requests\ActionRequest as ActionRequest;
use App\Models\Action;
use App\Models\ActionVolunteerHistory;
use App\Models\Unit;
use App\Services\Facades\ActionService;
use App\Services\Facades\UnitService;
use App\Services\Facades\UserService;
use App\Services\Facades\VolunteerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ActionController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $actions = Action::with('unit', 'volunteers')->get();

        foreach($actions as $action){
            $action->unit->branch = UnitService::getBranchString($action->unit);
        }

       // $actions->setPath(\URL::to('/') . '/actions');

        $userUnits = UserService::userUnits();

        return view("main.actions.list", compact('actions', 'userUnits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        $tree = UnitService::getTree();

        $userUnits = UserService::userUnits();

        return view('main.actions.create', compact('tree', 'userUnits'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ActionRequest $request
     * @return Response
     */
    public function store(ActionRequest $request) {


        $request['start_date'] = \Carbon::createFromFormat('d/m/Y', $request->start_date);
        $request['end_date'] = \Carbon::createFromFormat('d/m/Y', $request->end_date);
        $action = Action::create($request->all());

        if ($request->ajax())
            return $action->unit_id;
        else
            return Redirect::route('action/one', ['id' => $action->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id) {
        $action = Action::with('volunteers', 'unit')->findOrFail($id);

        $branch = UnitService::getBranch(Unit::where('id', $action->unit->id)->with('actions')->first());

        //get the volunteer ids in an array for the select box
        $volunteerIds = VolunteerService::volunteerIds($action->volunteers);

        //get all volunteers to show in select box
        $volunteers = VolunteerService::permittedAvailableVolunteers();
       // $volunteers = VolunteerService::permittedVolunteers();

        $userUnits = UserService::userUnits();

        return view('main.actions.show', compact('action', 'volunteers', 'volunteerIds', 'userUnits', 'branch'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id) {
        $action = Action::where('id', $id)->first();

        $tree = UnitService::getTree();

        $userUnits = UserService::userUnits();

        return view('main.actions.edit', compact('action', 'tree', 'userUnits'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ActionRequest $request
     * @return Response
     */
    public function update(ActionRequest $request) {
        $action = Action::findOrFail($request->get('id'));

        $request['start_date'] = \Carbon::createFromFormat('d/m/Y', $request->start_date);
        $request['end_date'] = \Carbon::createFromFormat('d/m/Y', $request->end_date);

        $action->update($request->all());

        return Redirect::route('action/one', ['id' => $action->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id) {
        $action = Action::findOrFail($id);
        $action->load('volunteers');

        //if the action has volunteers, do not delete
        if (sizeof($action->volunteers) > 0) {
            Session::flash('flash_message', 'Η δράση περιέχει εθελοντές και δεν μπορεί να διαγραφεί.');
            Session::flash('flash_type', 'alert-danger');

            return Redirect::back();
        }

        $action->delete();

        return Redirect::to('actions');
    }

    /**
     * Search all actions
     *
     * @return mixed
     */
    public function search() {
        $actions = ActionService::search();

        $userUnits = UserService::userUnits();

        $view = \View::make('main.actions.list')->with('actions', $actions)->with('userUnits', $userUnits);
        return $view->renderSections()['table'];
    }





// public function addUsers(Request $request) {
//     $unit = Unit::findOrFail($request->get('id'));

//     $unit->users()->sync($request->get('users'));

//     $users = User::whereIn('id', $request->get('users'))->get();
//     foreach ($users as $user) {
//         NotificationService::addNotification($user->id, 1, 'you are added to Unit: '.$unit->description, "athensIndymedia", $user->id, $unit->id);
//     }
//     return $unit->id;
// }

    /**
     * Sync the action volunteers with the db.
     *
     * @param Request $request
     * @return mixed
     */
    public function addVolunteers(Request $request) {

        $action = Action::whereId($request->get('id'))->first();

        //if there are no volunteers, remove all
        if (sizeof($request->get('volunteers')) == 0) {
            $action->volunteers()->detach();
        } else {
            $oldVolunteersOfAction = $action->volunteers()->get()->lists('id');

            $action->volunteers()->sync($request->get('volunteers'));

            // add new volunteers to history
            foreach ($request->get('volunteers') as $volunteer) {
                if (!in_array($volunteer, $oldVolunteersOfAction)) {
                    $historyTable = new ActionVolunteerHistory;
                    $historyTable->volunteer_id = $volunteer;
                    $historyTable->action_id = $action->id;
                    $historyTable->user_id = \Auth::user()->id;
                    $historyTable->save();
                }
            }
        }

        return $action->id;
    }


}
