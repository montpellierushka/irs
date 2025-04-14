<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Front_option;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use App\Models\Page;
use App\Models\Team;
use App\Models\Category;
use App\Models\Vacancy;

class AdminController extends Controller
{
 
    public function vacancies(){  
        $vacancies = Vacancy::get();  
        return view('admin.vacancies',[ 
            'vacancies' => $vacancies,  
        ]);
    }

    public function vacanciesDelete(Request $request){  

        $data = $request->validate([
            'id' => ['required', 'exists:vacancies,id'], 
        ]);

        $vacancy = Vacancy::where('id',$data['id'])->first(); 
        $vacancy->delete();  

        return redirect(route('admin_vacancies'))->with('mess', 'Вакансия удалёна!');
    }


    public function vacanciesNew(){    
        return view('admin.vacancynew',[    
        ]);
    }
    public function vacanciesNewAdd(Request $request){   
        $data = $request->validate([ 
            'title' => ['required'], 
            'slug' => ['required'], 
            'seo_title' => ['max:255'], 
            'seo_description' => ['max:255'], 
            'excerpt' => ['required'],  
            'content' => ['required'],  
        ]);
        $page = new Vacancy(); 
        $page->title = $data['title'];
        $page->slug = $data['slug'];
        if($data['seo_title']) $page->seo_title = $data['seo_title'];
        if($data['seo_description']) $page->seo_description = $data['seo_description'];
        $page->excerpt = $data['excerpt']; 
        $page->content = $data['content'];
        $page->save();

        return redirect(route('admin_vacancies'))->with('mess', 'Вакансия добавлена!');
    }

    public function vacanciesVacancy($number){  
        $vacancy = Vacancy::where('id',$number)->first();
        if($vacancy){ 
            return view('admin.vacancy',[ 
                'vacancy' => $vacancy,   
            ]);
        }
        abort(404);
    }
    public function vacanciesUpdate(Request $request){   
        $data = $request->validate([
            'id' => ['required', 'exists:vacancies,id'],  
            'title' => ['required'], 
            'slug' => ['required'],   
            'excerpt' => ['required'],  
            'content' => ['required'],  
            'seo_title' => ['max:255'], 
            'seo_description' => ['max:255'], 
        ]);
        $page = Vacancy::where('id',$data['id'])->first(); 
        $page->title = $data['title'];
        $page->slug = $data['slug'];
        if($data['seo_title']) {
            $page->seo_title = $data['seo_title']; 
        } else {
            $page->seo_title = null;
        }
        if($data['seo_description']) {
            $page->seo_description = $data['seo_description']; 
        } else {
            $page->seo_description = null;
        }
        $page->excerpt = $data['excerpt']; 
        $page->content = $data['content'];
        $page->save();

        return redirect('/admin/vacancies/'.$data['id'])->with('mess', 'Вакансия обновлена!');
    }
 



    public function team(){  
        $team = Team::orderBy("sort", "asc")->get();  
        return view('admin.team',[ 
            'team' => $team,  
        ]);
    }

    public function teamDelete(Request $request){  

        $data = $request->validate([
            'id' => ['required', 'exists:team,id'], 
        ]);

        $team = Team::where('id',$data['id'])->first(); 
        $team->delete();  

        return redirect(route('admin_team'))->with('mess', 'Сотрудник удалён!');
    }

    public function teamNew(){    
        return view('admin.teamnew',[    
        ]);
    }
    public function teamNewAdd(Request $request){   
        $data = $request->validate([ 
            'name' => ['required'], 
            'role' => ['required'],  
            'ava' => ['required'],  
            'brains' => ['required'], 
            'leads' => ['required'], 
            'sort' => ['required'],  
        ]);
        $team = new Team(); 
        $team->name = $data['name'];
        $team->role = $data['role'];
        $team->ava = $data['ava'];
        $team->brains = $data['brains'];
        $team->leads = $data['leads'];
        $team->sort = $data['sort'];
        $team->save();

        return redirect(route('admin_team'))->with('mess', 'Сотрудник добавлен!');
    }

