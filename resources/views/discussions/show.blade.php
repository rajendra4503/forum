@extends('layouts.app')
@section('content')

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <div class="panel panel-default">
            <div class="panel-heading">
                <img class="img-circle" src="{{$d->user->avatar}}" width="75" height="75">
                <span>&nbsp;{{$d->user->name}} , <b>{{$d->created_at->diffForHumans()}}</b></span>
            </div>
            <div class="panel-body">
                <h3 class="text-center">{{$d->title}}</h3>
                <p class="text-center">{{$d->content}} </p> 
            </div> 
            <div class="panel-footer">
                <p>{{$d->replies->count()}} Replies</p>
            </div>
        </div>
     
        @foreach( $d->replies as $r )
        <div class="panel panel-default">
            <div class="panel-heading">
                <img class="img-circle" src="{{$r->user->avatar}}" width="75" height="75">
                <span>&nbsp;{{$r->user->name}} , <b>{{$r->created_at->diffForHumans()}}</b></span>  
            </div>
            <div class="panel-body">
                <h4 class="text-center">{{$r->title}}</h4>
                <p class="text-center">{{$r->content}} </p> 
            </div> 
            <div class="panel-footer">
                @if($r->is_liked_by_auth_user()) 
                <a href="{{route('reply.unlike',['id' => $r->id])}}" class="btn btn-xs btn-danger">Unlike <span class="badge">{{$r->likes->count()}}</span></a>
                @else 
                <a href="{{route('reply.like',['id' => $r->id])}}" class="btn btn-xs btn-success">Like <span class="badge">{{$r->likes->count()}}</span></a>
                @endif
            </div>
        </div>
    @endforeach

    <div class="panel panel-default">
           
            <div class="panel-body">
                <form action="{{route('discussion.reply',['id'=>$d->id])}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="comment">Leave a reply....</label>
                        <textarea class="form-control" rows="5" name="reply" id="reply"></textarea>
                    </div>
                    <div class="form-group">  
                        <input value="Submit" name="submit" type="submit" class="btn btn-primary">  
                    </div>
                </form>
            </div>   
        </div>

@endsection
