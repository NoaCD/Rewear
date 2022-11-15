<?php

namespace App\Http\Controllers;

/* use Barryvdh\DomPDF\PDF; */

use App\Mail\OrderCreate;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PDF;
/* use MAIL; */

class TestController extends Controller
{
    public function sendMailWithPDF()
    {


        $order = Order::find(5);
        $envio = json_decode($order->envio);

        $data["email"] = "test@gmail.com";
        $data["title"] = "Nueva orden - ".$order->id;


        $pdf = PDF::loadView('mail', compact('order','envio'));

        /* Mail::to('test@gmail.com')->send(new OrderCreate,function($message)use($pdf){
            $message->attachData($pdf->output(), "test.pdf");
        });
 */
        /* Mail::send('emails.order-create', $data, function ($message) use ($data, $pdf,$order) {
            $message->to($data["email"], $data["email"])
                ->subject($data["title"])
                ->attachData($pdf->output(), "orden-".$order->id."-".$order->created_at.".pdf");
        }); */

        /* return $pdf->download('ejemplo.pdf'); */
        return view('mail',compact('order','envio'));
    }
}