    public function teamEl($number){  
        $team = Team::where('id',$number)->first();
        if($team){ 
            return view('admin.teamupdate',[ 
                'team' => $team,   
            ]);
        }
        abort(404);
    }
    public function teamUpdate(Request $request){   
        $data = $request->validate([ 
            'id' => ['required', 'exists:team,id'], 
            'name' => ['required'], 
            'role' => ['required'],  
            'ava' => ['required'],  
            'brains' => ['required'], 
            'leads' => ['required'], 
            'sort' => ['required'],  
        ]);
        $team = Team::where('id',$data['id'])->first(); 
        $team->name = $data['name'];
        $team->role = $data['role'];
        $team->ava = $data['ava'];
        $team->brains = $data['brains'];
        $team->leads = $data['leads'];
        $team->sort = $data['sort'];
        $team->save();

        return redirect('/admin/team/'.$data['id'])->with('mess', 'Сотрудник обновлен!');
    }




 
    public function pages(){  
        $pages = Page::get(); 
        return view('admin.pages',[ 
            'pages' => $pages,  
        ]);
    }

    public function pagesDelete(Request $request){  

        $data = $request->validate([
            'id' => ['required', 'exists:pages,id'], 
        ]);

        $page = Page::where('id',$data['id'])->first(); 
        $page->delete();  

        return redirect(route('admin_pages'))->with('mess', 'Страница удалёна!');
    }

    public function pagesNew(){    
        return view('admin.page',[    
        ]);
    }
    public function pagesNewAdd(Request $request){   
        $data = $request->validate([ 
            'title' => ['required'], 
            'slug' => ['required'], 
            'seo_title' => ['max:255'], 
            'seo_description' => ['max:255'], 
            'excerpt' => ['required'],  
            'content' => ['required'],  
        ]);
        $page = new Page(); 
        $page->title = $data['title'];
        $page->slug = $data['slug'];
        if($data['seo_title']) $page->seo_title = $data['seo_title'];
        if($data['seo_description']) $page->seo_description = $data['seo_description'];
        $page->excerpt = $data['excerpt']; 
        $page->content = $data['content'];
        $page->save();

        return redirect(route('admin_pages'))->with('mess', 'Страница добавлена!');
    }
    public function pagesUpdate(Request $request){   
        $data = $request->validate([
            'id' => ['required', 'exists:pages,id'],  
            'title' => ['required'], 
            'slug' => ['required'],   
            'excerpt' => ['required'],  
            'content' => ['required'],  
            'seo_title' => ['max:255'], 
            'seo_description' => ['max:255'], 
        ]);
        $page = Page::where('id',$data['id'])->first(); 
        $page->title = $data['title'];
        $page->slug = $data['slug'];
        if($data['seo_title']) {
            $page->seo_title = $data['seo_title']; 
        } else {
            $page->seo_title = null;
        }
        if($data['seo_description']) {
            $page->seo_description = $data['seo_description']; 
        } else {
            $page->seo_description = null;
        }
        $page->excerpt = $data['excerpt']; 
        $page->content = $data['content'];
        $page->save();

        return redirect('/admin/pages/'.$data['id'])->with('mess', 'Страница обновлена!');
    }

    public function pagesPage($number){  
        $page = Page::where('id',$number)->first();
        if($page){ 
            return view('admin.pageupdate',[ 
                'page' => $page,   
            ]);
        }
        abort(404);
    }




    public function posts(){  
        $posts = Post::orderBy("date", "desc")->get();
        $categories = Category::get();
        return view('admin.posts',[ 
            'posts' => $posts, 
            'categories' => $categories, 
        ]);
    }

