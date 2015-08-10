<?php namespace App\Services;

use App\Models\Descriptions\StepStatus;
use App\Models\Descriptions\VolunteerStatus;
use App\Models\Unit;
use App\Models\User;
use App\Models\Volunteer;
use App\Models\VolunteerActionHistory;
use App\Models\VolunteerStepStatus;
use App\Models\VolunteerUnitHistory;
use App\Services\Facades\NotificationService;
use App\Services\Facades\SearchService as Search;
use App\Services\Facades\UnitService as UnitServiceFacade;
use App\Services\Facades\UserService;
use App\Services\Facades\UserService as UserServiceFacade;

class VolunteerService {

    /**
     * This array holds the names of the filters that the user is able to search by.
     * Filters correspond to column names.
     * @var array
     */
    //private $filters = [ 'name', 'last_name', 'email', 'marital_status_id' ];
    private $filters = [
        'name' => 'like%',
        'last_name' => 'like%',
        'email' => '=',
        'marital_status_id' => '=',
        'gender_id' => '=',
        'city' => '=',
        'country' => '=',
        'age-range' => '',
        'phoneNumber' => '',
        'education_level_id' => '=',
        'unit_id' => '',
        'my_volunteers' => '',
        'status_id' => '',
        'interest_id' => '',

    ];


    /**
     * From a list of volunteers, get a list of ids.
     *
     * @param $volunteers
     * @return mixed
     */
    public function volunteerIds($volunteers) {
        $ids = [];

        foreach ($volunteers as $volunteer)
            array_push($ids, $volunteer->id);

        return $ids;
    }

    /**
     * Get the volunteer ids of the currently logged in user.
     * A user can view all the volunteers but may only edit the volunteers
     * that are directly beneath his/her unit.
     * If the user is assigned to the root unit, return all volunteers.
     *
     * @return array
     */
    public function permittedVolunteers() {
        $permittedVolunteers = [];

        //check if the logged in user is assigned to root unit.
        //then return all the users since the admin is able to edit all of them.
        $root = UnitServiceFacade::getRoot();

        $user = User::unit($root->id)->where('id', \Auth::user()->id)->get();

        //user is admin/assigned to root
        if (sizeof($user) > 0) {
            $volunteers = Volunteer::all();
            foreach ($volunteers as $volunteer)
                array_push($permittedVolunteers, $volunteer);
        } else {
            //get the user's units with their immediate children (first level)
            //and their volunteers
            $user = User::where('id', \Auth::user()->id)->with('units.children.volunteers')->first();

            //loop through each unit and its children and add the user ids to the array
            //very klassy. will this be refactored? only the future will show...
            foreach ($user->units as $unit) {
                if (sizeof($unit->children) > 0) {
                    foreach ($unit->children as $child) {
                        if (sizeof($child->volunteers) > 0) {
                            foreach ($child->volunteers as $volunteer) {
                                if (!in_array($volunteer, $permittedVolunteers))
                                    array_push($permittedVolunteers, $volunteer);
                            }
                        }
                    }
                }
                if (sizeof($unit->volunteers) > 0) {
                    foreach ($unit->volunteers as $volunteer) {
                        if (!in_array($volunteer, $permittedVolunteers))
                            array_push($permittedVolunteers, $volunteer);
                    }
                }
            }
        }
        return $permittedVolunteers;
    }

    /**
     * Get only the ids of the permitted users
     *
     * @return array
     */
    public function permittedVolunteersIds() {
        $volunteers = $this->permittedVolunteers();
        $permittedVolunteersIds = [];

        foreach ($volunteers as $i => $volunteer)
            $permittedVolunteersIds[$i] = intval($volunteer->id);

        return $permittedVolunteersIds;
    }

    public function permittedAvailableVolunteers() {
        //dd($this->permittedVolunteersIds());

        $volunteers = Volunteer::available($this->permittedVolunteersIds());
        return $volunteers;
    }


