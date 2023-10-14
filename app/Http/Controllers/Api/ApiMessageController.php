<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiMessageController extends Controller
{
    public function store(Request $request){

        $data = $request->all();

        $validation = Validator::make($data,[
            'name' => ['required'],
            'mail' => ['required'],
            'message' => ['required'],
            'musician_id' => ['required'],
        ]);
        
        if ( $validation->fails()){
            return response()->json([
                'success' => false,
                'errors' => $validation->errors(),
            ]);
        }

        $message = new Message();
        $message->name = $data['name'];
        $message->mail = $data['mail'];
        $message->message = $data['message'];
        $message->musician_id = $data['musician_id'];

        $message->save();

        return response()->json([
            'success' => true,
            'data' => $data
            
        ]);

    }
}
