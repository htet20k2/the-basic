@extends("layouts.master")

@section('title')
    Create Item
@endsection

@section('content')
    <h4>I'm Item Create</h4>

    <form action="{{ route('item.store') }}" method="POST">
        @csrf
        <div class=" mb-3">
            <label class=" form-label" for="">Item Name</label>
            <input type="text" class=" form-control" name="name" id="">
        </div>
        <div class=" mb-3">
            <label class=" form-label" for="">Item Price</label>
            <input type="number" class=" form-control" name="price" id="">
        </div>
        <div class=" mb-3">
            <label class=" form-label" for="">Stock</label>
            <input type="number" class=" form-control" name="stock" id="">
        </div>
        <button class="btn btn-primary">Save Item</button>
    </form>



@endsection