    public function postsNew(){   
        $categories = Category::get();
        return view('admin.post',[  
            'categories' => $categories, 
        ]);
    }
    public function postsNewAdd(Request $request){   
        $data = $request->validate([
            'category_id' => ['required', 'exists:categories,id'], 
            'title' => ['required'], 
            'slug' => ['required'], 
            'preview' => ['max:255'], 
            'excerpt' => ['required'], 
            'date' => ['required'], 
            'content' => ['required'],  
        ]);
        $post = new Post();
        $post->category_id = $data['category_id'];
        $post->title = $data['title'];
        $post->slug = $data['slug'];
        if($data['preview']) $post->preview = $data['preview'];
        $post->excerpt = $data['excerpt'];
        $post->date = strtotime($data['date']);
        $post->content = $data['content'];
        $post->save();

        return redirect(route('admin_posts'))->with('mess', 'Пост добавлен!');
    }
    public function postsUpdate(Request $request){   
        $data = $request->validate([
            'id' => ['required', 'exists:posts,id'], 
            'category_id' => ['required', 'exists:categories,id'], 
            'title' => ['required'], 
            'slug' => ['required'], 
            'preview' => ['max:255'], 
            'excerpt' => ['required'], 
            'date' => ['required'], 
            'content' => ['required'],  
        ]);
        $post = Post::where('id',$data['id'])->first();
        $post->category_id = $data['category_id'];
        $post->title = $data['title'];
        $post->slug = $data['slug'];
        if($data['preview']) {
            $post->preview = $data['preview']; 
        } else {
             $post->preview = null;
        }
        $post->excerpt = $data['excerpt'];
        $post->date = strtotime($data['date']);
        $post->content = $data['content'];
        $post->save();

        return redirect('/admin/posts/'.$data['id'])->with('mess', 'Пост обновлен!');
    }

    public function postsPost($number){  
        $post = Post::where('id',$number)->first();
        if($post){
            $categories = Category::get();
            return view('admin.postupdate',[ 
                'post' => $post, 
                'categories' => $categories, 
            ]);
        }
        abort(404);
    }

    public function postsDelete(Request $request){  

        $data = $request->validate([
            'id' => ['required', 'exists:posts,id'], 
        ]);

        $post = Post::where('id',$data['id'])->first(); 
        $post->delete();  

        return redirect(route('admin_posts'))->with('mess', 'Пост удалён!');
    }





    public function index(){  
        $slide1 = array();
        $slide_1 = Front_option::where('key', 'LIKE', '%SLIDE1_%')->get(); 
        foreach($slide_1 as $el){
            $slide1[$el->key] = $el->value1;
        }


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

        $slide4 = Front_option::where('key', 'SLIDE4')->first();
        $slide4_items = Front_option::where('key', 'SLIDE4_ITEM')->get();

        $slide5 = Front_option::where('key', 'SLIDE5')->first();

        $slide6 = Front_option::where('key', 'SLIDE6')->first();
        $slide6_content = Front_option::where('key', 'SLIDE6_CONTENT')->first();
        $slide6_phones = Front_option::where('key', 'SLIDE6_PHONE')->orderBy("sort", "asc")->get();

        $social = Front_option::where('key', 'SOCIAL')->first();

        return view('admin.index',[ 
            'slide1' => $slide1,
            'slide2' => $slide2,
            'slide2_items' => $slide2_items,
            'slide3' => $slide3,
            'slide3_items' => $slide3_items,
            'slide4' => $slide4,
            'slide4_items' => $slide4_items,
            'slide5' => $slide5,
            'slide6' => $slide6,
            'slide6_phones' => $slide6_phones,
            'slide6_content' => $slide6_content,
            'social' => $social,
        ]); 
    } 

    public function menu($type){  
        $menu = Menu::where('type',$type)->orderBy("sort", "asc")->get();
        if(count($menu)){
            return view('admin.menus',[ 
                'menu' => $menu
            ]); 
        }
        abort(404);
    }

