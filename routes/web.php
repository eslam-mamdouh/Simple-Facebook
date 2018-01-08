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







Route::get('/logout', function(){
	Auth::logout();
	return redirect('/login');
});

Route::get('/register', function(){
	return view('register');
});
Route::post('/register', function(){
	$req = request();

	$user = new \App\User;
	$user->first_name = $req->first_name;
	$user->last_name  = $req->last_name;
	$user->email      = $req->email;
	$user->password   = $req->password;
	$user->save();

	Auth::login($user);
	return redirect('/home');

});

Route::get('/login', function(){
	return view('login');
});
Route::post('/login', function(){
	$req = request();

	$user = \App\User::where('email', $req->email)
					->where('password', $req->password)
					->first();
	if ($user) {
		Auth::login($user);
		return redirect('/home');
	}else{
		return redirect('/login');
	}
});

Route::get('/home', function(){
	$data = \App\Post::where('user_id', Auth::id())->get();
    $friend = \App\User::where('id' , '<>' , Auth::id() )->get();
	return view('home', ['posts' => $data , 'friends'=> $friend]);
})->middleware('auth');


Route::get('/test', function(){
	$p = \App\Post::find(1);
	return $p->user()->full_name();
});

Route::post('/post', function(){
	$p = new \App\Post;
	$p->content = request()->content;
	$p->user_id = Auth::id();
	$p->save();

	return redirect('/home');

});


Route::get('/post/show/{id}', function($id){
	$p = \App\Post::find($id);
	if ($p) {
		return view('show_post', ['data' => $p]);
	}else{
		return redirect('/home');
	}
});


Route::get('/post/edit/{id}', function($id){
	$p = \App\Post::find($id);
	if ($p) {
		return view('edit_post', ['data' => $p]);
	}else{
		return redirect('/home');
	}
});
Route::post('/post/edit/{id}', function($id){
	$p = \App\Post::find($id);
	if ($p) {
		$p->content = request()->content;
		$p->save();
	}
	return redirect('/home');
});


