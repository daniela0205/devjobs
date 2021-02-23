<?php

use App\Experience;
use App\Salary;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UserSeed::class);
         $this->call(CategorySeed::class);
         $this->call(ExperienceSeeder::class);
         $this->call(LocationSeeder::class);
         $this->call(SalarySeeder::class);

    }
}
