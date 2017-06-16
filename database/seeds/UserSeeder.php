<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $admin = new User();

        $admin->fill([

            'email' => 'admin@admin.com',
            'name'   => 'admin'

        ]);

        $admin->password = 'adminadmin';

        $admin->save();

    }

}
