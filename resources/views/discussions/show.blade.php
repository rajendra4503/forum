@extends('layouts.app')
@section('content')

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
            </div>
        </div>
    @endforeach

@endsection
