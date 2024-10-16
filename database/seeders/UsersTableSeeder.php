<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('users')->delete();

        \DB::table('users')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'deepanjalee kathriarachchi',
                'email' => 'admin@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$IR/hDjma6rWsmdUBp4KjoerRsRWLqPV/4YngQwqqL68dRGZcs9sPS',
                'remember_token' => NULL,
                'created_at' => '2024-10-16 06:06:59',
                'updated_at' => '2024-10-16 06:06:59',
                'user_type' => '1',
                'mobile' => '0772785854',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
                'deleted_at' => NULL,
            )
        ));


    }
}
