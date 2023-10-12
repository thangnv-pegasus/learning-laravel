<?php

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Spatie\YamlFrontMatter\YamlFrontMatter;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/learning')->group(function () {

    Route::get('/posts', function () {
        return view('posts');
    });

    Route::get('/posts2', function () {

        // $doc = YamlFrontMatter::parseFile(__DIR__ . '/../resources/posts/my-four-post.html');

        // $files = File::files(__DIR__ . '/../resources/posts');
        // $posts = [];

        // $postsCollection = collect($files);

        // $posts = $postsCollection->map(function($file, $index){
        //     $doc = YamlFrontMatter::parseFile($file);
        //     return new Post($doc->title, $doc->excerpt, $doc->date, $doc->body(),$doc->slug);
        // });

        // $posts= array_map(function($file){
        //     $doc = YamlFrontMatter::parseFile($file);
        //     return new Post($doc->title, $doc->excerpt, $doc->date, $doc->body(),$doc->slug);;
        // },$files);

        $posts = Post::all();
        // ddd($posts[0]->getContents());
        return view('posts',[
            // 'posts' => Post::latest('published_at')->with(['category','user'])->get()
            'posts' => Post::latest()->get(),
            'categories' => Category::all()
        ]);
    });

    Route::get('/post/{id}', function ($params) {
        $path = __DIR__ . "/../resources/posts/{$params}.html";

        if (file_exists($path) == false) {
            return redirect('/');
            // abort(404);
        }

        // tạo 1 bộ nhớ với từng post và nó được lưu trong 5p và giá trị của mỗi post là 1 giá trị được trả về bởi $path
        $post = cache()->remember("post.{$params}", 5, function () use ($path) {
            var_dump('file_get_content');
            return file_get_contents($path);
        });
        // use ($path) => khi dùng use trong callback function. use (...) thì ... là những biến được lấy từ bên ngoài để dùng trong callback function 
        // còn về function(...) => ... trong này thì mang những giá trị vốn có của đối tượng gọi đến callback function vd: array.foreach(function(item)=>{})

        return view('post', [
            'post' => $post
        ]);
    })->where('id', '[a-zA-Z_\-]+');
    // where => validate path tren url


    // theo mac dinh Route::get('/post2/{post}', function (Post $post) => tra ve doi tuong $post co id duoc truyen vao tren route

    // neu muon truyen kieu nao khac khong phai id thi co the lam theo cach nay(truyen slug vao) Route::get('/post2/{post:slug}', function (Post $post) voi dk la no khong duoc trung voi cac du lieu khac
    // cach 3: la cau hinh trong Post model
    Route::get('/post2/{post}', function (Post $post) {

        // $post = Post::findorFail($id);
        
        // ddd($post);
        return view('post', [
            'post' => $post
        ]);
    })->where('id', '[a-zA-Z_\-1-9]+')
    ->name('posts2');


    Route::get('/categories/{category}',function (Category $category){
        $posts = $category->posts;
        // ddd($posts);
        return view('posts',[
            'posts'=>$posts,
            'categories' => Category::all(),
            'currentCategory' => $category
        ]);
    });

    Route::get('/author/{user}', function(User $user){
        
        // dd($user->posts);
        
        return view('posts',[
            'posts' => $user->posts
        ]);
    });

    Route::get('/test', function () {
        return view('test');
    });

});


Route::prefix('/test1')->group(function () {

    Route::get('/khoahoc', function () {
        return view('khoahoc');
    });

    Route::get('/khoahoc/{id}', function ($idkhoahoc) {
        return view('chitiet-khoahoc', [
            'idkhoahoc' => $idkhoahoc
        ]);
    })->where('id', '[A-Z_\-+]');

    Route::post('/khoahoc2/{id}', function ($id) {
        return $id;
    });
    
});