<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $student1 = Student::create([
            'name' => 'Rigoberto',
            'surname' => 'Villa Rodríguez',
            'date_birthday' => '1998-06-14'
        ]);
        $student1->image()->create(['url' => 'https://avatars.githubusercontent.com/u/38115606?v=4', 'main' => 1]);


        $student2 = Student::create([
            'name' => 'Felix',
            'surname' => 'Nuñez Gonzales',
            'date_birthday' => '1997-06-06'
        ]);
        $student2->image()->create(['url' => 'https://avatars.githubusercontent.com/u/33491472?v=4', 'main' => 1]);

    }
}
