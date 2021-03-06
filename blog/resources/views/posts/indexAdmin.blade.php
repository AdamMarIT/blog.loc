@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Блог</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach ($posts as $post)
                        <h3><a href="/article/{{ $post->id }}/admin"> {{ $post->title }} </a></h3>
                        <h6> {{ $post->description }} </h6>
                        <p> {{ $post->name }} &nbsp;{{ date('d-m-Y', strtotime($post->created_at)) }}</p>
                        <form action = "/delete_post/{{ $post->id }}" method= "POST">
                            {{ csrf_field() }}
                            <button type = "submit" class ="btn btn-danger">Delete</button>
                        </form>
                        <hr>
                    @endforeach
                  
                </div>     
            </div>
            <p></p>
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
