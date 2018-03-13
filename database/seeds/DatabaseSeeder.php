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
        // $this->call(UsersTableSeeder::class);
        DB::table('categories')->insert([
            ['name' => 'Medication'],
            ['name' => 'Vitamins'],
        ]);

        DB::table('statuses')->insert([
            ['name' => 'Order Pending'],
            ['name' => 'Processing'], 
            ['name' => 'Completed/Shipped'],
            ['name' => 'Cancelled'],
            ['name' => 'Error'],
            ['name' => 'On Hold'],
            ['name' => 'Refunded'],
        ]);

        DB::table('roles')->insert([
            ['name' => 'User'],
            ['name' => 'Admin'],
        ]);

    }
}

