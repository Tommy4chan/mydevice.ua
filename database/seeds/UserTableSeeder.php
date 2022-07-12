<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('users')->delete();

        DB::table('users')->insert(array (
            0 =>
            array (
                'created_at' => '2022-06-18 11:05:24',
                'email' => 'tommy4chan@gmail.com',
                'email_verified_at' => NULL,
                'id' => 1,
                'is_admin' => 1,
                'name' => 'Anton Panurin',
                'password' => '$2y$10$tHoUIJRExniUlaMDJZW0.eetAdO3EfjgPf06A7iN2s2ktpeudziGy',
                'remember_token' => 'hVkT75c00zk3CUXosuoJLq7lHgHYJyTe0qJaPKuxkJ7znS2gr9I3CnBqBSqv',
                'updated_at' => '2022-06-18 11:05:24',
            ),
            1 =>
            array (
                'created_at' => '2022-06-18 11:22:15',
                'email' => 'stasilacraft@gmail.com',
                'email_verified_at' => NULL,
                'id' => 2,
                'is_admin' => 0,
                'name' => 'Панурин Антон Сергійович',
                'password' => '$2y$10$Giww8zUT7HsyrZvbu2LYiu3Klw2RkuhMm8iAenHZQl/eT4MJzOtli',
                'remember_token' => 'OKCf4Y9dPYxAtDal2cx4axWVLcvdUG9YzmuwFEUOuBWMSezRg5V6pt5m9VjB',
                'updated_at' => '2022-06-18 11:22:15',
            ),
            2 =>
            array (
                'created_at' => NULL,
                'email' => 'admin@example.com',
                'email_verified_at' => NULL,
                'id' => 3,
                'is_admin' => 1,
                'name' => 'Адмін',
                'password' => '$2y$10$5139LDSO7cZqlIygdS6JwuMrzBV.Lzzh8uVmIIf3J4n210F5Yj05C',
                'remember_token' => 'Llp5s29loVT2XMuv3AiSF86KbtfETTifuJ33fxm7ahhlGiJG5tZdhIVizu5l',
                'updated_at' => NULL,
            ),
        ));


    }
}
