<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get("/",[PageController::class,'home'])->name("page.home");
Route::get("/inventory",[ItemController::class,'index'])->name("item.index");
Route::post("/inventory",[ItemController::class,'store'])->name("item.store");
Route::get("/inventory/create",[ItemController::class,'create'])->name("item.create");
