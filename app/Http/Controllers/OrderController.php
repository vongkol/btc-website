<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
class OrderController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data['orders'] = DB::table('orders')
            ->join('plans', 'orders.plan_id', 'plans.id')
            ->join('memberships', 'orders.member_id', 'memberships.id')
            ->orderBy('plans.id', 'desc')
            ->select('orders.*', 'memberships.first_name', 'memberships.last_name',
                'plans.name', 'plans.price', 'memberships.email as cmail')
            ->paginate(18);
        return view('orders.index', $data);
    }
    public function detail($id)
    {
        $order = DB::table('orders')->where('id', $id)->first();
        $plan = DB::table('plans')->where('id', $order->plan_id)->first();
        $customer = DB::table('memberships')->where('id', $order->member_id)->first();
        return view('orders.detail', compact('order', 'plan', 'customer'));
    }
    public function delete($id)
    {
        DB::table('orders')->where('id', $id)->delete();
        return redirect('/admin/order');
    }
    public function approve($id)
    {
        DB::table('orders')->where('id', $id)->update(['status'=>1]);
        $order = DB::table('orders')->where('id', $id)->first();
        $member = DB::table('memberships')->where('id', $order->member_id)->first();
        $plan = DB::table('plans')->where('id', $order->plan_id)->first();
        $sms = <<<EOT
                <h3>Order Approval</h3>
                <hr>
                <p>
                    Dear {$member->first_name} {$member->last_name}, <br>
                    <br>
                    Your Order with the following information has been approved!
                </p>
                <p>
                    <strong>Order information</strong>
                </p>
                <table width="700">
                    <tr>
                        <td width="170">Plan Name</td>
                        <td>: {$plan->name}</td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td>: $ {$plan->price}</td>
                    </tr>
                    <tr>
                        <td>Order Date</td>
                        <td>: {$order->order_date}</td>
                    </tr>
                    <tr>
                        <td>Payment Type</td>
                        <td>: {$order->payment_type}</td>
                    </tr>
                    <tr>
                        <td>Approval</td>
                        <td>: Approved</td>
                    </tr>
                    <tr>
                        <td colspan='2'>Description</td>
                        
                    </tr>
                    <tr>
                        <td colspan='2'>{$plan->description}</td>
                    </tr>
                </table>
                <p>
                    Thanks for your order.
                </p>
EOT;
            Right::send_email($member->email, "Order Approval", $sms);
            return redirect('/admin/order/detail/'.$id);
    }
}