    public function menuNew(Request $request){  
        $data = $request->validate([
            'type' => ['required'],
            'sort' => ['required'],
            'text' => ['required'],
            'link' => ['required'],
        ]);

        $menu = new Menu(); 
        $menu->type  = $data['type'];
        $menu->sort  = $data['sort'];
        $menu->text  = $data['text'];
        $menu->link  = $data['link'];
        $menu->save(); 

        return redirect(route('admin_menu', ['type'=>$data['type']]))->with('mess', 'Пункт меню добавлен!');

    }

    public function menuUpdate(Request $request){  

        $data = $request->validate([
            'id' => ['required', 'exists:menus,id'], 
            'sort' => ['required'],
            'text' => ['required'],
            'link' => ['required'],
        ]);

        $menu = Menu::where('id',$data['id'])->first();
        $type = $menu->type;
        $menu->sort  = $data['sort'];
        $menu->text  = $data['text'];
        $menu->link  = $data['link'];
        $menu->save(); 

        return redirect(route('admin_menu', ['type'=>$type]))->with('mess', 'Пункт меню обновлён!');
    }

    public function menuDelete(Request $request){  

        $data = $request->validate([
            'id' => ['required', 'exists:menus,id'], 
        ]);

        $menu = Menu::where('id',$data['id'])->first();
        $type = $menu->type;
        $menu->delete();  

        return redirect(route('admin_menu', ['type'=>$type]))->with('mess', 'Пункт меню удалён!');
    }

    public function slide1(Request $request)
    {
        $data = $request->validate([     
            'TOP' => ['max:255'],     
            'TITLE' => ['max:255'],     
            'TEXT' => ['max:255'],     
            'VIDEO' => ['max:255'],     
            'VIDEO_TITLE' => ['max:255'],
        ]);

        $top = Front_option::where('key','SLIDE1_TOP')->first();
        $top->value1 = $data['TOP'];
        $top->save();

        $title = Front_option::where('key','SLIDE1_TITLE')->first();
        $title->value1 = $data['TITLE'];
        $title->save();

        $text = Front_option::where('key','SLIDE1_TEXT')->first();
        $text->value1 = $data['TEXT'];
        $text->save();

        $video = Front_option::where('key','SLIDE1_VIDEO')->first();
        $video->value1 = $data['VIDEO'];
        $video->save();

        $video_title = Front_option::where('key','SLIDE1_VIDEO_TITLE')->first();
        $video_title->value1 = $data['VIDEO_TITLE'];
        $video_title->save(); 

        return redirect('/admin')->with('mess', 'Сохранено!');
    }

    public function slide2(Request $request)
    {
        $data = $request->validate([        
            'SUBTITLE' => ['max:255'],      
            'TITLE' => ['max:255'],     
            'TEXT' => ['max:255'],     
            'LINK' => ['max:255'],     
            'HREF' => ['max:255'],
        ]);

        $subtitle = Front_option::where('key','SLIDE2_SUBTITLE')->first();
        $subtitle->value1 = $data['SUBTITLE'];
        $subtitle->save();

        $title = Front_option::where('key','SLIDE2_TITLE')->first();
        $title->value1 = $data['TITLE'];
        $title->save();

        $text = Front_option::where('key','SLIDE2_TEXT')->first();
        $text->value1 = $data['TEXT'];
        $text->save();

        $link = Front_option::where('key','SLIDE2_LINK')->first();
        $link->value1 = $data['LINK'];
        $link->save();

        $href = Front_option::where('key','SLIDE2_HREF')->first();
        $href->value1 = $data['HREF'];
        $href->save();  

        return redirect('/admin')->with('mess', 'Сохранено!');
    }

    public function slide2Delete(Request $request){  

        $data = $request->validate([
            'id' => ['required', 'exists:front_options,id'], 
        ]);

        $fo = Front_option::where('id',$data['id'])->first();
        $fo->delete();  

        return redirect('/admin')->with('mess', 'Элемент удалён!');
    }

