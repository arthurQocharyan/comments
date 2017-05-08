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
            return $this->comment->where('parent_id', null)->with('commReply')->get();
    	    $data = $this->comment->where('parent_id', null)->with('commReply')->get();
            return response()->json(['data' => $data]);
        }
        return redirect('/');    
    }
    
    public function addComent(Request $request){
        $inputs = $request->all()['comment'];
        $comment = [
            'text' => $inputs['text'],
            'parent_id' => isset($inputs['child']) ? $inputs['child'] : null
        ];
        $data = $this->comment->create($comment);
    	return response()->json(['comment' => $data]);
    }
}