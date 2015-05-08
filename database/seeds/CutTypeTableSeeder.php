<?php

use Illuminate\Database\Seeder;

class CutTypeTableSeeder extends Seeder {

    public function run()
    {
        $names = [
            'Round Bar',
            'Box Section',
            'Tube',
            'T-Section',
            'RSJs',
            'Channel',
            'Angle',
            'Pipe',
            'Hexagon',
            'Sheet',
            'Square Bar',
            'Flat Bar',
        ];

        \DB::table('cut_types')->delete();


        foreach($names as $name) {
            \SIT\CutType::create([
                'name' => $name
            ]);
        }
    }

}