<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'name',
        'email',
        'profile_image_path',
        'status'
    ];

    /* accessors */

    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = ucwords(mb_strtolower($value, "UTF-8"));
    }

    public function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] = ucwords(mb_strtolower($value, "UTF-8"));
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords(mb_strtolower($value, "UTF-8"));
    }

    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = mb_strtolower($value, "UTF-8");
    }

    /* methods */

    public function removeProfileImage()
    {
        if ($this->profile_image_path !== "assets/img/avatars/default.png") 
            removeImage($this->profile_image_path);
    }

}
