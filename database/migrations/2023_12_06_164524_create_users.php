<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->tinyInteger('bedrooms');
            $table->float('price');
            $table->tinyInteger('bathrooms');
            $table->smallInteger('storeys');
            $table->tinyInteger('garages');
        });

        $this->importCsv();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }

    private function importCsv() {
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
};
