<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jobs')->insert([

            [
                'title' => 'Laravel Developer',
                'description' => 'We are hiring a Laravel developr',
                'created_at' => '2020-02-11 11:20:30',
                'salary' => '30-40k',
                'location' => 'Merul Badda, Dhaka',
                'country' => 'Bangladesh',
                'deadline' => '2020-10-11 11:20:30'
            ],
            [
                'title' => 'Vue Js Developer',
                'description' => 'We are hiring a Vue Js developr',
                'created_at' => '2020-02-11 11:20:30',
                'salary' => '45-50k',
                'location' => 'Nikunjo 2, Dhaka',
                'country' => 'Bangladesh',
                'deadline' => '2020-10-11 11:20:30'
            ],
            [
                'title' => 'Javascript Developer',
                'description' => 'We are hiring a Javascript developr',
                'created_at' => '2020-02-11 11:20:30',
                'salary' => '20-25k',
                'location' => 'Uttara, Dhaka',
                'country' => 'Bangladesh',
                'deadline' => '2020-10-11 11:20:30'
            ],
            [
                'title' => 'PHP Developer',
                'description' => 'We are hiring a PHP developr',
                'created_at' => '2020-02-11 11:20:30',
                'salary' => '30-40k',
                'location' => 'Mogbazar, Dhaka',
                'country' => 'Bangladesh',
                'deadline' => '2020-10-11 11:20:30'
            ],
            [
                'title' => 'React js Developer',
                'description' => 'We are hiring a React developr',
                'created_at' => '2020-02-11 11:20:30',
                'salary' => '30-40k',
                'location' => 'Merul Badda, Dhaka',
                'country' => 'Bangladesh',
                'deadline' => '2020-10-11 11:20:30'
            ],
            [
                'title' => 'Angular js Developer',
                'description' => 'We are hiring a Angular Js developr',
                'created_at' => '2020-02-11 11:20:30',
                'salary' => '30-40k',
                'location' => 'Malibagh, Dhaka',
                'country' => 'Bangladesh',
                'deadline' => '2020-10-11 11:20:30'
            ],                  

        ]);
    }
}
