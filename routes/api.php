<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TopicController;
use App\Models\Bike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/responder')->group(function () {
    Route::get('/hi', function () {
        return 'Hello World';
    });

    Route::get('/hi/{name}', function ($name) {
        return 'Hello ' . $name;
    });

    Route::get('/number', function () {
        return rand(1, 10);
    });

    Route::get('/www', function () {
        return redirect('https://ict-bz.ch');
    });

    Route::get('/icon', function () {
        return response()->download(public_path() . '/favicon.ico');
    });

    Route::get('/weather', function () {
        $weather = [
            'city' => 'Luzern',
            'temperature' => 20,
            'wind' => 10,
            'rain' => 0,
        ];
        return $weather;
    });

    Route::get('/error', function () {
        return response()->json(['error' => 'Nicht authorisiert!'], 401);
    });

    Route::get('/multiply/{number1}/{number2}', function ($number1, $number2) {
        return $number1 * $number2;
    })->where(['number1' => '[0-9]+', 'number2' => '[0-9]+']);
});

Route::get('/bikes', function () {
    return Bike::all();
});

Route::get('/bikes/{id}', function ($id) {
    $pdo = new PDO('mysql:host=localhost;dbname=aufgaben', 'root', '');
    $statement = $pdo->prepare('SELECT * FROM bikes WHERE id = :id');
    $statement->bindParam(':id', $id);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
})->where(['id' => '[0-9]+']);

Route::prefix('/bookler')->group(function () {
    Route::get('/books', [BookController::class, 'getAll']);
    Route::get('/books/{id}', [BookController::class, 'findById'])->where(['id' => '[0-9]+']);
    Route::prefix('/book-finder')->group(function () {
        Route::get('/slug/{slug}', [BookController::class, 'findBySlug']);
        Route::get('year/{year}', [BookController::class, 'findByYear']);
        Route::get('max-pages/{maxPages}', [BookController::class, 'findByMaxPages']);
    });
    Route::get('/search/{search}', [BookController::class, 'findBySearchTerm']);
    Route::prefix('/meta')->group(function () {
        Route::get('/count', [BookController::class, 'getNumberOfBooks']);
        Route::get('/avg-pages', [BookController::class, 'getAvgPages']);
    });
    Route::get('/dashboard', [BookController::class, 'getDashboard']);
});

Route::prefix('/relationsheep')->group(function () {
    Route::get('/posts', [PostController::class, 'getAll']);
    Route::get('/slug/{slug}/posts', [TopicController::class, 'getPostsForSlug']);
});
