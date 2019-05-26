<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $collection = collect([
            'كهربائي',
            'سباك',
            'ربة منزل',
        ]);
       
        $collection->each(function ($item, $key) {
            // create permissions for each collection item
            Category::create([
                'name' => $item,
                'image' => 'category/default.jpg',
                'body' => $item,
            ]);
        });
    }
}
