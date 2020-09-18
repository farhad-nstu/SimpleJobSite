<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComapanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            [
                'first_name' => 'Super',
                'last_name' => 'Admin',
                'business_name' => 'NamespaceIt',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('namespaceit'),
            ],                 
        ]);
    }
}
