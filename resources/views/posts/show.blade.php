@extends('layouts.layout' , ['title'=>"Пост №$post->post_id $post->title"])
    @section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h2>{{$post->title}}</h2></div>
                <div class="card-body">
                    <div class="card-img card-img__max" style="background-image: url({{$post->img ?? asset('img/3.jpg')}})" ></div>
                    <div class="card-descr">{{$post->descr}}</div>
                    <div class="card-author">Автор: {{$post->name}}</div>
                    <div class="card-date">Пост створено: {{$post->created_at->diffForHumans()}}</div>
                    <div class="card-btn">
                        <a href="{{route('post.index')}}" class="btn btn-outline-primary">На головну</a>
                        <a href="{{route('post.edit',$post->post_id)}}" class="btn btn-outline-success">Редагувати</a>
                        <form action="{{route('post.destroy',$post->post_id)}}" method="post" onsubmit=" if (confirm('Точно видалити'))  { return true} else { return false}">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-outline-danger" value="Видалити">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
