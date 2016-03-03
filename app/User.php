<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'address1', 'address2',
        'city', 'province', 'postal_code', 'accepts_communication'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function entries() {
        return $this->hasMany(Entry::class);
    }

    public function payments() {
        return $this->hasMany(Payment::class);
    }
}
