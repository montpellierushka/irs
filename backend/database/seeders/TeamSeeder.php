<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = array(
            array("/storage/dima.jpg",'Дмитрий Моисеенко',"Руководитель проектов",1,0,1),
            array("/storage/dima.jpg",'Дмитрий Моисеенко',"Главный маркетолог",1,0,2), 
            array("/storage/dima.jpg",'Дмитрий Моисеенко',"Главный маркетолог",1,0,3), 
            array("/storage/dima.jpg",'Дмитрий Моисеенко',"Креативный директор",0,1,4), 
            array("/storage/dima.jpg",'Дмитрий Моисеенко',"Backend-разработчик",0,1,5), 
            array("/storage/dima.jpg",'Дмитрий Моисеенко',"Дизайнер",0,1,6), 
            array("/storage/dima.jpg",'Дмитрий Моисеенко',"SMM - специалист",0,1,7), 
            array("/storage/dima.jpg",'Дмитрий Моисеенко',"Руководитель IT-академии",0,1,8), 
            array("/storage/dima.jpg",'Дмитрий Моисеенко',"Главный маркетолог",0,0,9), 
            array("/storage/dima.jpg",'Дмитрий Моисеенко',"Главный маркетолог",0,0,10), 
            array("/storage/dima.jpg",'Дмитрий Моисеенко',"Главный маркетолог",0,0,11), 
            array("/storage/dima.jpg",'Дмитрий Моисеенко',"Главный маркетолог",0,0,12), 
            array("/storage/dima.jpg",'Дмитрий Моисеенко',"Главный маркетолог",0,0,13), 
            array("/storage/dima.jpg",'Дмитрий Моисеенко',"Главный маркетолог",0,0,14), 
            array("/storage/dima.jpg",'Дмитрий Моисеенко',"Главный маркетолог",0,0,15), 
            array("/storage/dima.jpg",'Дмитрий Моисеенко',"Главный маркетолог",0,0,16), 
            array("/storage/dima.jpg",'Дмитрий Моисеенко',"Главный маркетолог",0,0,17), 
            array("/storage/dima.jpg",'Дмитрий Моисеенко',"Главный маркетолог",0,0,18), 
        );
        foreach($arr as $el){
            DB::table('team')->insert([  
                'ava' => $el[0], 
                'name' => $el[1],   
                'role' => $el[2],   
                'brains' => $el[3],   
                'leads' => $el[4],   
                'sort' => $el[5],   
            ]);
        } 
    }
}