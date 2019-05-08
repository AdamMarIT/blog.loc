@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>{{ $post->title }} </h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p> {{ $post->content }} </p>
                    <hr/>
                    <p> {{ $user->name }} &nbsp;{{ date('d-m-Y', strtotime($post->created_at)) }}    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('comments')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-body">
                    <h4>Комментарии</h4>
                    @foreach ($comments as $comment)       
                        <p><b> {{ $comment->name }} </b> &raquo;&nbsp; {{ $comment->comment }}</p>  
                    @endforeach
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                     <form action= "/comment/{{$article_id}}" method = "POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input class="form-control" type="text" name="comment" placeholder="Вы можете оставить свой комментарий">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Добавить</button>
                    </form>

                 </div>
             </div>
            </div>
        </div>
@endsection
