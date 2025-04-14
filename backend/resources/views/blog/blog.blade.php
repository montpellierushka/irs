<?
$blog = array();
$months = array( 1 => 'Января' , 'Февраля' , 'Марта' , 'Апреля' , 'Мая' , 'Июня' , 'Июля' , 'Августа' , 'Сентября' , 'Октября' , 'Ноября' , 'Декабря' );

foreach($posts as $el){
    $blog[] = array(
        "url"=>$el->slug,
        "preview_img"=>$el->preview,
        "title"=> $el->title,
        "excerpt"=> $el->excerpt,
        //"text"=> $el->content,
        "date"=> gmdate('d ' . $months[gmdate('n', $el->date)] . ' Y', $el->date),
        'category'=>$el->category['title']
    ); 
} 
 
if(!count($posts)){
    $json['status'] = '404'; 
    $json['backendSEO'] = array(
        'title' => '404 Ошибка страницы',
        'description' => '404 Ошибка страницы'
    );
} else {
    $titleStart = "Статьи";
    if(isset($_GET['category'])){       
        $titleStartArr = array(
            'articles' => 'Статьи',
            'news' => 'Новости',
            'sales' => 'Акции',
            'education' => 'Обучение'
        ); 
        $titleStart = $titleStartArr[$_GET['category']];
    }
    $pageTitle = "";
    if(Route::current()->number > 1){
        $pageTitle = " | Страница ".Route::current()->number;
    }
    $json['backendSEO'] = array(
        'title' => $titleStart.' по SEO и разработке сайтов'.$pageTitle.' | Блог агентства Ирсиб',
        'description' => 'В этом разделе мы собрали статьи о создании и продвижении сайтов, интернет-маркетинге, фотографии, пишем различные лайфхаки.'
    );
}

$json['blogBackendCount'] = $blog_count;
$json['blogBackendContent'] = $blog;

$content = $json;
echo json_encode($content)?>