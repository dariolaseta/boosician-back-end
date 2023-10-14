<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Musician;
use App\Models\Review;
use Illuminate\Http\Request;
use Braintree\Gateway as BraintreeGateway;
use Illuminate\Support\Facades\Auth;

class BraintreeController extends Controller
{

    protected $gateway; // Dichiarazione della variabile $gateway

    public function __construct()
    {
        // Inizializzazione di $gateway nel costruttore del controller
        $this->gateway = new BraintreeGateway([
            'environment' => 'sandbox',
            'merchantId' => 'gwbpgnd9y37dch58',
            'publicKey' =>'tf878sp4ygb4shds',
            'privateKey' => '6451cdcaa3cee8f4ae509209e7106c27',
        ]);
    }


    public function token(Request $request)
{


    $clientToken =$this->gateway->clientToken()->generate();

    return view('admin.payments.braintree')->with('clientToken', $clientToken);
    
}

public function payment(Request $request){
    
    $messages = Message::all();
    $reviews = Review::all();
    $musician = Musician::all();
    $user = Auth::user();
    $currentMusician = $user->musician;


    $nonceFromTheClient = $request->input("payment_method_nonce");
    $result = $this->gateway->transaction()->sale([
        'amount' => '10.00',
        'paymentMethodNonce' => $nonceFromTheClient,
        'options' => [
        'submitForSettlement' => True
        ]
    ]);


    return view('admin.payments.show', compact('messages', 'reviews', 'musician', 'user', 'currentMusician'));

}




public function show(){
    $clientToken = $this->gateway->clientToken()->generate();
    return view('admin.payments.braintree', compact('clientToken'));
}
}