    /**
     * Set the volunteer status of each unit.
     * We keep the volunteer status to the pivot table
     * 'volunteer_unit_status' to easily retrieve it.
     * We set it to the json object array to easily display
     * at the front end.
     *
     * @param $volunteer
     * @return mixed
     */
    public function setStatusToUnits($volunteer) {

        foreach ($volunteer->units as $unit) {

            $statusId = \DB::table('volunteer_unit_status')
                ->select('volunteer_status_id')
                ->where('volunteer_id', $volunteer->id)
                ->where('unit_id', $unit->id)->first()->volunteer_status_id;

            $status = VolunteerStatus::findOrFail($statusId)->description;
            $unit->status = $status;
        }

        return $volunteer;
    }


    /**
     * Get volunteers based on a given status.
     *
     * Statuses may be:
     *
     * 1: upo entaksi/pending
     * 2: dia8esimoi/not in any action, have completed all steps for a certain unit
     * 3: energoi/active/currently in an action
     * 4: mh dia8esimoi/akatallhloi/blacklisted/a manually set status
     * 0: unassigned/new
     *
     * @param $statusId
     * @param null $unitId
     * @return mixed
     */
    public function volunteersByStatus($statusId, $unitId = null) {

        $volunteers = [];

        switch ($statusId) {
            case '1':
                $tmpArray = Volunteer::pending();
                foreach ($tmpArray as $tmp)
                    array_push($volunteers, $tmp->id);
                break;
            case '2':
                $volunteers = Volunteer::available()->lists('id'); //not ok
                break;
            case '3':
                $volunteers = Volunteer::active()->lists('id');
                break;
            case '4':
                $volunteers = Volunteer::blacklisted()->lists('id');
                break;
            case '5':
                $volunteers = Volunteer::unassigned()->lists('id');
                break;
        }

        return $volunteers;
    }


    /**
     * Get the volunteer units and their actions,
     * only if the user is assigned to any of the units' actions.
     *
     * @param $id
     * @return mixed
     */
    public function fullProfile($id) {

        $volunteer = Volunteer::with('gender', 'identificationType', 'driverLicenceType',
            'educationLevel', 'languages.level', 'languages.language',
            'interests', 'workStatus', 'availabilityTimes', 'availabilityFrequencies', 'actions', 'ratings', 'unitsExcludes')
            ->with(['units.steps.statuses' => function ($query) use ($id) {
                $query->where('volunteer_id', $id)->with('status');
            }])
            ->with('units.children', 'units.actions')
            ->findOrFail($id);

        $unitsExcludes = $volunteer->unitsExcludes->lists('id');
        $assignedUnits = $volunteer->units->lists('id');

        //this is basically a hack.
        //in the front end we want to display a list of the available units for each unit
        //that the volunteer can be assigned to, that is the unit's children
        //so we create an array holding all the units info.
        foreach ($volunteer->units as $unit) {
            if (!in_array($unit->id, $unitsExcludes)) {
                $children = [];

                foreach ($unit->children as $child) {
                    if (!in_array($child->id, $unitsExcludes) && !in_array($child->id, $assignedUnits))
                        $children[$child->id] = $child->description;
                }
                $unit->availableUnits = $children;
            }
        }

        //another hack, similar to the above.
        //we also want to display all available units that the volunteer can be assigned to.
        //these are the units that the current user has access to
        //minus the units that the volunteer is already assigned to
        //minus the units that the volunteer is excluded from
        $availableUnits = [];

        //if the volunteer has no units, then
        //the only available unit should be the root one.
        if (sizeof($volunteer->units) == 0) {
            $root = UnitServiceFacade::getRoot();
            $availableUnits[$root->id] = $root->description;
        } else {
            //the query
            $user = User::with(['units' => function ($q) use ($unitsExcludes, $assignedUnits) {
                $q->whereNotIn('id', $unitsExcludes)->whereNotIn('id', $assignedUnits)
                    ->with(['children' => function ($q) use ($unitsExcludes, $assignedUnits) {
                        $q->whereNotIn('id', $unitsExcludes)
                            ->whereNotIn('id', $assignedUnits);
                    }]);
            }])->findOrFail(\Auth::user()->id);

            //create an array of the above json
            $availableUnits = [];
            foreach ($user->units as $unit) {
                $availableUnits[$unit->id] = $unit->description;

                foreach ($unit->children as $child)
                    $availableUnits[$child->id] = $child->description;
            }
        }

        $volunteer->availableUnits = $availableUnits;

        return $volunteer;
    }

