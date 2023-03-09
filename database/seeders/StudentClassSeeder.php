<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StudentClass;


class StudentClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classes = [
            [
                'name' => 'xii rpl 1',
                'slug' => 'xii rpl 1',
            ],
            [
                'name' => 'xii rpl 2',
                'slug' => 'xii rpl 2',
            ],
            [
                'name' => 'xii rpl 3',
                'slug' => 'xii rpl 3',
            ]
        ];

        foreach($classes as $studentClass) {
            $class = new StudentClass();

            $class->name = $studentClass['name'];
            $class->slug = $studentClass['slug'];

            $class->save();

        }
            
        
    }
}
