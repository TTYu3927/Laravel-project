<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CookieController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\customerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CatController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Post;
use App\Http\Controllers\MailController;
use App\Models\Tag;
use App\Http\Controllers\PostController;




// Route::get('/', function () {
//     return view('home');
// });
Route::get('/', [HomeController::class , 'index']);
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact'); // Add this line
Route::post('/submit', [HomeController::class, 'submit'])->name('about.submit'); // Add this line
Route::post('/', [HomeController::class, 'store']);  

Route::get('/search', function () {
    $query = request('q');
    return 'Search results for: ' . $query;
});

Route::get('/user/{username}', function ($username) {
    return 'Welcome to the profile of ' . $username;
});

Route::get('/about', function () { 
    return view('about');
})->name('about');

Route::redirect('/old','/new');

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return 'Admin Dashboard';
    });
    Route::get('/users', function () {
        return 'Admin Users';
}); });

Route::get('/user/{id}/{name}', function (string $id, string $name) {
    return "user ID: $id <br> Name: $name";
})->where(['id' => '[0-9]+', 'name' => '[a-z]+']);

Route::get('/greet/{name}', function ($name) { 
    return view('greeting', ['name' => $name]);
});

Route::get('/', function () {
    return view('home', ['name' => 'Johnny','i' => 1, 'records' => [], 'users' => [
        ['name' => 'John', 'id' => 30],
        ['name' => 'Jane', 'id' => 25],
    ]]);

});

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/php_code', function () {
    return view('php_code');
});

Route::get('/conditional', function () {
    return view('conditional');
});

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/create', [UserController::class, 'create']);
Route::post('/users/store', [UserController::class, 'store']);
Route::get('/users/edit/{id}', [UserController::class, 'edit']);
Route::post('/users/update/{id}', [UserController::class, 'update']);
Route::get('/users/delete/{id}', [UserController::class, 'destroy']);

Route::get('test-user', function (){
    $user = User::find(1);
    $profile = $user->profile;
    return $profile;
});
Route::get('/test-student-courses', function () {
    $student = Student::with('courses')->find(2);
    foreach ($student->courses as $course) {
        echo $course->title . '<br>';
    }
});


Route::get('/customers', [customerController::class, 'index']);
Route::get('/customers/create', [customerController::class, 'create']);
Route::post('/customers/store', [customerController::class, 'store']);
Route::get('/customers/edit/{id}', [customerController::class, 'edit']);
Route::post('/customers/update/{id}', [customerController::class, 'update']);
Route::get('/customers/delete/{id}', [customerController::class, 'destroy']);

Route::resource('categories', CategoryController::class);
Route::resource('/cats', CatController::class);

Route::get('/posts', function () {
    // $posts = Post::with('comments')->get();
    $posts = Post::with('tags')->get();
    // $posts = Post::with(['comments', 'tags'])->get();
    return view('posts.index', compact('posts'));
});
Route::get('/students', function(){
    $students = Student::all();
    return view('students.index', compact('students'));

});
Route::get('/set-cookie',[CookieController::class, 'setCookie']);
Route::get('/get-cookie',[CookieController::class, 'getCookie']);
Route::get('/delete-cookie',[CookieController::class, 'deleteCookie']);

Route::post('login', [UserController::class, 'login']);
Route::view('login','login');

Route::get('logout', [UserController::class, 'logout']);

Route::get('adminpage', [HomeController::class, 'adminpage'])->middleware('admin');

Route::get('register', [AuthController::class, 'register'])->name('Auth.register');
Route::get('login', [AuthController::class, 'login'])->name('Auth.login');
Route::post('create-user', [AuthController::class, 'createUser'])->name('Auth.createUser');

Route::post('checkAuth', [AuthController::class, 'checkAuth'])->name('Auth.checkAuth');

Route::get('logout', [AuthController::class, 'logout'])->name('Auth.logout');

// Route::middleware(['auth','user'])->group(function () {
//     Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
//     });

Route::get('send-mail', [MailController::class, 'sendMail'])->name('send.mail');

Route::get('/posts/create', [PostController::class, 'createform'])->name('posts.create');
Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

Route::get('/stripe', [\App\Http\Controllers\StripeController::class, 'index']);
Route::post('/stripepayment', [\App\Http\Controllers\StripeController::class, 'stripepay'])->name('stripepay');
