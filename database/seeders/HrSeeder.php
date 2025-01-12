<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class HrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hr_user = new User();
        $hr_user->name = "Admin";
        $hr_user->email = "hr@admin.bh";
        $hr_user->password = Hash::make(env('HR_PASSWORD'));
        $hr_user->save();
    }
}
