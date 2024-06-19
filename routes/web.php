<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get("/",[PageController::class,'home'])->name("page.home");
Route::get("/inventory",[ItemController::class,'index'])->name("item.index");
Route::post("/inventory",[ItemController::class,'store'])->name("item.store");
Route::get("/inventory/create",[ItemController::class,'create'])->name("item.create");
Route::get("/inventory/{id}",[ItemController::class,'show'])->name("item.show");
Route::get("/inventory/{id}/edit",[ItemController::class,'edit'])->name("item.edit");
Route::delete("/inventory/{id}",[ItemController::class,'destroy'])->name("item.destroy");
Route::put("/inventory/{id}",[ItemController::class,'update'])->name("item.update");


Route::resource("category",CategoryController::class);
