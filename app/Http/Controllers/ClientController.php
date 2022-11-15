<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use \PDF;


class ClientController extends Controller
{
    public function index($create = null){
        if ($create) {
            if (session()->get('locale') == 'es') {
                Alert::success('Orden generada', 'La orden se genero con éxito');
            }else{
                Alert::success('Generated order', 'The order was generated successfully');
            }
        }
        $orders = Order::where('user_id',auth()->user()->id)->latest('id')->paginate(2);
        $addresses = Address::where('user_id',auth()->user()->id)->get();
        return view('rewear.user.cuenta.user',compact('orders','addresses'));
    }

    public function updateInfo(Request $request){
        $user = User::find(Auth::user()->id);
        $user->update([
            'name' => $request->name,
            'phone' => $request->phone
        ]);
        return back();
    }

    public function updatePassword(Request $request)
    {
        $user = auth()->user();
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withToastError('Contraseña actual no coincide');
        } else {
            $user->forceFill([
                'password' => Hash::make($request->password),
            ])->save();
            return back()->withToastSuccess('Contraseña actualizada con éxito');
        }
    }


    public function updateAddress(Request $request,Address $address){
        $address->update([
            'address' => $request->address,
            'postal_code' => $request->postal_code,
            'city' => $request->city,
            'state' => $request->state,

        ]);

        return back();
    }

    public function deleteAddress(Address $address){
        $address->delete();
        return back();
    }


    public function printOrder(Order $order){
        $envio = json_decode($order->envio);

        /* $data["email"] = "dev@agenciavandu.com"; */
        $data["email"] = "contacto@myrewear.com";
        $data["title"] = "Nueva orden - ".$order->id;


        $pdf = PDF::loadView('mail', compact('order','envio'));
        /* return $pdf->download('Order-'.$order->id.'.pdf'); */
        return view('mail',compact('order','envio'));
    }
}
