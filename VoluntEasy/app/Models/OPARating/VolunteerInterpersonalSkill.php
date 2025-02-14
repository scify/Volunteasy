<?php namespace App\Models\OPARating;

use Illuminate\Database\Eloquent\Model;

class VolunteerInterpersonalSkill extends Model {

    use \SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $table = 'volunteer_opa_interpersonal_skills';

    protected $fillable = ['comments', 'needsImprovement', 'intp_skill_id', 'opa_rating_id'];

    public function skill(){
        return $this->hasOne('App\Models\OPARating\InterpersonalSkill', 'id', 'intp_skill_id');
    }

}
