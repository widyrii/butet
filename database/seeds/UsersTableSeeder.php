<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = new User;
        $user1->name = "Ari";
        $user1->email = "ari@gmail.com";
        $user1->password = bcrypt('ari');
        $user1->type = "admin";
        $user1->save();

        $user2 = new User;
        $user2->name = "Widya";
        $user2->email = "widya@gmail.com";
        $user2->password = bcrypt('widya');
        $user2->type = "user";
        $user2->save();
    }
}