<?php

use Illuminate\Support\Facades\Route;

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


Auth::routes();
Route::middleware(['auth:web'])->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('/user', "\App\Http\Controllers\UserAccountsController");
    Route::get('/user_search', '\App\Http\Controllers\UserAccountsController@search');
    Route::put('/pwchange/{id}', '\App\Http\Controllers\UserAccountsController@pwchange');

    Route::resource('/country', "\App\Http\Controllers\CountryController");
    Route::get('/country_search', '\App\Http\Controllers\CountryController@search');

    Route::resource('/department', "\App\Http\Controllers\DepartmentController");
    Route::get('/department_search', '\App\Http\Controllers\DepartmentController@search');

    Route::resource('/city', "\App\Http\Controllers\CityController");
    Route::get('/city_search', '\App\Http\Controllers\CityController@search');

    Route::resource('/state', "\App\Http\Controllers\StateController");
    Route::get('/state_search', '\App\Http\Controllers\StateController@search');

    Route::resource('/employee', "\App\Http\Controllers\EmployeeController")->middleware('test');

    Route::get('/fetured', function () {
        $products = [
            'green pants',
            'green pants',
            'red shirt',
            'red shirt',
            'red shirt',
            'blue hat',
            'blue hat',
            'blue hat',
            'shoes',
        ];

        $fetured = [];
        foreach ($products as $k => $v) {

            if (!array_key_exists($v, $fetured)) {
                $fetured[$v] = 1;
            } else {
                $fetured[$v] = $fetured[$v] + 1;
            }
        }
        //get most purchased products
        asort($fetured);

        $max_val = max(array_values($fetured));


        //dd($max_val);
        $filterd = array_filter(
            $fetured,

            function ($v, $k) use ($max_val) {

                return $v == $max_val;
            },
        
            ARRAY_FILTER_USE_BOTH
        );

        ksort($filterd);

        $e = array_keys($filterd);

        return end($e);
    });

    Route::get('/stocks', [\App\Http\Controllers\StockController::class, 'sockMerchant']);
    Route::get('/vally', [\App\Http\Controllers\VallyController::class, 'countingValleys']);
    Route::get('/hg', [\App\Http\Controllers\HgController::class, 'hourglassSum']);
});

Route::get('/chunk',function(){
    $n = 10000000;
    $queries = [
        [200, 60000, 8],
        [3, 68959, 7],
        [10000, 8000000, 1],
        [50, 9000,15],
        [200, 60000, 8],
        [3, 68959, 7],
        [10000, 8000000, 1],
        [50, 9000,15],
        [200, 60000, 8],
        [3, 68959, 7],
        [10000, 8000000, 1],
        [50, 9000,15],
        [200, 60000, 8],
        [3, 68959, 7],
        [10000, 8000000, 1],
        [50, 9000,15],
        [200, 60000, 8],
        [3, 68959, 7],
        [10000, 8000000, 1],
        [50, 9000,15],
        [200, 60000, 8],
        [3, 68959, 7],
        [10000, 8000000, 1],
        [50, 9000,15],
        [200, 60000, 8],
        [3, 68959, 7],
        [10000, 8000000, 1],
        [50, 9000,15],
        [200, 60000, 8],
        [3, 68959, 7],
        [10000, 8000000, 1],
        [50, 9000,15],
        [200, 60000, 8],
        [3, 68959, 7],
        [10000, 8000000, 1],
        [50, 9000,15],
        [200, 60000, 8],
        [3, 68959, 7],
        [10000, 8000000, 1],
        [50, 9000,15],
        [200, 60000, 8],
        [3, 68959, 7],
        [10000, 8000000, 1],
        [50, 9000,15],
        [200, 60000, 8],
        [3, 68959, 7],
        [10000, 8000000, 1],
        [50, 9000,15],
        [200, 60000, 8],
        [3, 68959, 7],
        [10000, 8000000, 1],
        [50, 9000,15],
        [200, 60000, 8],
        [3, 68959, 7],
        [10000, 8000000, 1],
        [50, 9000,15],
        [200, 60000, 8],
        [3, 68959, 7],
        [10000, 8000000, 1],
        [50, 9000,15],
        [200, 60000, 8],
        [3, 68959, 7],
        [10000, 8000000, 1],
        [50, 9000,15],
        [200, 60000, 8],
        [3, 68959, 7],
        [10000, 8000000, 1],
        [50, 9000,15],
        [200, 60000, 8],
        [3, 68959, 7],
        [10000, 8000000, 1],
        [50, 9000,15],
        [200, 60000, 8],
        [3, 68959, 7],
        [10000, 8000000, 1],
        [50, 9000,15],
    ];
        $index_arr = array_fill(0,$n,0);
        $max_arr_val = null;
            
            if($n>4000){
                $number_of_chunks = (int)ceil($n/4000);
                   $chunk_array = array_chunk($index_arr,$number_of_chunks);
            }
            
            
        
        foreach($queries as $query){
            
            $start = $query[0]-1;
            $end = $query[1]-1;
            $value = $query[2];
            
            for($i=$start; $i<=$end; $i++){
                
                $index_arr[$i]+=$value;
                
                if($max_arr_val===null){
                    
                    $max_arr_val = $index_arr[$i];
                    
                }
                
                if($index_arr[$i]>$max_arr_val){
                    
                    $max_arr_val = $index_arr[$i];
                    
                }
                
            }   
            
        }
        
        return $max_arr_val;
        
        
        
});
