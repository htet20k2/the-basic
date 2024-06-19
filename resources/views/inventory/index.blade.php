@extends("layouts.master")

@section('title')
    Item List
@endsection

@section('content')
    <h4>I'm Item List</h4>
    <table class="table">
        <thead>
            <tr>
                <td>#</td>
                <td>Name</td>
                <td>Price</td>
                <td>Stock</td>
                <td>Control</td>
            </tr>
        </thead>
        <tbody>
            @forelse($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->stock }}</td>
                    <td >
                        <a class="btn btn-outline-primary btn-sm" href={{ route("item.show",$item->id) }}>Detail</a>

                        <a class="btn btn-sm btn-outline-info" href="{{ route("item.edit",$item->id) }}">Edit</a>

                        <form class="d-inline-block"  action="{{ route("item.destroy",$item->id) }}" method="post">
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
                    <a href="{{ route('item.create') }}" class="btn btn-sm btn-primary">Create Item</a>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
@endsection
