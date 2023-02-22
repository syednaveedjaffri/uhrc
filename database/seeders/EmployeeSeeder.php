<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::insert([
            [
                'campus_id' =>1,
                'faculty_id'=>1,
                'department_id'=>1,

                'employee_name'=>'Sajjid',
                'extension'=>'213',

            ],
            [
                'campus_id' =>2,
                'faculty_id'=>2,
                'department_id'=>2,

                'employee_name'=>'bisma',
                'extension'=>'221',
            ]
        ]);
    }
}
