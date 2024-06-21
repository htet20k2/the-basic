@extends('layouts.master')

@section('title')
    Update Item
@endsection

@section('content')
    <h4>I'm Item Update</h4>

    <form action="{{ route('item.update', $item->id) }}" method="POST">
        @method('put')
        @csrf
        <div class=" mb-3">
            <label class=" form-label" for="">Item Name</label>
            <input 
            type="text" 
            class=" form-control @error('name')is-invalid @enderror" 
            value="{{ old("name",$item->name) }}" 
            name="name" id="">
            @error('name')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <div class=" mb-3">
            <label class=" form-label" for="">Item Price</label>
            <input 
            type="number" 
            class=" form-control @error('price')is-invalid @enderror" 
            value="{{ old("price",$item->price) }}" 
            name="price" id="">
            @error('price')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <div class=" mb-3">
            <label class=" form-label" for="">Stock</label>
            <input 
            type="number" 
            class=" form-control @error('stock')is-invalid @enderror" 
            value="{{ old("stock",$item->stock) }}" 
            name="stock" id="">
            @error('stock')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-primary">Update Item</button>
    </form>
@endsection
