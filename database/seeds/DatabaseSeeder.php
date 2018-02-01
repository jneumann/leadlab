<?php

use App\content;
use Faker\Factory;
use Illuminate\Database\Seeder;

// TODO Seperate seeds to separte files
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
			$faker = Factory::create();

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

			for ($i = 0; $i < 10; $i++) {
				DB::table('leads')->insert([
					'first_name' => $faker->firstName,
					'last_name' => $faker->lastName,
					'email' => $faker->email,
					'phone1' => $faker->phoneNumber,
					'income' => $faker->numberBetween(20000, 1000000),
				]);
			}

			$content_model = new Content;
			for ($i = 0; $i < 5; $i++) {
				$content_model->save([
					'title' => $faker->sentence(),
					'content' => $faker->paragraph(),
					'type' => 'Page',
				]);
			}

			for ($i = 0; $i < 5; $i++) {
				$content_model->save([
					'title' => $faker->sentence(),
					'content' => $faker->paragraph(),
					'type' => 'Post',
				]);
			}

			$content_model->save([
				'title' => $faker->sentence(),
				'content' => $faker->paragraph(),
				'type' => 'Landing Page',
			]);

			DB::table('categories')->insert([
				'title' => 'Finances',
				'description' => '',
			]);
			DB::table('categories')->insert([
				'title' => 'First Time Homebuyer',
				'description' => '',
			]);
			DB::table('categories')->insert([
				'title' => 'Credit Improvement',
				'description' => '',
			]);
			DB::table('categories')->insert([
				'title' => 'Retirement',
				'description' => '',
			]);
    }
}
