<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Volunteer;
use App\Services\Facades\UserService;
use App\Services\Facades\VolunteerService;

class VolunteerApiController extends Controller{

    public function all(){
        $volunteers = Volunteer::with('units', 'actions')->orderBy('name', 'ASC')->get();
        //$volunteers->setPath(\URL::to('/') . '/volunteers');

        $permittedVolunteers = VolunteerService::permittedVolunteersIds();

        $data = VolunteerService::prepareForDataTable($volunteers);

        return [  "data" => $data ];
    }


}
