<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Log;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'address1', 'address2',
        'city', 'province', 'postal_code', 'accepts_communication',
        'club_id', 'shirt_size'
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

    public function club() {
        return $this->belongsTo(Club::class);
    }

    public function competitionAdmins() {
        return $this->belongsToMany(Competition::class, 'competitions_admins');
    }

    public function competitions() {
        return $this->hasMany(Competition::class, 'creator');
    }

    public function isSuperAdmin() {
        return $this->admin == 1;
    }

    public function isCompetitionAdmin(Competition $competition) {
        if ($this->id == $competition->creator) {
            return true;
        }

        foreach ($this->competitionAdmins as $comp) {
            if ($comp->id == $competition->id) {
                return true;
            }
        }
        return false;
    }
}
