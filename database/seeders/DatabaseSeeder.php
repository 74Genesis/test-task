<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (($open = fopen(dirname(__FILE__) . "/data/property-data.csv", "r")) !== false) {
            $i = 0;
            while (($data = fgetcsv($open, 1000, ",")) !== false) {
                if (!$i++) continue;
                DB::table('users')->insert(
                    [
                        'name' => $data[0],
                        'price' => floatval($data[1]),
                        'bedrooms' => intval($data[2]),
                        'bathrooms' => intval($data[3]),
                        'storeys' => intval($data[4]),
                        'garages' => intval($data[5]),
                    ]
                );
            }
        
            fclose($open);
        }
    }
}
