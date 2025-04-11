<?
use App\Models\Front_option;
use App\Models\Menu;
use App\Models\Post;
use App\Models\Team;

 
 
if(isset($_GET['page'])){
	if($_GET['page'] == 'main'){
		$top = Front_option::where('key','SLIDE1_TOP')->first(); 
		$title = Front_option::where('key','SLIDE1_TITLE')->first(); 
		$text = Front_option::where('key','SLIDE1_TEXT')->first(); 
		$video = Front_option::where('key','SLIDE1_VIDEO')->first(); 
		$video_title = Front_option::where('key','SLIDE1_VIDEO_TITLE')->first(); 
		$json['MAIN_SLIDE1'] = array(
			"SLIDE1_TOP" => $top->value1,
			"SLIDE1_TITLE" => $title->value1,
			"SLIDE1_TEXT" => $text->value1,
			"SLIDE1_VIDEO" => $video->value1,
			"SLIDE1_VIDEO_TITLE" => $video_title->value1
		);


		$slide2 = array();
        $slide2_items = array();
        $slide_2 = Front_option::where('key', 'LIKE', '%SLIDE2_%')->orderBy("sort", "asc")->get();  
        foreach($slide_2 as $el){
            if($el->key == 'SLIDE2_ITEM'){
                $slide2_items[] = $el;
            } else {
                $slide2[$el->key] = $el->value1;
            }
        }
        $slide2Js = array(
            "SLIDE2_TITLE" => $slide2['SLIDE2_TITLE'], 
            "SLIDE2_HREF" => $slide2['SLIDE2_HREF'], 
            "SLIDE2_LINK" => $slide2['SLIDE2_LINK'], 
            "SLIDE2_SUBTITLE" => $slide2['SLIDE2_SUBTITLE'], 
            "SLIDE2_TEXT" => $slide2['SLIDE2_TEXT'], 
            "SLIDE2_ITEMS" => array()                
        );
        foreach($slide2_items as $item){
            $slide2Js["SLIDE2_ITEMS"][] = array(
                "name" => $item->value1, 
                "excerpt" => $item->value2, 
                "props" => json_decode($item->value5),
                "price" => $item->value3,
                "detail" => $item->value4,
            );
        }
        $json['MAIN_SLIDE2'] = $slide2Js;


        $slide3 = array();
        $slide3_items = array();
        $slide_3 = Front_option::where('key', 'LIKE', '%SLIDE3_%')->orderBy("sort", "asc")->get();  
        foreach($slide_3 as $el){
            if($el->key == 'SLIDE3_ITEM'){
                $slide3_items[] = $el;
            } else {
                $slide3[$el->key] = $el->value1;
            }
        }

        $slide3_front = array(
            'subtitle' => $slide3['SLIDE3_SUBTITLE'],
            'title' => $slide3['SLIDE3_TITLE'],
            'link' => $slide3['SLIDE3_LINK'],
            'href' => $slide3['SLIDE3_HREF'],
            'text' => $slide3['SLIDE3_TEXT']
        );
        $projects = array();
        $in_array = array();
        foreach($slide3_items as $item){
            if(in_array($item->value1, $in_array)){
                for($i = 0; $i < count($projects); $i++){ 
                    if($projects[$i]['category'] == $item->value1){
                        $projects[$i]['items'][] = array(
                            'name' => $item->value2,
                            'tags' => $item->value5 ? json_decode($item->value5) : array(),
                            'big_fon_image' => $item->value7,
                            'fon_image' => $item->value4,
                            'image' => $item->value6,
                            'href' => $item->value3
                        );
                        break;
                    }
                }
            } else {
                $in_array[] = $item->value1;
                $projects[] = array(
                    'category' => $item->value1,
                    'items' => array(
                        array(
                            'name' => $item->value2,
                            'tags' => $item->value5 ? json_decode($item->value5) : array(),
                            'big_fon_image' => $item->value7,
                            'fon_image' => $item->value4,
                            'image' => $item->value6,
                            'href' => $item->value3
                        )
                    )
                );
            }
        }
        $slide3_front['items'] = $projects;
        $json['MAIN_SLIDE3'] = $slide3_front;


        $slide4 = Front_option::where('key', 'SLIDE4')->first();
        $slide4_items = Front_option::where('key', 'SLIDE4_ITEM')->get();

        $jsonSlide4 = array(
            'subtitle' => $slide4->value1,
            'title' => $slide4->value2,
            'link' => $slide4->value3,
            'href' => $slide4->value4,
            'text' => $slide4->value5,          
        ); 
        $items = array();

        foreach($slide4_items as $el){
            $items[] = array(
                'title'=>$el->value1,
                'text'=>$el->value2
            );
        }
        $items = array_chunk($items, 3);
        $jsonSlide4['items'] = $items;
        $json['MAIN_SLIDE4'] = $jsonSlide4;


        $slide5 = Front_option::where('key','SLIDE5')->first();

        $json['MAIN_SLIDE5'] = array(
            'subtitle' => $slide5->value1,
            'title' => $slide5->value2,
            'link' => $slide5->value3,
            'href' => $slide5->value4,
            'count' => $slide5->value6, 
            'blog' => array()         
        );   
        $posts = Post::orderBy("date", "desc")->take($slide5->value6)->get();
        $blog = array();
		$months = array( 1 => 'Января' , 'Февраля' , 'Марта' , 'Апреля' , 'Мая' , 'Июня' , 'Июля' , 'Августа' , 'Сентября' , 'Октября' , 'Ноября' , 'Декабря' );
		foreach($posts as $el){
		    $blog[] = array(
		        "url"=>$el->slug,
		        "preview_img"=>$el->preview,
		        "title"=> $el->title,
		        "excerpt"=> $el->excerpt,
		        "text"=> $el->content,
		        "date"=> gmdate('d ' . $months[gmdate('n', $el->date)] . ' Y', $el->date),
		        'category'=>$el->category['title']
		    ); 
		}
		$json['MAIN_SLIDE5']['blog'] = $blog; 

        $json['backendSEO'] = array(
            'title' => "Создание сайтов от 50 000 руб. Студия разработки ИРС",
            'description' => "Разработаем сайт любой сложности. От 50 000 руб. ★ Индивидуальный подход к бизнесу ★ Уникальный дизайн ★ Увеличим прибыль вашего бизнеса ★ Обращайтесь по тел. +7 (383) 375-25-99"
        );
	}
    if($_GET['page'] == 'team'){
        $team = Team::orderBy("sort", "asc")->get();
        $json['backendTeam'] = $team;
        $json['backendSEO'] = array(
            'title' => 'Наша команда | ИРС',
            'description' => 'Наша команда занимается созданием и продвижением сайтов, внедрением CRM, разработкой приложений, игр и обучением, а также трудоустраивает лучших учеников. Наш девиз «Градус понижать нельзя». И так во всем. Нам нравится создавать продающие и удобные сайты, потому что у нас это хорошо получается. Наши специалисты — не провинциальные диджеи, они делают сайты, учитывая современный стиль.'
        ); 
    }
    if($_GET['page'] == 'about'){
        $teamBrains = Team::where('brains',1)->orderBy("sort", "asc")->get();
        $teamLeads =  Team::where('leads',1)->orderBy("sort", "asc")->get();
        $slide4 = Front_option::where('key', 'SLIDE4')->first();
        $slide4_items = Front_option::where('key', 'SLIDE4_ITEM')->get();

        $jsonSlide4 = array(
            'subtitle' => $slide4->value1,
            'title' => $slide4->value2,
            'link' => $slide4->value3,
            'href' => $slide4->value4,
            'text' => $slide4->value5,          
        ); 
        $items = array();

        foreach($slide4_items as $el){
            $items[] = array(
                'title'=>$el->value1,
                'text'=>$el->value2
            );
        }
        $items = array_chunk($items, 3);
        $jsonSlide4['items'] = $items;
        $json['backendContent'] = array(
            'brains' => $teamBrains,
            'leads' => $teamLeads,
            'MAIN_SLIDE4' => $jsonSlide4
        ); 
        $json['backendSEO'] = array(
            'title' => "О нас | Студия разработки ИРС",
            'description' => 'Разработаем сайт любой сложности. От 70 000 руб. ★ Индивидуальный подход к бизнесу ★ Уникальный дизайн ★ Увеличим прибыль вашего бизнеса ★ Обращайтесь по тел. +7 (383) 375-25-99'
        );
    }
}

if(isset($page)){
    $json['pageBackendContent'] = $pageContent; 
    $seoTitle = $pageContent->title." | Студия разработки ИРС";
    $seoDescription = "Разработаем сайт любой сложности. От 70 000 руб. ★ Индивидуальный подход к бизнесу ★ Уникальный дизайн ★ Увеличим прибыль вашего бизнеса ★ Обращайтесь по тел. +7 (383) 375-25-99"; 
    if($pageContent->seo_title) $seoTitle = $pageContent->seo_title;
    if($pageContent->seo_description) $seoDescription = $pageContent->seo_description;
    $json['backendSEO'] = array(
        'title' => $seoTitle,
        'description' => $seoDescription
    );
}
 
if(isset($status) || !$json){
    $json['pageBackendContent'] = array(
        'title' => '404 ошибка страницы',
        'content' => '404 ошибка страницы'
    );  
    $json['backendSEO'] = array(
        'title' => '404 Ошибка страницы',
        'description' => '404 Ошибка страницы'
    );
    $json['status'] = '404'; 
}


echo json_encode($json);


?>