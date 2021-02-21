<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VoteAnswerController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function __invoke(Request $request){
        $vote = (int) $request->vote; 

        $votesCount = auth()->user()->voteAnswer($answer, $vote);

        if($request()->expectsJson()) {
            return $response()->json([
                'message' => 'Thanks for the feedback'
            ])
        }

        return back();
    }
}
