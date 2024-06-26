<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;

use function PHPUnit\Framework\returnSelf;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // $items = Item::where("id", ">", "6")->where("price", ">", "700")->get();
        // $items = Item::where("price",">",900)
        // ->orWhere("stock","<",50)
        // ->get();
        // $items = Item::whereIn("id",[10,15,25])->get();
        // $items = Item::whereBetween("price",[700,900])->get();

        // $items = Item::when(true,function($query){
        //     $query->where("id",5);
        // })->get();

        // return $items;
        // dd($items);


        $items = Item::when(request()->has("keyword"),function($query){
            $keyword = request()->keyword;
            $query->where("name","like","%".$keyword."%");
            $query->orWhere("price","like","%".$keyword."%");
            $query->orWhere("stock","like","%".$keyword."%");
        })
        ->when(request()->has("name"),function($query){
            $sortType= request()->name ?? 'asc';
            $query->orderBy("name",$sortType);
        })
        ->paginate(7)->withQueryString();

        // $items = Item::paginate(7);
        return view("inventory.index", compact('items'));

        // return view("inventory.index",[
        //     "items"=> Item::paginate(7)
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inventory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $request)
    {
        $item = new Item();
        $item->name = $request->name;
        $item->price= $request->price;
        $item->stock= $request->stock;
        $item->save();
        // session()->flash('message','item create');
        return redirect()->route("item.index")->with('status','item create successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return view('inventory.show',compact("item")) ;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        return view('inventory.edit',compact("item")) ;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        $item->name = $request->name;
        $item->price= $request->price;
        $item->stock= $request->stock;
        $item->update();
        return redirect()->route("item.index")->with('status','item updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->back()->with('status','item deleted successfully!');
    }
}
