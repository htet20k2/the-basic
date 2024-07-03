<?php

namespace App\Http\Controllers;

use App\Http\Resources\ItemResource;
use App\Models\Item;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ItemApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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

        // return response()-> json($items);
        return ItemResource::collection($items);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     "name"=>"required",
        //     "price"=>"required",
        //     "stock"=>"required"
        // ]);

        $validator = Validator::make($request->all(),[
            "name"=>"required",
            "price"=>"required",
            "stock"=>"required"
        ]);

        if($validator->fails()){
            return response()->json($validator->messages(),422);
        };

        $items=Item::create([
            "name"=> $request->name,
            "price"=> $request->price,
            "stock"=> $request->stock
        ]);
        // return response()->json($items);
        return new ItemResource($items);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $items = Item::find($id);
        if(is_null($items)){
            return response()->json(["message"=>"Message not found"],404);
        }
        // return response()->json($items);
        return new ItemResource($items);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(),[
            "name"=>"required",
            "price"=>"required",
            "stock"=>"required"
        ]);

        if($validator->fails()){
            return response()->json($validator->messages(),422);
        };

        $items = Item::find($id);
        if(is_null($items)){
            return response()->json(["message"=>"Message not found"],404);
        }

        $items->update([
            "name"=> $request->name,
            "price"=> $request->price,
            "stock"=> $request->stock
        ]);
        // return response()->json($items);
        return new ItemResource($items);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $items = Item::find($id);
        if(is_null($items)){
            return response()->json(["message"=>"Message not found"],404);
        }
        $items->delete();
        return response()->json([],204);
    }
}
