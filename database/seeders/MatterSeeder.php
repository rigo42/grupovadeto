<?php

namespace Database\Seeders;

use App\Models\Matter;
use Illuminate\Database\Seeder;

class MatterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $matters = [
            ['name' => 'Español'],
            ['name' => 'Matematicas'],
            ['name' => 'Música'],
            ['name' => 'Educación fisica']
        ];
        Matter::insert($matters);
    }
}
