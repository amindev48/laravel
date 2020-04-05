<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/{id}',function ($id=null){
//    return view('user',compact('id'));
//});
//
//
//Route::get('/posts/{id?}','PostsController@index');
//Route::get('/users','UsersController@index');
//Route::get('/product/{id?}','ProductsController@index');
//
//// Route DB Facades commands
//Route::get('/insert','ProductsController@create');
//
////Route::get('/select','TestController@select');
////Route::get('/update','TestController@update');
////Route::get('/delete','TestController@delete');
//
////// Route Eloquent commands
//Route::get('/select','ProductsController@index');
//
//Route::get('delete' , 'ProductsController@delete');
//Route::get('trash','ProductsController@trash');
//Route::get('restore','ProductsController@restore');
//Route::get('forceDelete','ProductsController@forceDelete');


// relationship
//
//Route::get('user/{id}/post',function ($id){
//    $user_post = \App\User::find($id)->post;
//    return $user_post;
//});
//
//
//Route::get('post/{id}/user',function ($id){
//    $post_user = \App\Post::findOrFail($id)->user;
//    return $post_user;
//});


// one to many
//
//Route::get('user/{id}/posts',function ($id){
//    return \App\User::find($id)->posts;
//});


// many to many
//Route::get('user/{id}/roles',function ($id){
//    $roles = \App\User::find($id)->roles;
//    foreach ($roles as $role){
//        echo $role->name;
//        echo "<br>";
//    }
//});
//
//
//Route::get('roles/{id}/user',function ($id){
//    $users = \App\role::find($id)->users;
//    foreach ($users as $user){
//        echo $user->name." : ".$user->email;
//        echo "<br>";
//    }
//});

// Has Many Through relationship

//Route::get('/users/country/posts',function (){
//    $countries = \App\Country::find(4);
//    foreach ($countries->posts as $post){
//        echo $post->id ." : ". $post->title;
//        echo "<br>";
//    }
//});


// polymorphic relationship One To Mayn

//Route::get('product/{id}/comments' , function ($id){
//    $product = \App\Product::find($id);
//    foreach ($product->comments as $comment){
//        $user = \App\User::find($comment->user_id);
//        echo  "User Name :" . $user->name;
//        echo "<br>";
//        echo  "Comment :" . $comment->comment_text;
//        echo "<br>";
//    }
//});
//
//Route::get('post/{id}/comments' , function ($id){
//    $post = \App\Post::find($id);
//    foreach ($post->comments as $comment){
//        $user = \App\User::find($comment->user_id);
//        echo  "User Name :" . $user->name;
//        echo "<br>";
//        echo  "Comment :" . $comment->comment_text;
//    }
//});
//
//Route::get('comment/{id}/post',function ($id){
//    $comment = \App\Comment::find($id);
//    return $comment->commetnable;
//});

// polymorphic relationship many to many


//// video tags
//Route::get('video/laravel/tags' , function (){
//    $videos = \App\Video::find(1);
//    foreach ($videos->tags as $tag){
//        echo $tag->name;
//        echo "<br>";
//    }
//});
//
//Route::get('video/php/tags' , function (){
//    $videos = \App\Video::find(2);
//    foreach ($videos->tags as $tag){
//        echo $tag->name;
//        echo "<br>";
//    }
//});
//
//// post tags
//Route::get('post/tags' , function (){
//    $posts = \App\Post::find(1);
//    foreach ($posts->tags as $tag){
//        echo $tag->name;
//        echo "<br>";
//    }
//});
//
//// product tags
//Route::get('product/tags',function (){
//    $products = \App\Product::find(3);
//    foreach ($products->tags as $tag){
//        echo $tag->name;
//        echo "<br>";
//    }
//});
//
//

// CRUD One To Many

//
//// Create
//Route::get('/create',function (){
//    $user = \App\User::find(1);
//    $posts = new \App\Post();
//    $posts->title = "New Post CRUD";
//    $posts->content = "New Post CRUD";
//    $posts->email = "New Post CRUD";
//    $posts->status = '1';
//    $user->posts()->save($posts);
//});
//
//
//// Select
//
//Route::get('/read',function (){
//    $user = \App\User::find(1);
//    foreach ($user->posts as $post){
//        echo $post->title;
//        echo "<br>";
//    }
//});
//
//// Update
//Route::get('/update' , function (){
//    $user = \App\User::find(1);
//    $user->posts()->whereId(1)->update(['title'=>'new title CRUD' , 'content'=>'new content CRUD']);
//});
//
//
//// Delete
//Route::get('/delete' , function (){
//    $user = \App\User::find(1);
//    $user->posts()->whereId(1)->delete();
//});


// CRUD MAny To MAny

//
//// Create
//Route::get('create' , function (){
//    $user = \App\User::find(1);
//    $role = new \App\role();
//    $role->name = "مدیر کل";
//    $user->roles()->save($role);
//});
//
//// Read
//Route::get('read',function (){
//    $user = \App\User::find(1);
//    foreach ($user->roles as $role){
//        echo $role->name;
//        echo "<br>";
//    }
//});
//
//// Update
//Route::get('update' , function (){
//    $user = \App\User::find(1);
//    if ($user->has('roles')){
//        foreach ($user->roles as $role){
//            if ($role->name == "admin"){
//                $role->name = "کاربرعادی";
//                $role->save();
//            }
//        }
//    }
//});
//
//// Delete
//Route::get('delete',function (){
//    $user = \App\User::find(1);
//    if ($user->has('roles')){
//       foreach ($user->roles as $role){
//           if ($role->name == "کاربرعادی"){
//               $role->delete();
//           }
//       }
//    }
//});
//
//
//// Detach role
//Route::get('detach',function (){
//    $user = \App\User::find(1);
//    $user->roles()->detach();
//});
//
//// Attach role
//Route::get('attach',function (){
//    $user = \App\User::find(1);
//    $user->roles()->attach(3);
//});
//
//// Sync Role
//Route::get('sync',function (){
//    $user = \App\User::find(1);
//    $user->roles()->sync([2,3,4]);
//});




use \Illuminate\Support\Facades\Auth;

Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home');


Route::middleware('auth' , 'verified')->group(function (){
    Route::resource('/posts' , 'PostsController');
    Route::resource('/users' , 'usersController');

});




