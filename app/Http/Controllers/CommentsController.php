<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Comment;

class CommentsController extends Controller
{
    
    public function __construct(Comment $comment){
        $this->comment = $comment;
    }
    
    public function index(Request $request){
        if($request->ajax())
        {
            //return $this->comment->where('parent_id', null)->with('commReply')->orderBy('id','DESC')->get();
    	    $data = $this->comment->where('parent_id', null)->with('commReply')->orderBy('id','DESC')->get();
            return response()->json(['comments' => $data]);

        }
        return redirect('/');    
    }
    
    public function addComent(Request $request){
        $inputs = $request->all()['comment'];
        $comment = [
            'text' => $inputs['text'],
            'parent_id' => isset($inputs['parent']) ? $inputs['parent'] : null
        ];
        $data = $this->comment->create($comment);
    	return response()->json(['comment' => $data]);
    }
}