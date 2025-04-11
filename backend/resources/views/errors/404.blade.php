<?
use App\Models\Front_option;
use App\Models\Menu;
$json = array();


if(isset($_GET['menu'])){
	if($_GET['menu'] == 'main'){
		$menu = Menu::where('type','main')->orderBy("sort", "asc")->get();
		$menuArr = array();
		foreach($menu as $el){
            $menuArr[] = array( "link" => $el->link, "name" => $el->text );
        } 
        $json['MAIN_MENU'] = $menuArr; 
	
        $social = Front_option::where('key', 'SOCIAL')->first();
        $json['SOCIAL'] = array(
        	'instagram' => $social->value1,
            'facebook' => $social->value2,
            'vk' => $social->value3,
        );

        $slide6 = Front_option::where('key', 'SLIDE6')->first();
        $slide6_content = Front_option::where('key', 'SLIDE6_CONTENT')->first();
        $slide6_phones = Front_option::where('key', 'SLIDE6_PHONE')->orderBy("sort", "asc")->get(); 
        $jsonSlide6 = array(
            'subtitle' => $slide6->value1,
            'title' => $slide6->value2,
            'frame' => $slide6->value3,
            'clock_title' => $slide6_content->value1,
            'adress' => $slide6_content->value2,
            'clock' => $slide6_content->value3,
            'call' => $slide6_content->value4,
            'description' => $slide6_content->value5,   
            
        );  
        $phones = array();
        foreach($slide6_phones as $el){
            $phones[] = array(
                'link'=>$el->value1,
                'href'=>$el->value2
            );
        } 
        $jsonSlide6['phones'] = $phones;
        $json['MAIN_SLIDE6'] = $jsonSlide6;
	}
}

$json['pageBackendContent'] = array(
	'title' => '404 ошибка страницы',
	'content' => '404 ошибка страницы'
);

if($json){
    echo json_encode($json);
}