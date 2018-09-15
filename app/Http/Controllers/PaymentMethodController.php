<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class PaymentMethodController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data['pays'] = DB::table('payment_method')
            ->get();  
        return view('payment-methods.index', $data);
    }
    public function edit($id)
    {
        $data['pay'] = DB::table('payment_method')
                ->first();
        return view('payment-methods.edit', $data);
       
    }
    
    public function update(Request $r)
    {
        $data = array(
            'bank' => $r->bank,
            'crypto' => $r->crypto
        );
        if($r->qrcode)
       {
           // upload and rename file
           $data['qrcode'] = $r->file('qrcode')->store('uploads/qrcode/', 'custom');
           
       }
        $i = DB::table('payment_method')->where('id', $r->id)->update($data);
       
        if ($i)
        {
            $sms = "All changes have been saved successfully.";
            $r->session()->flash('sms', $sms);
            return redirect('/admin/payment-method/edit/'.$r->id);
        }
        else
        {   
            $sms1 = "Fail to to save changes, please check again!";
            $r->session()->flash('sms1', $sms1);
            return redirect('/admin/payment-method/edit/'.$r->id);
        }
    }
}
