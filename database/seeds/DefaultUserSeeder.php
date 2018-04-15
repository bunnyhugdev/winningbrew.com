<?php

use App\User;
use Illuminate\Database\Seeder;

class DefaultUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->first_name = "Default";
        $user->last_name = "User";
        $user->email = "test@winningbrew.com";
        $user->password = bcrypt("password");
        $user->address1 = "default";
        $user->city = "default";
        $user->province = "DF";
        $user->postal_code = "X0X0X0";
        $user->admin = true;

        $user->save();
    }
}
