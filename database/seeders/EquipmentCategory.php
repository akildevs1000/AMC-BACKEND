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
            ['name' => 'CCTV'],
            ['name' => 'Access Control'],
            ['name' => 'Gate Barrier'],
            ['name' => 'Intercom'],
            ['name' => 'Alarm'],
        ]);

        // php artisan db:seed --class=EquipmentCategory
    }
}
