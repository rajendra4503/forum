@extends('layouts.app')

@section('content')

            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
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


            <div class="panel panel-default">
                <div class="panel-heading text-center">Create a new discussion</div>

                <div class="panel-body">

                    <form action="{{ route('discussions.store') }}" method="post">
                        {{ csrf_field() }}

                        <div class="form-group">
                              <label for="title">Title</label>
                              <input type="text" name="title" class="form-control">
                        </div>

                        <div class="form-group">
                              <label for="channel"> Pick a channel</label>
                              <select name="channel_id" id="channel_id" class="form-control">
                                    @foreach($channels as $channel)
                                          <option value="{{ $channel->id }}">{{ $channel->title }}</option>
                                    @endforeach
                              </select>
                        </div>
                        <div class="form-group">
                              <label for="content">Ask a question</label>
                              <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                              <button class="btn btn-success pull-right" type="submit">Create discussion</button>
                        </div>
                    </form>
                </div>
            </div>

@endsection