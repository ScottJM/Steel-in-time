<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder {

    public function run()
    {
        \DB::table('products')->delete();

        $cut_types = \SIT\CutType::all();
        $metal_types = \SIT\MetalType::all();
        $grades = [
            'A',
            'AA',
            'AAA',
            'AAAA',
            'AAAAA',
            'A*'
        ];


        for($i=0;$i<200;$i++) {
            $cut_type = $cut_types->toArray();
            $metal_type = $metal_types->toArray();

            \SIT\Products::create([
                'metal_type_id' => $metal_type[array_rand($metal_type)]['id'],
                'cut_type_id' => $cut_type[array_rand($metal_type)]['id'],
                'grade' => $grades[array_rand($grades)],
                'height' => rand(1, 100),
                'width' => rand(1, 100),
                'length' => rand(1, 100),
                'price' => rand(1, 100),
                'in_stock' => rand(0, 1),
            ]);
        }
    }

}