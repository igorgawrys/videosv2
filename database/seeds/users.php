<?php

use Illuminate\Database\Seeder;
use App\User;
class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "demo";
        $user->email = "demo@example.com";
        $user->password = bcrypt("1234");
        $user->images = "img/profil.png";
        $user->save();
    }
}
