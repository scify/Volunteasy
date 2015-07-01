<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Volunteer;
use App\Services\Facades\VolunteerService;
use App\Http\Requests\VolunteerFormRequest as VolunteerFormRequest;
use Illuminate\Support\Facades\Redirect;
use DB;

class VolunteerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function all()
    {
        $vol = Volunteer::all();

        $vol->load('availabilityFrequencies', 'availabilityTimes', 'driverLicenceType', 'identificationType', 'maritalStatus', 'interests');

        $vol->load('languages.level', 'languages.language');

        $vol->load('actions.steps.status');

        return $vol;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('main.volunteers.list');
    }

    /**
     * Display new volunteer form
     *
     * @return \Illuminate\View\View
     */
    public function newVolunteer()
    {
        return view('main.volunteers.new');
    }


    /**
     * Display volunteer statistics
     *
     * @return \Illuminate\View\View
     */
    public function statistics()
    {
        return view('main.volunteers.statistics');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public
    function create()
    {
	    $identityTypes = DB::table('identification_types')->lists('description', 'id');
	    $driverLicenses = DB::table('driver_license_types')->lists('description', 'id');
	    $maritalTypes = DB::table('marital_statuses')->lists('description', 'id');
	    $languages = DB::table('languages')->lists('description', 'id');
	    $lang_levels = DB::table('language_levels')->lists('description', 'id');
	    $work_statuses = DB::table('work_statuses')->lists('description', 'id');
	    $availability_freqs = DB::table('availability_freqs')->lists('description', 'id');
	    $availability_times = DB::table('availability_time')->lists('description', 'id');
	    $genders = DB::table('genders')->lists('description', 'id');
	    $comm_method = DB::table('comm_method')->lists('description', 'id');
	    $ed_level = DB::table('education_levels')->lists('description', 'id');
	    return view('main.volunteers.new')->with('id_type', $identityTypes)->with('driver_license_type', $driverLicenses)->with('marital_status', $maritalTypes)->with('languages', $languages)->with('lang_levels', $lang_levels)->with('work_statuses', $work_statuses)->with('availability_freqs', $availability_freqs)->with('availability_times', $availability_times)->with('genders', $genders)->with('comm_method', $comm_method)->with('ed_level', $ed_level);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public
    function store(VolunteerFormRequest $request)
    {
	    // dd($request->all());
	    Volunteer::create($request->all());

	    return Redirect::to('volunteers/listview');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public
    function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public
    function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public
    function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public
    function destroy($id)
    {
        //
    }

    public function getNew(){
        return VolunteerService::getNew();
    }

}
