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
            return $this->comment->where('parent_id', null)->with('commReply')->orderBy('id','DESC')->get();
    	    $data = $this->comment->where('parent_id', null)->with('commReply')->get();
            return response()->json(['data' => $data]);
            try{
                $response = [
                    'comments' => []
                ];
                $statusCode = 200;
                $comments = $this->comment->where('parent_id', null)->with('commReply')->orderBy('id','DESC')->get();
                foreach($comments as $comment){
                    $response['comments'][] = [
                        'id' => $comment->id,
                        'text' => $comment->text,
                        'parent_id' => $comment->parent_id,
                        'commReply'=>$comment->commReply

                    ];
                }
            }catch (Exception $e){
                $statusCode = 404;
            }finally{
                return \Response::json($response, $statusCode);
            }
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