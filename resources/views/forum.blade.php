@extends('layouts.app')

@section('content')

    @foreach( $discussions as $d )
        <div class="panel panel-default">
            <div class="panel-heading">
                <img class="img-circle" src="{{$d->user->avatar}}" width="75" height="75">
                <span>&nbsp;{{$d->user->name}} , <b>{{$d->created_at->diffForHumans()}}</b></span>
                <a class="btn btn-default pull-right" href="{{route('discussion',['slug'=>$d->slug])}}">View</a>
            </div>
            <div class="panel-body">
                <h4 class="text-center">{{$d->title}}</h4>
                <p class="text-center">{{str_limit($d->content,60)}} </p> 
            </div> 
            <div class="panel-footer">
                <p>{{$d->replies->count()}} Replies</p>
            </div>
        </div>
    @endforeach

    <div class="text-center">
        {!! $discussions->links() !!}
    </div>  
    
@endsection
