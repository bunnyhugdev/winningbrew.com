<?php

namespace App\Policies;

use App\User;

use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy {
    use HandlesAuthorization;

    public function __construct() {
        //
    }

    public function update(User $userEditing, User $userToEdit) {
        return $userEditing->id == $userToEdit->id;
    }

    public function profile(User $userViewing, User $userToView) {
        return $userViewing->id == $userToView->id;
    }
}
