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

        User::create([

            'name' => 'duongtuanqb',
            'password' => bcrypt('111'),
            'email' => 'duonganhtuantk@gmail.com',
            'role' => 'admin',
            'ngaydangky' => new DateTime(),

            ]);
        User::create([

            'name' => 'duongtuanqb1',
            'password' => bcrypt('111'),
            'email' => 'duonganhtuantk1@gmail.com',
            'role' => 'admin',
            'ngaydangky' => new DateTime(),

            ]);
        User::create([

            'name' => 'duongtuanqb2',
            'password' => bcrypt('111'),
            'email' => 'duonganhtuantk2@gmail.com',
            'role' => 'admin',
            'ngaydangky' => new DateTime(),

            ]);
        User::create([

            'name' => 'duongtuanqb3',
            'password' => bcrypt('111'),
            'email' => 'duonganhtuantk3@gmail.com',
            'role' => 'admin',
            'ngaydangky' => new DateTime(),

            ]);
        User::create([

            'name' => 'duongtuanqb4',
            'password' => bcrypt('111'),
            'email' => 'duonganhtuantk4@gmail.com',
            'role' => 'admin',
            'ngaydangky' => new DateTime(),

            ]);
        User::create([

            'name' => 'duongtuanqb5',
            'password' => bcrypt('111'),
            'email' => 'duonganhtuantk5@gmail.com',
            'role' => 'admin',
            'ngaydangky' => new DateTime(),

            ]);
        User::create([

            'name' => 'duongtuanqb6',
            'password' => bcrypt('111'),
            'email' => 'duonganhtuantk6@gmail.com',
            'role' => 'admin',
            'ngaydangky' => new DateTime(),

            ]);
        User::create([

            'name' => 'duongtuanqb7',
            'password' => bcrypt('111'),
            'email' => 'duonganhtuantk7@gmail.com',
            'role' => 'admin',
            'ngaydangky' => new DateTime(),

            ]);
        User::create([

            'name' => 'duongtuanqb8',
            'password' => bcrypt('111'),
            'email' => 'duonganhtuantk8@gmail.com',
            'role' => 'admin',
            'ngaydangky' => new DateTime(),

            ]);
        User::create([

            'name' => 'duongtuanqb9',
            'password' => bcrypt('111'),
            'email' => 'duonganhtuantk9@gmail.com',
            'role' => 'admin',
            'ngaydangky' => new DateTime(),

            ]);
        User::create([

            'name' => 'duongtuanqb10',
            'password' => bcrypt('111'),
            'email' => 'duonganhtuantk10@gmail.com',
            'role' => 'admin',
            'ngaydangky' => new DateTime(),

            ]);
        User::create([

            'name' => 'duongtuanqb11',
            'password' => bcrypt('111'),
            'email' => 'duonganhtuantk11@gmail.com',
            'role' => 'admin',
            'ngaydangky' => new DateTime(),

            ]);
        User::create([

            'name' => 'duongtuanqb12',
            'password' => bcrypt('111'),
            'email' => 'duonganhtuantk12@gmail.com',
            'role' => 'admin',
            'ngaydangky' => new DateTime(),

            ]);
        User::create([

            'name' => 'duongtuanqb13',
            'password' => bcrypt('111'),
            'email' => 'duonganhtuantk13@gmail.com',
            'role' => 'admin',
            'ngaydangky' => new DateTime(),

            ]);

    }
}
