<?
$blog = array();
$months = array( 1 => 'Января' , 'Февраля' , 'Марта' , 'Апреля' , 'Мая' , 'Июня' , 'Июля' , 'Августа' , 'Сентября' , 'Октября' , 'Ноября' , 'Декабря' );

if($status === 200){ 
    $json['blogDetailBackendContent'] = array(
        "url"=>$post->slug,
        "preview_img"=>$post->preview,
        "title"=> $post->title,
        "excerpt"=> $post->excerpt,
        "text"=> $post->content,
        "date"=> gmdate('d ' . $months[gmdate('n', $post->date)] . ' Y', $post->date),
        'category'=>$post->category['title']
    );
    $json['backendSEO'] = array(
        'title' => $post->title.' | Блог агентства Ирсиб',
        'description' => 'В этом разделе мы собрали статьи о создании и продвижении сайтов, интернет-маркетинге, фотографии, пишем различные лайфхаки.'
    ); 
} else {
    $json['blogDetailBackendContent'] = array( 
        "title"=> '404 ошибка страницы', 
        "text"=> '404 ошибка страницы', 
    );
    $json['status'] = '404'; 
    $json['backendSEO'] = array(
        'title' => '404 Ошибка страницы',
        'description' => '404 Ошибка страницы'
    );
}

$content = $json;
echo json_encode($content)?>