    /**
     * For a volunteer, get the info from the history tables
     * and add them to an array to easily display the data at the front end
     *
     * @param $volunteerId
     * @return array[]
     */
    public function timeline($volunteerId) {


        $volunteer = Volunteer::with('actionHistory.user')
            ->with('unitHistory.user')
            ->with(['actionHistory.action' => function ($query) use ($volunteerId) {
                $query->withTrashed()->with(['rating' => function ($query) use ($volunteerId) {
                    $query->where('volunteer_id', $volunteerId);
                }]);
            }])
            ->with(['unitHistory.unit' => function ($query) use ($volunteerId) {
                $query->withTrashed()->with(['steps' => function ($query) use ($volunteerId) {
                    $query->withTrashed()->with(['statuses' => function ($query) use ($volunteerId) {
                        $query->where('volunteer_id', $volunteerId)->with('status');
                    }]);
                }]);
            }])
            ->findOrFail($volunteerId);

        $timeline = [];

        foreach ($volunteer->actionHistory as $actionHistory) {
            $actionHistory->type = 'action';
            array_push($timeline, $actionHistory);
        }

        foreach ($volunteer->unitHistory as $unitHistory) {
            $unitHistory->type = 'unit';
            array_push($timeline, $unitHistory);
        }

        //sort the array by date
        usort($timeline, function ($a, $b) {
            return $a->created_at > $b->created_at ? -1 : 1;
        });

        return $timeline;
    }


    /**
     * Update the step status to the given status (Complete, Incomplete)
     *
     * @return mixed
     */
    public function updateStepStatus($stepStatusId, $status, $comments, $assignTo) {
        //the id of the status, either Complete or Incomplete
        $statusId = StepStatus::where('description', $status)->first()->id;

        $stepStatus = VolunteerStepStatus::find($stepStatusId);
        $stepStatus->comments = $comments;
        $stepStatus->assignedTo = $assignTo;
        $stepStatus->step_status_id = $statusId;
        $stepStatus->save();

        return $stepStatus;
    }

    /**
     * Change the volunteer's unit status.
     * For example change to active f volunteer
     * is assigned to an action
     * or change back to available if volunteer is removed from action.
     *
     * @param $volunteerId
     * @param $unitId
     * @param $statusId
     */
    public function changeUnitStatus($volunteerId, $unitId, $statusId) {

        \DB::table('volunteer_unit_status')
            ->where('volunteer_id', $volunteerId)
            ->where('unit_id', $unitId)
            ->update(['volunteer_status_id' => $statusId]);

        return;
    }


    /**
     * Add a volunteer to the root unit
     * and also create the steps that are needed (status set to incomplete)
     *
     * @param $id
     * @return bool
     */
    public function addToRootUnit($id) {

        if (UserServiceFacade::isUserAdmin()) {

            $rootUnit = UnitServiceFacade::getRoot();
            $rootUnit->load('steps');

            $volunteer = Volunteer::where('id', $id)->with('steps.status')->first();

            //check if the steps already exist
            if (sizeof(array_diff($rootUnit->steps->lists('id'), $volunteer->steps->lists('step_id')))) {

                $incompleteStatus = StepStatus::where('description', 'Incomplete')->first();

                //for each step of the unit, create a step, set its status to incomplete
                //and assign to volunteer
                $steps = [];
                foreach ($rootUnit->steps as $step) {
                    array_push($steps, new VolunteerStepStatus([
                        'step_id' => $step->id,
                        'step_status_id' => $incompleteStatus->id
                    ]));
                }
                $volunteer->steps()->saveMany($steps);
            }

            $rootUnit->volunteers()->attach($volunteer, ['volunteer_status_id' => VolunteerStatus::pending()]);

            $this->unitHistory($volunteer->id, $rootUnit->id);

            return true;
        } else {
            return false;
        }
    }


