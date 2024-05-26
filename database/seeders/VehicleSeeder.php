<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Faker\Provider\Fakecar;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $fakeCar = new FakeCar($faker);

        foreach (range(1, 10) as $index) {
            $vehicleData = $fakeCar->vehicleArray();
            
            DB::table('vehicles')->insert([
                'brand' => $vehicleData['brand'],
                'model' => $vehicleData['model'],
                'plate_number' => $fakeCar->vehicleRegistration(),
                'insurance_date' => $faker->dateTimeBetween('now', '+1 year')->format('d-m-Y'),
                
            ]);
        }
    }
}
