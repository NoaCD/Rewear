<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Mail\MessageRecieved;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    //
     //Procesamos el formulario de la vista contactanos
     public function store(Request $request){
        //Recibir el JSON
        $json_request = $request->json()->all();
        Mail::to('noe.c@giotex.com.mx')->send(new MessageRecieved($json_request));

        return response()->json([
            'response' =>  'Mensaje enviado',
            'sucess' => true
          ]);
    }
    
}
