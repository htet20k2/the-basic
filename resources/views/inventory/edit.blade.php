@extends("layouts.master")

@section('title')
    Update Item
@endsection

@section('content')
    <h4>I'm Item Update</h4>

    <form action="{{ route('item.update',$item->id) }}" method="POST">
        @method("put")
        @csrf
        <div class=" mb-3">
            <label class=" form-label" for="">Item Name</label>
            <input type="text" class=" form-control" value="{{ $item->name }}" name="name" id="">
        </div>
        <div class=" mb-3">
            <label class=" form-label" for="">Item Price</label>
            <input type="number" class=" form-control" value="{{ $item->price }}" name="price" id="">
        </div>
        <div class=" mb-3">
            <label class=" form-label" for="">Stock</label>
            <input type="number" class=" form-control" value="{{ $item->stock }}" name="stock" id="">
        </div>
        <button class="btn btn-primary">Update Item</button>
    </form>



@endsection
