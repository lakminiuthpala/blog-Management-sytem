<?php

namespace Database\Seeders;

use App\Models\DeviceType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeviceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $deviceTypes = [
            ['type' => 'pos'],
            ['type' => 'kiosk'],
            ['type' => 'digital signage'],
        ];

        foreach ($deviceTypes as $deviceType) {
            DeviceType::updateOrCreate([
                'type' => $deviceType['type']
            ]);
        }
    }
}
