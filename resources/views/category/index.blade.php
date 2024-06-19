@extends("layouts.master")

@section('title')
    Category List
@endsection

@section('content')
    <h4>I'm Category List</h4>
    <table class="table">
        <thead>
            <tr>
                <td>#</td>
                <td>Title</td>
                <td>Description</td>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->title }}</td>
                    <td>{{ Str::limit($category->description, 30, '...') }}</td>

                    <td >
                        <a class="btn btn-outline-primary btn-sm" href={{ route("category.show",$category->id) }}>Detail</a>

                        <a class="btn btn-sm btn-outline-info" href="{{ route("category.edit",$category->id) }}">Edit</a>

                        <form class="d-inline-block"  action="{{ route("category.destroy",$category->id) }}" method="post">
                            @method("delete")
                            @csrf
                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
            <tr>
                <td colspan="5" class=" text-center">
                    There is no record. <br>
                    <a href="{{ route('category.create') }}" class="btn btn-sm btn-primary">Create Item</a>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
@endsection