    public function slide2Update(Request $request){  

        $data = $request->validate([
            'id' => ['required', 'exists:front_options,id'], 
            'sort' => ['required'], 
            'value1' => ['max:255'],
            'value2' => ['max:255'],
            'value3' => ['max:255'],
            'value4' => ['max:255'],
            'value5' => ['max:64255'],
        ]);

        $fo = Front_option::where('id',$data['id'])->first(); 
        $fo->sort  = $data['sort']; 
        $fo->value1  = $data['value1']; 
        $fo->value2  = $data['value2']; 
        $fo->value3  = $data['value3']; 
        $fo->value4  = $data['value4']; 
        $fo->value5  = $data['value5']; 
        $fo->save(); 

        return redirect('/admin')->with('mess', 'Элемент обновлён!');
    }

    public function slide2New(Request $request){  

        $data = $request->validate([ 
            'sort' => ['required'], 
            'value1' => ['max:255'],
            'value2' => ['max:255'],
            'value3' => ['max:255'],
            'value4' => ['max:255'],
            'value5' => ['max:64255'],
        ]);

        $fo = new Front_option(); 
        $fo->key = 'SLIDE2_ITEM';
        $fo->sort  = $data['sort']; 
        $fo->value1  = $data['value1']; 
        $fo->value2  = $data['value2']; 
        $fo->value3  = $data['value3']; 
        $fo->value4  = $data['value4']; 
        $fo->value5  = $data['value5']; 
        $fo->save(); 
        
        return redirect('/admin')->with('mess', 'Элемент добавлен!');
    } 


    public function slide3(Request $request)
    {
        $data = $request->validate([        
            'SUBTITLE' => ['max:255'],      
            'TITLE' => ['max:255'],     
            'TEXT' => ['max:255'],     
            'LINK' => ['max:255'],     
            'HREF' => ['max:255'],
        ]);

        $subtitle = Front_option::where('key','SLIDE3_SUBTITLE')->first();
        $subtitle->value1 = $data['SUBTITLE'];
        $subtitle->save();

        $title = Front_option::where('key','SLIDE3_TITLE')->first();
        $title->value1 = $data['TITLE'];
        $title->save();

        $text = Front_option::where('key','SLIDE3_TEXT')->first();
        $text->value1 = $data['TEXT'];
        $text->save();

        $link = Front_option::where('key','SLIDE3_LINK')->first();
        $link->value1 = $data['LINK'];
        $link->save();

        $href = Front_option::where('key','SLIDE3_HREF')->first();
        $href->value1 = $data['HREF'];
        $href->save();  

        return redirect('/admin')->with('mess', 'Сохранено!');
    }

    public function slide3Delete(Request $request){  

        $data = $request->validate([
            'id' => ['required', 'exists:front_options,id'], 
        ]);

        $fo = Front_option::where('id',$data['id'])->first();
        $fo->delete();  

        return redirect('/admin')->with('mess', 'Элемент удалён!');
    }

    public function slide3Update(Request $request){  

        $data = $request->validate([
            'id' => ['required', 'exists:front_options,id'], 
            'sort' => ['required'], 
            'value1' => ['max:255'],
            'value2' => ['max:255'],
            'value3' => ['max:255'],
            'value4' => ['max:255'],
            'value5' => ['max:64255'],
            'value6' => ['max:255'],
            'value7' => ['max:255'],
        ]);

        $fo = Front_option::where('id',$data['id'])->first(); 
        $fo->sort  = $data['sort']; 
        $fo->value1  = $data['value1']; 
        $fo->value2  = $data['value2']; 
        $fo->value3  = $data['value3']; 
        $fo->value4  = $data['value4']; 
        $fo->value5  = $data['value5']; 
        $fo->value6  = $data['value6']; 
        $fo->value7  = $data['value7']; 
        $fo->save(); 

        return redirect('/admin')->with('mess', 'Элемент обновлён!');
    }

