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
    	    $response_data = $this->comment->where('parent_id', null)->with('childrens')->get();
            return response()->json(['data' => $response_data]);
        }
        return redirect('/');    
    }
    
    public function addComent(Request $request){
        $inputs = $request->all()['comment'];
        $comment = [
            'description' => $inputs['description'],
            'parent_id' => isset($inputs['child']) ? $inputs['child'] : null
        ];
        $response_data = $this->comment->create($comment);
    	return response()->json(['comment' => $response_data]);
    }
}