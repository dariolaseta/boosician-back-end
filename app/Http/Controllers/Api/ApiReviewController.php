<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiReviewController extends Controller
{
    public function store(Request $request){
        $data = $request->all();

        $validation = Validator::make($data,
            [
                'vote' => ['required'],
                'content' => ['required'],
                'musician_id' => ['required']
            ]);

        if ( $validation->fails()){
            return response()->json([
                'success' => false,
                'errors' => $validation->errors(),
            ]);
        }
        
        $review = new Review();
        $review->vote = $data['vote'];
        $review->content = $data['content'];
        $review->musician_id = $data['musician_id'];

        $review->save();


        return response()->json([
            'success' => true,
            'data' => $data
            
        ]);

    }
}

