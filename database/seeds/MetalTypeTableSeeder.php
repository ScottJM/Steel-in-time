<?php

use Illuminate\Database\Seeder;

class MetalTypeTableSeeder extends Seeder {

    public function run()
    {
        $names = [
            'Aluminium',
            'Stainless Steel',
            'Bright Mild Steel',
            'Black Mild Steel',
            'Brass',
            'Black Hot Rolled Tube',
            'Mild Steel',
            'Bronze',
            'Copper'
        ];

        \DB::table('metal_types')->delete();


        foreach($names as $name) {
            \SIT\MetalType::create([
                'name' => $name
            ]);
        }
    }

}