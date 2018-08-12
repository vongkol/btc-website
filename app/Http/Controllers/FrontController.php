<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
class FrontController extends Controller
{
   
    // index
    public function index(Request $r)
    {
       if(isset($_GET['ref']))
       {
            $ref = @$_GET['ref'];
            $r->session()->put('ref', $ref);
       }
        $data['video'] = DB::table('videos')
            ->where('active', 1)
            ->orderBy('id', 'desc')
            ->first();
        
        return view('fronts.index', $data);
   }

   public function dashboard() {
       return view('fronts.dashboard');
   }
   // view post detail
   public function post($id)
   {
       $pid = $_GET['pid'];
       $data['main'] = DB::table('categories')->where('id', $id)->first();
       $data['subs'] = DB::table('categories')->where('parent_id', $id)->where('active', 1)->get();
       $data['post'] = DB::table('posts')
            ->join('categories', 'posts.category_id', 'categories.id')
            ->where('posts.id', $pid)
            ->select('posts.*', 'categories.name')
            ->first();
        return view('fronts.pages.post', $data);
       
   }
   // read post in sub category
   public function subcategory($id)
   {
       $sid = $_GET['sub'];
       $data['main'] = DB::table('categories')->where('id', $id)->first();
       $data['subs'] = DB::table('categories')->where('parent_id', $id)->where('active', 1)->get();
       $data['posts'] = DB::table('posts')
            ->join('categories', 'posts.category_id', 'categories.id')
            ->where('posts.active', 1)
            ->where('posts.category_id', $sid)
            ->orderBy('posts.id', 'desc')
            ->select('posts.*', 'categories.name')
            ->paginate(15);
        return view('fronts.pages.sub-category', $data);
   }
   // send email
   public function send_email(Request $r)
   {
       $from = $r->email;
       $subject = $r->subject;
       $name = $r->name;
       $sms = $r->message;
       $message = "<h2>". $subject ."</h2><hr>";
       $message .= "<p><strong>Sent by: {$name}, email: {$from}</strong></p><p></p>";
       $message .= "<p>{$sms}</p>";
       Right::sms($from, $subject, $message);
        $r->session()->flash('sms', 'Your email has been sent!');
       return redirect('/');
   }
   // featured work detail
   public function featured_work($id)
   {
       $data['work'] = DB::table('featured_works')->where('id', $id)->first();
       return view('fronts.featured-work-detail', $data);
   }
   // buy a plan
   public function buy($id)
   {
       // check if user login or not
       $member = session('membership');
       if($member==null)
       {
           return redirect('/sign-in');
       }
       // check if the member already have a plan
       $plan = DB::table('orders')
        ->where('member_id', $member->id)
        ->where('status', 1)
        ->first();
       if($plan!=null)
       {
           return view('fronts.have-plan');
       }
       $data['plan'] = DB::table('plans')->where('id', $id)->first();
       return view('fronts.buy', $data);
   }
   // confirm order
   public function confirm(Request $r)
   {
        $member = session('membership');
        if($member==null)
        {
            return redirect('/sign-in');
        }
        $data = array(
            'order_date' => date('Y-m-d'),
            'plan_id' => $r->plan_id,
            'member_id' => $member->id,
            'payment_type' => $r->payment
        );
        $plan = DB::table('plans')->where('id', $r->plan_id)->first();
        
        $i = DB::table('orders')->insertGetId($data);
        if($i)
        {
            // we need to send email confirmation to customer and admin 
            // send to customer
            $date = date('Y-m-d');
            $sms = <<<EOT
                <h3>Your Order Confirmation</h3>
                <hr>
                <p>
                    Dear {$member->first_name} {$member->last_name}, <br>
                    <br>
                    We just receive your order with the following information.
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
                        <td>: {$date}</td>
                    </tr>
                    <tr>
                        <td>Payment Type</td>
                        <td>: {$r->payment}</td>
                    </tr>
                    <tr>
                        <td>Approval</td>
                        <td>: Processing</td>
                    </tr>
                    <tr>
                        <td colspan='2'>Description</td>
                        
                    </tr>
                    <tr>
                        <td colspan='2'>{$plan->description}</td>
                    </tr>
                </table>
                <p>
                    Thanks for your order. We are proccessing your order. We will get back to you soon!
                </p>
EOT;
           // Right::send_email($member->email, "Your Order Confirmation", $sms);
            $sms1 = <<<EOT
            <h3>New Order Request</h3>
            <hr>
          
            <table width="700">
                <tr>
                    <td>Customer ID</td>
                    <td>: {$member->id}</td>
                </tr>
                <tr>
                    <td>Full Name</td>
                    <td>{$member->first_name} {$member->last_name}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>: {$member->email}</td>
                </tr>
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
                    <td>: {$date}</td>
                </tr>
                <tr>
                    <td>Payment Type</td>
                    <td>: {$r->payment}</td>
                </tr>
                <tr>
                    <td>Approval</td>
                    <td>: New Order</td>
                </tr>
                <tr>
                    <td colspan='2'>Description</td>
                    
                </tr>
                <tr>
                    <td colspan='2'>{$plan->description}</td>
                </tr>
            </table>
           
EOT;
            // send email to admin
            $emails = DB::table('admin_emails')->get();
            foreach($emails as $m)
            {
               // Right::send_email($m->email, "New Order Request", $sms1);
            }
            return view('fronts.success');
        }
        else{
            return view('fronts.fail');
        }
   }
   public function order()
   {
        $member = session('membership');
        if($member==null)
        {
            return redirect('/sign-in');
        }
        $data['orders'] = DB::table('orders')
            ->join('plans', 'orders.plan_id', 'plans.id')
            ->where('orders.member_id', $member->id)
            ->orderBy('orders.id', 'desc')
            ->select('orders.*', 'plans.name', 'plans.price')
            ->get();
        return view('fronts.order', $data);
   }
   public function downline()
   {
       $member = session('membership');
       if($member==null)
       {
           return redirect('/sign-in');
       }
       $data['lines'] = DB::table('memberships')
            ->where('refby', md5($member->id))
            ->get();
        return view('fronts.downline', $data);
   }
   public function payment()
   {
       $member = session('membership');
       if($member==null)
       {
           return redirect('/sign-in');
       }
       $data['pays'] = DB::table('payments')
        ->where('member_id', $member->id)
        ->get();
        return view('fronts.payment', $data);
   }
   public function request()
   {
        $member = session('membership');
        if($member==null)
        {
            return redirect('/sign-in');
        }
        $data['rate'] = DB::table('rates')->where('id',1)->first();
        return view('fronts.request', $data);
   }
   public function request_payment(Request $r)
   {
        $member = session('membership');
        if($member==null)
        {
            return redirect('/sign-in');
        }
        $score = $r->score;
        if($score>$member->score)
        {
            $r->session()->flash('sms1', "Your score is not enough!");
            return redirect('/request');
        }
        else{
            $rate = DB::table('rates')->where('id',1)->first();
            $amount = $score * $rate->rate;
            $data = array(
                'request_date' => date('Y-m-d'),
                'score' => $score,
                'amount' => $amount,
                'member_id' => $member->id
            );
            DB::table('payments')->insert($data);
            // send email to alert
            $sms =<<<EOT
            <p>Dear {$member->first_name} {$member->last_name},</p>
            <br>
            <p>
                You have requested payment with this score: {$score}. We are proccessing it and will get back to you soon!
            </p>
EOT;
            Right::send_email($member->email, "Payment Request", $sms);
            $sms1 =<<<EOT
            <p>Dear Admin,</p>
            <br>
            <p>
                There is a payment request with The following information.
            </p>
            <p>
                Member ID: {$member->id}
            </p>
            <p>
                Member Name: {$member->first_name} {$member->last_name}
            </p>
            <p>
                Email: {$member->email}
            </p>
            <p>
                Requested Score: {$score}
            </p>
            <p>
                Requested Amount: $ {$amount}
            </p>
EOT;
            $mails = DB::table('admin_emails')->get();
            foreach($mails as $m)
            {
                Right::send_email($m->email, "Payment Request", $sms1);

            }
            return view('fronts.thank');
        }
        
   }
   // get payment method
   public function get_method()
   {
       $method = DB::table('payment_method')->where('id', 1)->first();
       return json_encode($method);
   }
   public function investment()
   {
        $member = session('membership');
        if($member==null)
        {
            return redirect('/sign-in');
        }
        $data['order'] = DB::table('orders')
            ->where('member_id', $member->id)
            ->where('status', 1)
            ->first();
        return view('fronts.investment', $data);
   }

}
