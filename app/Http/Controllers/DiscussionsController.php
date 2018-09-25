<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;
use App\Channel;
use App\Discussion;
use App\Reply;

class DiscussionsController extends Controller
{
    public function create(){

        $channel = Channel::all();

        return view('discuss')->with('channels',$channel);
    }

    public function store(Request $request){

        $this->validate($request, [
            'title' => 'required',
            'channel_id' => 'required',
            'content' => 'required'
            
        ]);

        $discussion = Discussion::create([
            'title' => $request->title,
            'slug'  => str_slug($request->title),
            'content' => $request->content,
            'channel_id' => $request->channel_id,
            'user_id' => Auth::id()
        ]);

      Session::flash('success', 'Discussion succesfully created.');

      return redirect()->route('discussion',['slug'=>$discussion->slug]);
    }

    public function show($slug){
        $discussion = Discussion::where('slug',$slug)->first();
        return view('discussions.show')->with('d',$discussion);
    }

    public function reply($id){

     $discussion = Discussion::findOrFail($id);

     if(request()->reply != ''){

            $reply = Reply::create([
                'user_id' => Auth::id(),
                'discussion_id' => $discussion->id,
                'content'=>request()->reply
            ]);

            Session::flash('success', 'Replied to discussion.');
            return redirect()->back();
      }else{

        Session::flash('success', 'Please write some content.');
        return redirect()->back();
      }
    }
}