<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;
use App\Channel;
use App\Discussion;
class ForumController extends Controller
{
    public function index(Request $request){
        $discussions = Discussion::orderBy('created_at','desc')->paginate(3);
        return view('forum')->with('discussions',$discussions);
    }
}
