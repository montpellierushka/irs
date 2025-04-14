<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $arr = array(
            //array('/','Главная','main',1), 
            array('/services','Услуги','main',2), 
            array('/portfolio','Наши проекты','main',3), 
            array('/about','Компания','main',4), 
            array('/blog','Интересное','main',5), 
            array('/contacts','Контакты','main',6), 
        );
        foreach($arr as $el){
            DB::table('menus')->insert([  
                'link' => $el[0], 
                'text' => $el[1], 
                'type' => $el[2], 
                'sort' => $el[3],  
            ]);
        } 
    }
}