    /**
     * Add a volunteer to a unit
     * and also create the steps that are needed (status set to incomplete).
     * Also send notifications to the users that are aasigned to that unit.
     *
     * @return mixed
     */
    public function addToUnit($unitId, $parentUnitId = null, $volunteerId) {

        //check if the user assigned the volunteer to his/her unit
        //or to a child unit
        if ($parentUnitId != null && $unitId == $parentUnitId) {

            //if the volunteer is assigned to current unit, just change the status to available
            $volunteerStatus = VolunteerStatus::where('description', 'Available')->first()->id;

            $this->changeUnitStatus($volunteerId, $unitId, $volunteerStatus);

        } else {

            //get the pending volunteer status
            $volunteerStatus = VolunteerStatus::where('description', 'Pending')->first()->id;

            //get the unit's steps and the volunteer steps
            $unit = Unit::with('steps')->findOrFail($unitId);
            $volunteer = Volunteer::with('steps.status')->findOrFail($volunteerId);

            //check if the steps already exist
            //if they don't exist, then create the steps,
            //and set their status to pending
            if (sizeof(array_diff($unit->steps->lists('id'), $volunteer->steps->lists('step_id'))) != 0) {

                $incompleteStatus = StepStatus::where('description', 'Incomplete')->first();

                //for each step of the unit, create a step, set its status to incomplete
                //and assign to volunteer
                $steps = [];
                foreach ($unit->steps as $step) {
                    array_push($steps, new VolunteerStepStatus([
                        'step_id' => $step->id,
                        'step_status_id' => $incompleteStatus->id
                    ]));
                }
                //append the steps to the volunteer
                $volunteer->steps()->saveMany($steps);

            } else {

                //if the steps already exists, that means that the volunteer has already passed the steps
                //and can be assigned directly to unit without creating steps

                //TODO: CHECK THIS!!!
                $volunteerId = $volunteer->id;

                $steps = $unit->steps->lists('id');

                $volunteer = Volunteer::with(['steps' => function ($query) use ($steps) {
                    $query->whereIn('step_id', $steps)->with('status');
                }])->findOrFail($volunteerId);


                //check if there are any pending steps
                $pending = 0;
                foreach ($volunteer->steps as $step) {
                    if ($step->status->description == 'Pending')
                        $pending++;
                }

                //if the volunteer has pending steps on that unit, then the status is pending
                //else the status is available
                if ($pending == 0)
                    $volunteerStatus = VolunteerStatus::where('description', 'Available')->first()->id;
            }

            //if the user is assigned to a child unit, then detach it from its parent
            if (\Request::has('parent_unit_id') && \Request::get('parent_unit_id') != '') {
                $parentUnit = Unit::find(\Request::get('parent_unit_id'));
                $parentUnit->volunteers()->detach($volunteer->id);
            }

            //attach the volunteer to the unit with the appropriate status
            //status can be either pending, if the volunteer has never completed the steps for that unit before
            //or available, if the volunteer has completed the steps
            $unit->volunteers()->attach($volunteer, ['volunteer_status_id' => $volunteerStatus]);

            //also add an entry to the history table
            $this->unitHistory($volunteer->id, $unit->id);
        }

        //notify users about new volunteers
        NotificationService::newVolunteer($volunteerId, $unitId);

        return $volunteerId;
    }


    /**
     * When assigning a volunteer to a unit,
     * also save an entry to the history table
     *
     * @param $volunteerId
     * @param $unitId
     */
    public function unitHistory($volunteerId, $unitId) {

        $unitHistory = new VolunteerUnitHistory([
            'volunteer_id' => $volunteerId,
            'unit_id' => $unitId,
            'user_id' => \Auth::user()->id,
            'created' => \Carbon::now()
        ]);

        $unitHistory->save();
    }

    /**
     * When assigning a volunteer to an action,
     * also save an entry to the history table
     *
     * @param $volunteerId
     * @param $actionId
     */
    public function actionHistory($volunteerId, $actionId) {

        $actionHistory = new VolunteerActionHistory([
            'volunteer_id' => $volunteerId,
            'action_id' => $actionId,
            'user_id' => \Auth::user()->id,
            'created' => date('Y-m-d H:i:s')
        ]);

        $actionHistory->save();
    }

