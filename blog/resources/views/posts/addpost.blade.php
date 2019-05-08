@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Новый пост</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action = "/add_post" method= "POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Заголовок</label>
                            <input class="form-control form-control-lg" type="text" name="title" placeholder="">
                        </div>
                        <div class="form-group">
                            <label>Краткое описание поста</label>
                            <textarea class="form-control" name="description" rows="3">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label>Текст поста</label>
                            <textarea class="form-control" name="content" rows="10"></textarea>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Запостить</button>
                    </form>
                  
                </div>     
            </div>
        </div>
    </div>
</div>
@endsection
