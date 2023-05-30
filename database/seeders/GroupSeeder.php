<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Group;
class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groups=[
            ['name'=>'DEV 101'],
            ['name'=>'DEV 102'],
            ['name'=>'DEV 103'],
            ['name'=>'DEV 201'],
            ['name'=>'DEV 202'],
            ['name'=>'DEV 203'],
        ];
        foreach ($groups as $group) {
            Group::create($group);
        }
    }
}