    /**
     * After adding the datatables plugin,
     * we need to prepare the data before sending it to the client
     *
     * @param $volunteers
     * @return mixed
     */
    public function prepareForDataTable($volunteers) {
        $permittedVolunteers = VolunteerService::permittedVolunteersIds();

        $data = [];

        //check if user is root
        $root = false;
        if (sizeof(UserService::isUserAdmin()) > 0)
            $root = true;

        //get the status of each unit to display to the list
        //and also check if the current user is permitted to edit the volunteer
        foreach ($volunteers as $volunteer) {
            $volunteer = VolunteerService::setStatusToUnits($volunteer);
            if (in_array($volunteer->id, $permittedVolunteers))
                $volunteer->permitted = true;
            else
                $volunteer->permitted = -false;

            if ($root && sizeof($volunteer->units) == 0)
                $volunteer->assignToRoot = true;
            else$volunteer->assignToRoot = false;

            array_push($data, $volunteer);
        }

        return $data;
    }

    /**
     * Dynamic search chains a lot of queries depending on the filters sent by the user.
     *
     * @return mixed
     */
    public function search() {

        if (\Input::has('my_volunteers')) {
            $permittedVolunteersIds = $this->permittedVolunteersIds();
            $query = Volunteer::whereIn('id', $permittedVolunteersIds);

        } else
            $query = Volunteer::select();


        if (\Input::has('status_id') && !Search::notDropDown(\Input::get('status_id'), 'status_id')) {
            $query = Volunteer::whereIn('id', $this->volunteersByStatus(\Input::get('status_id')));
        }

        foreach ($this->filters as $column => $filter) {
            if (\Input::has($column) && \Input::get($column) != "") {
                $value = \Input::get($column);
                switch ($filter) {
                    case '=':
                        if (!Search::notDropDown($value, $column))
                            $query->where($column, '=', $value);
                        break;
                    case 'like%':
                        $query->where($column, 'like', $value . '%');
                        break;
                    case '':
                        switch ($column) {
                            case 'age-range':
                                $ages = explode("-", $value);

                                $date = date('Y-m-d');
                                $newdate = strtotime('-' . $ages[0] . ' year', strtotime($date));
                                $ages[0] = date('Y-m-j', $newdate);
                                $date = date('Y-m-d');
                                $newdate = strtotime('-' . $ages[1] . ' year', strtotime($date));
                                $ages[1] = date('Y-m-j', $newdate);

                                $query->whereBetween('birth_date', [$ages[1], $ages[0]]);
                                break;
                            case 'phoneNumber':
                                $query->where('home_tel', \Input::get('phoneNumber'))
                                    ->orWhere('work_tel', \Input::get('phoneNumber'))
                                    ->orWhere('cell_tel', \Input::get('phoneNumber'));
                                break;
                            case 'unit_id':
                                if (!Search::notDropDown($value, $column)) {
                                    $id = \Input::get('unit_id');
                                    $query->whereHas('units', function ($query) use ($id) {
                                        $query->where('unit_id', $id);
                                    });
                                }
                                break;
                            case 'interest_id':
                                if (!Search::notDropDown($value, $column)) {
                                    $id = \Input::get('interest_id');
                                    $query->whereHas('interests', function ($query) use ($id) {
                                        $query->where('interest_id', $id);
                                    });
                                }
                                break;
                        }
                    default:
                        //  dd('default switch');
                        break;
                }
            }
        }

        $result = $query->with('actions', 'units')->orderBy('name', 'ASC')->get();
        // $result->setPath(\URL::to('/') . '/volunteers');

        /*
                //get the status of each unit to display to the list
                foreach ($result as $volunteer) {
                    $volunteer = VolunteerService::setStatusToUnits($volunteer);
                }

                return $result;
        */

        $data = $this->prepareForDataTable($result);

        return ["data" => $data];
    }

}
