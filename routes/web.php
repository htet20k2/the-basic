<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;


Route::get("/",[PageController::class,'home'])->name("page.home");


// Route::prefix("user")->group(function(){
//     Route::prefix("inventory")->controller(ItemController::class)->group(function(){

//         Route::get("/",'index')->name("item.index");
//         Route::post("/",'store')->name("item.store");
//         Route::get("/create",'create')->name("item.create");
//         Route::get("/{id}",'show')->name("item.show");
//         Route::get("/{id}/edit",'edit')->name("item.edit");
//         Route::delete("/{id}",'destroy')->name("item.destroy");
//         Route::put("/{id}",'update')->name("item.update");
        
//         });
        
//         Route::resource("category",CategoryController::class);
// });

Route::resource("item",ItemController::class);
Route::resource("category",CategoryController::class);
