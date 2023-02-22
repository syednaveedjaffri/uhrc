<?php

namespace Database\Seeders;

use App\Models\Complain;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComplainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Complain::insert([
        ['complain_type' => 'windows problem'],
        ['complain_type' => 'software problem'],
        ['complain_type' => 'computer power problem'],
        ['complain_type' => 'vga cable problem'],
        ['complain_type' => 'computer power button problem'],
        ['complain_type' => 'windows problem'],
        ['complain_type' => 'power cable problem'],
        ['complain_type' => 'printer problem'],
        ['complain_type' => 'scanner problem'],
        ['complain_type' => 'datacable problem'],
        ['complain_type' => 'LCD problem'],
        ['complain_type' => 'projector problem'],
        ['complain_type' => 'keyboard problem'],
        ['complain_type' => 'mouse problem'],

    ]);
    }
}
