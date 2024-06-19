@extends("layouts.master")

@section('title')
    Edit Category
@endsection

@section('content')
    <h4>I'm Category Edit</h4>

    <form action="{{ route('category.update',$category->id) }}" method="POST">
        @method('put')
        @csrf
        <div class=" mb-3">
            <label class=" form-label" for="">Category Title</label>
            <input type="text" class=" form-control" value="{{ $category->title }}" name="title" id="">
        </div>
        <div class=" mb-3">
            <label class=" form-label" for="">Category Description</label>
            <textarea name="description" class="form-control" rows="5">{{ $category->description }}</textarea>
        </div>
        <button class="btn btn-primary">Update Category</button>
    </form>



@endsection
