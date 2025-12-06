<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(1);
        if (session('cart'))
            return view('frontend.checkout');
        else {
            $message = "Giỏ hàng của bạn đang trống!";
            return redirect()->back()->with('error', $message);
        }
    }
    public function store(Request $request)
    {
        try {
            $checkout = new Checkout;
            $checkout->cart_data = $request->base64_encode(json_encode(session('cart')));
            $checkout->payer_name = $request->payer_name;
            $checkout->payment_option = $request->payment_option;
            $checkout->status = $request->status;

            if ($checkout->save())
                return redirect()->route('instructor.index')->with('success', 'Lưu dữ liệu thành công!');
            else
                return redirect()->back()->withInput()->with('error', 'Vui lòng thử lại');
        } catch (Exception $e) {
            // dd($e);
            return redirect()->back()->withInput()->with('error', 'Vui lòng thử lại');
        }
    }
}
