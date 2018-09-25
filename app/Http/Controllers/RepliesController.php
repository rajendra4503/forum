<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;
use App\Reply;
use App\Like;
class RepliesController extends Controller
{
    public function like($id){
        $reply = Reply::find($id);
        Like::create([
            'reply_id' => $reply->id,
            'user_id'  => Auth::id()  
        ]);
        Session::flash('success', 'Like Successfully.');
        return redirect()->back();
    }

    public function unlike($id){

        $like = Like::where('reply_id',$id)
        ->where('user_id',Auth::id())->first();
        $like->delete();
        Session::flash('success', 'UnLike Successfully.');
        return redirect()->back();
    }
}
