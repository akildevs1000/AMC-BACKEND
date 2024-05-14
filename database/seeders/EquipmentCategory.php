<?php

namespace Database\Seeders;

use App\Models\EquipmentCategory as ModelsEquipmentCategory;
use Illuminate\Database\Seeder;

class EquipmentCategory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsEquipmentCategory::truncate();

        ModelsEquipmentCategory::insert([
            ['name' => 'CCTV', 'slug' => 'cctv'],
            ['name' => 'Access Control', 'slug' => 'access_control'],
            ['name' => 'Gate Barrier', 'slug' => 'gate_barrier'],
            ['name' => 'Intercom', 'slug' => 'intercom'],
            ['name' => 'Alarm', 'slug' => 'alarm'],
            ['name' => 'Automatic Door', 'slug' => 'automatic_door'],
            ['name' => 'Time Attendance', 'slug' => 'time_attendance'],

        ]);

        // php artisan db:seed --class=EquipmentCategory
    }
}
