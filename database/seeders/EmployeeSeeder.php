<?php

namespace Database\Seeders;

use App\Models\Companies;
use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $companies = Companies::all();

        for ($i = 0; $i < 20; $i++) {
            $randomCompanyId = $companies->random()->id;
            Employee::create([
                'name' => $faker->firstName,
                'lastname' => $faker->lastName,
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->unique()->phoneNumber,
                'company_id' => $randomCompanyId,
            ]);
        }
    }
}
