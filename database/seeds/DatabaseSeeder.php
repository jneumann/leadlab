<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
			DB::table('users')->insert([
				'name' => 'Jake',
				'email' => 'shinythebald@gmail.com',
				'password' => bcrypt('admin'),
				'view_company_leads' => true,
				'edit_users' => true,
			]);
			DB::table('users')->insert([
				'name' => 'User',
				'email' => 'user@gmail.com',
				'password' => bcrypt('admin'),
				'view_company_leads' => false,
				'edit_users' => false,
			]);
    }
}
