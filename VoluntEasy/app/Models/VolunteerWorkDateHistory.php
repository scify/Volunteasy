<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class VolunteerWorkDateHistory extends Model {

    protected $table = 'volunteer_work_date_history';

    protected $fillable = ['volunteer_id', 'work_date_id'];

}
