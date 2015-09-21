<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    // A user is allowed to mass assign
    protected $fillable = ['first_name', 'last_name', 'age', 'slug', 'profile_image'];

    // Specifying that a staff member has one workphone
    public function workphone() {
    	return $this->hasOne('App\WorkphoneModel');
    }
}
