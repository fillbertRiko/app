<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Tao data cho bang user_accounts
        DB::table('user_account')->insert([
            'AccountID' => 1,
            'UsernameAcc' => 'admin',
            'PasswordAcc' => 'admin',
        ]);
    }
}
