<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'address1', 'address2',
        'city', 'province', 'postal_code', 'accepts_communication',
        'club_id', 'shirt_size', 'provider', 'provider_id',
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

    public function accounts() {
        return $this->hasMany(LinkedSocialAccount::class);
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
