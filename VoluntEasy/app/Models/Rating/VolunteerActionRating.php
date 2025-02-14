<?php namespace App\Models\Rating;

use Illuminate\Database\Eloquent\Model;

class VolunteerActionRating extends Model {
    
    protected $table = 'volunteer_action_ratings';

    protected $fillable = ['volunteer_id', 'action_rating_id', 'hours', 'minutes', 'comments', 'user_id'];


    public function ratings()
    {
        return $this->hasMany('App\Models\Rating\Rating', 'volunteer_action_rating_id', 'id');
    }

    public function volunteer()
    {
        return $this->belongsTo('App\Models\Volunteer');
    }
}
