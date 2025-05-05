<?php

namespace App\Http\Controllers;


use App\Models\Order;
use App\Models\Page;
use App\Models\Front_option;
use App\Models\Menu;
use App\Models\Post;
use App\Models\Category;
use App\Models\Vacancy;
use App\Models\Service;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function login(Request $request){
        $data = $request->validate([ 
            'email' => ['required', 'string', 'email','exists:users,email'],
            'password' => ['required', 'string'],
        ],
        [
            'email.required' => 'Поле email обязательно для ввода',
            'email.email' => 'Указан некорректный email',
            'password.required' => 'Поле пароль обязательно для ввода'
        ]);

        if(auth("web")->attempt(['email'=>$data['email'],'password'=>$data['password']])){
            return redirect(route("home"));
        }
        
        return redirect(route("login"))->withErrors(['email' => 'Неверные имя пользователя или пароль']);
    } 
 
    public function logout(){
        auth("web")->logout(); 
        return redirect(route("login"));
    }

    public function order(Request $request){
        if($request->input('email')){
            $order = new Order();
            $order->email = $request->input('email');
            $order->save();
        } 
        $json = $this->getStartParams();
        return view('welcome',[
            'json' => $json,
            'status' => '404'
        ]); 
    }

    public function getStartParams(){
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

        return $json;
    }

    public function index(){ 

        $json = $this->getStartParams();
        
        return view('welcome',[
            'json' => $json
        ]);
    }

    public function page($page){
        $json = $this->getStartParams();

        $pageContent = Page::where('slug',$page)->first();
        if($pageContent){
            return view('welcome',[
                'json' => $json,
                'pageContent' => $pageContent,
                'page' => $page
            ]);
        } else {
            return view('welcome',[
                'json' => $json,
                'status' => '404'
            ]);   
        }
    }

    public function page404() {
        $json = $this->getStartParams();
        return view('welcome',[
            'json' => $json,
            'status' => '404'
        ]);
    }

    public function vacancies(){ 
        $json = $this->getStartParams();
        $pageContent = Vacancy::get();
        $json['pageBackendContent'] = $pageContent; 
        $json['backendSEO'] = array(
            'title' => "Вакансии | Студия разработки ИРС",
            'description' => "Разработаем сайт любой сложности. От 70 000 руб. ★ Индивидуальный подход к бизнесу ★ Уникальный дизайн ★ Увеличим прибыль вашего бизнеса ★ Обращайтесь по тел. +7 (383) 375-25-99"
        );
        echo json_encode($json);
    }

    public function vacanciesDetail($slug){
        $json = $this->getStartParams();
        
        $vacancy = Vacancy::where('slug',$slug)->first(); 
        if(!$vacancy){
            return view('welcome',[
                'json' => $json,
                'status' => '404'
            ]);
        } 

        $json['pageBackendContent'] = $vacancy; 
        $seoTitle = $vacancy->title." | Студия разработки ИРС";
        $seoDescription = "Разработаем сайт любой сложности. От 70 000 руб. ★ Индивидуальный подход к бизнесу ★ Уникальный дизайн ★ Увеличим прибыль вашего бизнеса ★ Обращайтесь по тел. +7 (383) 375-25-99"; 
        if($vacancy->seo_title) $seoTitle = $vacancy->seo_title;
        if($vacancy->seo_description) $seoDescription = $vacancy->seo_description;
        $json['backendSEO'] = array(
            'title' => $seoTitle,
            'description' => $seoDescription
        );
        echo json_encode($json);
    }

    public function services(){ 
        $json = $this->getStartParams();
        $pageContent = Service::get();
        $json['pageBackendContent'] = $pageContent; 
        $json['backendSEO'] = array(
            'title' => "Услуги1 | Студия разработки ИРС",
            'description' => "Разработаем сайт любой сложности. От 70 000 руб. ★ Индивидуальный подход к бизнесу ★ Уникальный дизайн ★ Увеличим прибыль вашего бизнеса ★ Обращайтесь по тел. +7 (383) 375-25-99"
        );
        echo json_encode($json);
    }

    public function servicesDetail($slug){
        $json = $this->getStartParams();
        
        $service = Service::where('slug',$slug)->first(); 
        if(!$service){
            return view('welcome',[
                'json' => $json,
                'status' => '404'
            ]);
        } 

        $json['pageBackendContent'] = $service; 
        $seoTitle = $vacancy->title." | Студия разработки ИРС";
        $seoDescription = "Разработаем сайт любой сложности. От 70 000 руб. ★ Индивидуальный подход к бизнесу ★ Уникальный дизайн ★ Увеличим прибыль вашего бизнеса ★ Обращайтесь по тел. +7 (383) 375-25-99"; 
        if($service->seo_title) $seoTitle = $service->seo_title;
        if($service->seo_description) $seoDescription = $service->seo_description;
        $json['backendSEO'] = array(
            'title' => $seoTitle,
            'description' => $seoDescription
        );
        echo json_encode($json);
    }

    public function blog(){ 
        $json = $this->getStartParams();

        $posts = array();
        $postsCount = 0;

        if(isset($_GET['category'])){
            $category = Category::where('slug',$_GET['category'])->first();
            if($category){
                $posts = Post::orderBy("date", "desc")->where('category_id',$category->id)->take(18)->skip(0)->get();
                $postsCount = Post::where('category_id',$category->id)->count();
            }
        } else {
            $posts = Post::orderBy("date", "desc")->take(18)->skip(0)->get();
            $postsCount = Post::count();
        }
        
        
        return view('blog.blog',[
            'json' => $json,
            'posts' => $posts,
            'blog_count' => $postsCount
        ]);
    }

    public function blogPage($number){ 
        $json = $this->getStartParams();


        $posts = array();
        $postsCount = 0;

        if( is_numeric($number) && (int)$number == $number ){ 
            if(isset($_GET['category'])){
                $category = Category::where('slug',$_GET['category'])->first();
                if($category){
                    $posts = Post::orderBy("date", "desc")->where('category_id',$category->id)->take(18)->skip(18*($number-1))->get();
                    $postsCount = Post::where('category_id',$category->id)->count();
                }
            } else { 
                $posts = Post::orderBy("date", "desc")->take(18)->skip(18*($number-1))->get();
                $postsCount = Post::count();
            }
        } 

        return view('blog.blog',[
            'json' => $json,
            'posts' => $posts,
            'blog_count' => $postsCount
        ]);
    }


    public function blogDetail($slug){
        $json = $this->getStartParams();

        $post = Post::where('slug',$slug)->first();
        $status = 200;
        if(!$post){
            $status = 404;
        } 
        return view('blog.detail',[
            'json' => $json,
            'post' => $post,
            'status' => $status,
        ]);
    }

}
