@extends("layouts.master")

@section('title')
    Home Page
@endsection

@section('content')
    <h4>I'm Home</h4>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto optio, facilis cumque ipsum labore minus eum, consequatur nostrum molestiae unde impedit laboriosam dolore quae nulla tempora tempore quod in repellat?</p>
    <div class=" alert alert-info">
        {{-- {{ route("item.show",[15,"a"=>"aaa","b"=>"bbb"]) }} --}}
        {{ route("multi",[5,10,"a"=>"aaa"]) }}
    </div>
@endsection
