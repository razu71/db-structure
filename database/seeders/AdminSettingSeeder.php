<?php

namespace Database\Seeders;

use App\Models\AdminSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdminSetting::create(['key' => 'title', 'value' => 'Rabiul Islam']);
        AdminSetting::create(['key' => 'logo', 'value' => 'logo.png']);
    }
}
