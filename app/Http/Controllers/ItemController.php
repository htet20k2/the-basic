<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function create(){
        return view('inventory.create');
    }

    public function index(){
        // $items = new Item;
        // $all = $items->all();
        // dd($all);
        return view("inventory.index",[
            "items"=> Item::all()
        ]);
    }

    public function store(Request $request){

        $item = new Item();
        $item->name = $request->name;
        $item->price= $request->price;
        $item->stock= $request->stock;
        // dd($item);
        $item->save;


        // $item= Item::create([
        //     "name"=> $request->name,
        //     "price"=> $request->price,
        //     "stock"=> $request->stock
        // ]);

        // $item= Item::create($request->all());
        // dd($request->all());

        // $item= Item::create([
        //     "name"=> $request->name,
        //     "price"=> $request->price,
        //     "stock"=> $request->stock
        // ]);
        // return $item;
        return redirect()->route("item.index");
    }
}