    public function slide3New(Request $request){  

        $data = $request->validate([ 
            'sort' => ['required'], 
            'value1' => ['max:255'],
            'value2' => ['max:255'],
            'value3' => ['max:255'],
            'value4' => ['max:255'],
            'value5' => ['max:64255'],
            'value6' => ['max:255'],
            'value7' => ['max:255'],
        ]);

        $fo = new Front_option(); 
        $fo->key = 'SLIDE3_ITEM';
        $fo->sort  = $data['sort']; 
        $fo->value1  = $data['value1']; 
        $fo->value2  = $data['value2']; 
        $fo->value3  = $data['value3']; 
        $fo->value4  = $data['value4']; 
        $fo->value5  = $data['value5']; 
        $fo->value6  = $data['value6']; 
        $fo->value7  = $data['value7']; 
        $fo->save(); 
        
        return redirect('/admin')->with('mess', 'Элемент добавлен!');
    } 

    public function slide4(Request $request)
    {
        $data = $request->validate([        
            'SUBTITLE' => ['max:255'],      
            'TITLE' => ['max:255'],     
            'TEXT' => ['max:62500'],     
            'LINK' => ['max:255'],     
            'HREF' => ['max:255'],
        ]);

        $slide4 = Front_option::where('key','SLIDE4')->first();
        $slide4->value1 = $data['SUBTITLE'];
        $slide4->value2 = $data['TITLE'];
        $slide4->value3 = $data['LINK'];
        $slide4->value4 = $data['HREF'];
        $slide4->value5 = $data['TEXT'];
        $slide4->save(); 

        return redirect('/admin')->with('mess', 'Сохранено!');
    }

    public function slide4Delete(Request $request){  

        $data = $request->validate([
            'id' => ['required', 'exists:front_options,id'], 
        ]);

        $fo = Front_option::where('id',$data['id'])->first();
        $fo->delete();  

        return redirect('/admin')->with('mess', 'Элемент удалён!');
    }

    public function slide4Update(Request $request){  

        $data = $request->validate([
            'id' => ['required', 'exists:front_options,id'], 
            'sort' => ['required'], 
            'value1' => ['max:255'],
            'value2' => ['max:255'], 
        ]);

        $fo = Front_option::where('id',$data['id'])->first(); 
        $fo->sort  = $data['sort']; 
        $fo->value1  = $data['value1']; 
        $fo->value2  = $data['value2'];   
        $fo->save(); 

        return redirect('/admin')->with('mess', 'Элемент обновлён!');
    }

    public function slide4New(Request $request){  

        $data = $request->validate([ 
            'sort' => ['required'], 
            'value1' => ['max:255'],
            'value2' => ['max:255'], 
        ]);

        $fo = new Front_option(); 
        $fo->key = 'SLIDE4_ITEM';
        $fo->sort  = $data['sort']; 
        $fo->value1  = $data['value1']; 
        $fo->value2  = $data['value2'];   
        $fo->save(); 
        
        return redirect('/admin')->with('mess', 'Элемент добавлен!');
    } 



    public function slide5(Request $request)
    {
        $data = $request->validate([        
            'SUBTITLE' => ['max:255'],      
            'TITLE' => ['max:255'],     
            'COUNT' => ['max:255'],     
            'LINK' => ['max:255'],     
            'HREF' => ['max:255'],
        ]);

        $slide5 = Front_option::where('key','SLIDE5')->first();
        $slide5->value1 = $data['SUBTITLE'];
        $slide5->value2 = $data['TITLE'];
        $slide5->value3 = $data['LINK'];
        $slide5->value4 = $data['HREF'];
        $slide5->value6 = $data['COUNT'];
        $slide5->save(); 

        return redirect('/admin')->with('mess', 'Сохранено!');
    }

