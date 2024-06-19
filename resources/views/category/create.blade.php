@extends("layouts.master")

@section('title')
    Create Category
@endsection

@section('content')
    <h4>I'm Category Create</h4>

    <form action="{{ route('category.store') }}" method="POST">
        @csrf
        <div class=" mb-3">
            <label class=" form-label" for="">Category Title</label>
            <input type="text" class=" form-control" name="title" id="">
        </div>
        <div class=" mb-3">
            <label class=" form-label" for="">Category Description</label>
            <textarea name="description" class="form-control" rows="5"></textarea>
        </div>
        <button class="btn btn-primary">Save Category</button>
    </form>



@endsection
