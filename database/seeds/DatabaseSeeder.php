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

        DB::table('brands')->insert([
            ['name' => 'Harmonics Arts'],
            ['name' => 'Nature Made'], 
            ['name' => 'CVS'],
            ['name' => 'Webber Naturals'],

        ]);

        DB::table('healthsymptoms')->insert([
            ['name' => 'Inflammation'],
            ['name' => 'Stress/Energy'], 
            ['name' => 'Sleep'],
            ['name' => 'Heart Health'],
            ['name' => 'Liver Cleansing'], 
            ['name' => 'Regularity'], 
            ['name' => 'Adrenal Fatigue'],

        ]);


        DB::table('roles')->insert([
            ['name' => 'User'],
            ['name' => 'Admin'],
        ]);

        DB::table('taxes')->insert([
            [
                'province' => 'Alberta',
                'ratetype' => 'GST',
                'taxrate' => 0.05,
            ],
            ['province' => 'British Columbia',
                'ratetype' => 'GST+PST',
                'taxrate' => 0.12,

            ], 
            ['province' => 'Manitoba',
                'ratetype' => 'GST+PST',
                'taxrate' => 0.13,
            ],
            ['province' => 'New Brunswick',
                'ratetype' => 'HST',
                'taxrate' => 0.15,
            ],
            ['province' => 'Newfoundland and Labrador',
                'ratetype' => 'HST',
                'taxrate' => 0.15,
            ],
            ['province' => 'Northwest Territories',
                'ratetype' => 'GST',
                'taxrate' => 0.05,
            ],
            ['province' => 'Nova Scotia',
                'ratetype' => 'HST',
                'taxrate' => 0.15,
            ],
            ['province' => 'Nunavut',
                'ratetype' => 'GST',
                'taxrate' => 0.05,
            ],
            ['province' => 'Ontario',
                'ratetype' => 'HST',
                'taxrate' => 0.13,
            ],
            ['province' => 'Prince Edward Island',
                'ratetype' => 'HST',
                'taxrate' => 0.15,
            ],
            ['province' => 'Quebec',
                'ratetype' => 'GST + QST',
                'taxrate' => 0.14975,
            ],
            
            ['province' => 'Saskatchewan',
                'ratetype' => 'GST + PST',
                'taxrate' => 0.11,
            ],
            ['province' => 'Yukon',
                'ratetype' => 'GST',
                'taxrate' => 0.05,
            ],
        ]);

    }
}

