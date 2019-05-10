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
                    <div style="float:left; padding-left:10px">
                         <form action= "/edit_comment/{{ $comment->id }}" method = "POST">
                            {{ csrf_field() }}
                            
                            <p><b> {{ $comment->name }} </b>&raquo;&nbsp;<input type="text" name="comment" value=" {{ $comment->comment }}"> 
                            <input type="hidden" name="article" value=" {{ $article_id }}">   
                            <button type = "submit" class ="btn btn-primary">Edit</button></p>
                        </form>
                    </div>
                    <div style="float:left; padding-left:10px">
                        <form action= "/delete_comment/{{ $comment->id }}" method = "POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="article" value=" {{ $article_id }}">
                            <button type = "submit" class ="btn btn-danger">Delete</button>
                        </form>
                    </div>
                    <div style="clear:both">
                    </div>
                    @endforeach
                    
                    
                       
                   

                 </div>
             </div>
            </div>
        </div>
@endsection