    public function slide6(Request $request)
    {
        $data = $request->validate([        
            'subtitle' => ['max:255'],       
            'title' => ['max:255'],       
            'frame' => ['max:255'],       
            'clock_title' => ['max:255'],       
            'adress' => ['max:255'],       
            'clock' => ['max:255'],       
            'call' => ['max:255'],       
            'description' => ['max:65000'],       
            'instagram' => ['max:255'],       
            'facebook' => ['max:255'],       
            'vk' => ['max:255'],       
        ]);

        $slide6 = Front_option::where('key','SLIDE6')->first();
        $slide6->value1 = $data['subtitle'];
        $slide6->value2 = $data['title'];
        $slide6->value3 = $data['frame']; 
        $slide6->save();

        $slide6_content = Front_option::where('key','SLIDE6_CONTENT')->first();
        $slide6_content->value1 = $data['clock_title'];
        $slide6_content->value2 = $data['adress'];
        $slide6_content->value3 = $data['clock']; 
        $slide6_content->value4 = $data['call']; 
        $slide6_content->value5 = $data['description']; 
        $slide6_content->save();

        $social = Front_option::where('key','SOCIAL')->first();
        $social->value1 = $data['instagram'];
        $social->value2 = $data['facebook'];
        $social->value3 = $data['vk'];
        $social->save(); 

        return redirect('/admin')->with('mess', 'Сохранено!');
    }

    public function slide6Delete(Request $request){  

        $data = $request->validate([
            'id' => ['required', 'exists:front_options,id'], 
        ]);

        $fo = Front_option::where('id',$data['id'])->first();
        $fo->delete();  

        return redirect('/admin')->with('mess', 'Элемент удалён!');
    }

    public function slide6Update(Request $request){  

        $data = $request->validate([
            'id' => ['required', 'exists:front_options,id'], 
            'sort' => ['required'], 
            'value1' => ['max:255'],
            'value2' => ['max:255'], 
        ]);

        $fo = Front_option::where('id',$data['id'])->first(); 
        $fo->sort  = $data['sort']; 
        $fo->value1  = $data['value1']; 
        $fo->value2  = $data['value2'];   
        $fo->save(); 

        return redirect('/admin')->with('mess', 'Элемент обновлён!');
    }

    public function slide6New(Request $request){  

        $data = $request->validate([ 
            'sort' => ['required'], 
            'value1' => ['max:255'],
            'value2' => ['max:255'], 
        ]);

        $fo = new Front_option(); 
        $fo->key = 'SLIDE6_PHONE';
        $fo->sort  = $data['sort']; 
        $fo->value1  = $data['value1']; 
        $fo->value2  = $data['value2'];   
        $fo->save(); 
        
        return redirect('/admin')->with('mess', 'Элемент добавлен!');
    } 



    public function upload(){  
        $uploadContent = Storage::allFiles('public'); 
       
        return view('admin.upload',[ 
            'uploadContent' => $uploadContent
        ]);  
    }
     
    public function adminUpload(Request $request)
    { 
        $request->validate([
            'file' => 'required|max:2048',
        ]); 
        $file = $request->file('file');
        /*
        $filename = auth("web")->user()->id.'__'.time().'.'.$file->getClientOriginalExtension() ?: 'png'; 
        $request->file->move(public_path('upload/admin'), $filename);
        echo '/upload/admin/'.$filename; */
        //
        if (!Storage::disk('public')->exists($file->getClientOriginalName())) {
            $path = $request->file('file')->storeAs(
                'public', $file->getClientOriginalName()
            );
        } else {
            $path = $request->file('file')->store('public');
        }        

        if(isset($_POST['echo'])){
            echo $path;
        } else return redirect(route('upload'))->with('mess', $path);
    } 

    public function uploadDelete(Request $request){  

        $data = $request->validate([
            'name' => ['required'], 
        ]);

        Storage::disk('public')->delete($data['name']);

        return redirect(route('upload'))->with('mess', 'Файл удалён!');
    }


    public function orders(){  
        $orders = Order::orderBy('id', "desc")->get();  
       
        return view('admin.orders',[ 
            'orders' => $orders
        ]);  
    }

    public function ordersDelete(Request $request){  

        $data = $request->validate([
            'id' => ['required', 'exists:orders,id'], 
        ]);

        $order = Order::where('id',$data['id'])->first();
        $order->delete();  

        return redirect(route('orders'))->with('mess', 'Заявка удалёна!');
    }

}
