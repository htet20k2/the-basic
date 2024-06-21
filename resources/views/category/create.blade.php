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
            <input 
            type="text" 
            class=" form-control  @error('price')is-invalid @enderror"" 
            name="title" id="">
            @error('title')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class=" mb-3">
            <label class=" form-label" for="">Category Description</label>
            <textarea 
            name="description" 
            class="form-control  @error('price')is-invalid @enderror"" rows="5"></textarea>
            @error('description')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button class="btn btn-primary">Save Category</button>
    </form>



@endsection
