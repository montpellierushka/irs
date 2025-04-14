<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = array(
            array('Статьи','articles'),
            array('Новости','news'),
            array('Акции','sales'),
            array('Обучение','education')
        );
        foreach($arr as $el){
            DB::table('categories')->insert([  
                'title' => $el[0], 
                'slug' => $el[1],   
            ]);
        } 
    }
}
