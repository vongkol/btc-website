<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data['pays'] = DB::table('payments')
            ->join('memberships', 'payments.member_id', 'memberships.id')
            ->orderBy('payments.id', 'desc')
            ->select('payments.*', 'memberships.first_name', 'memberships.last_name', 'memberships.email')
            ->paginate(18);
        return view('payments.index', $data);
    }
    public function delete($id)
    {
        $p = DB::table('payments')->where('id', $id)->first();
        if($p->status>0)
        {
            return redirect('/admin/payment');
        }
        else{
            DB::table('payments')
                ->where('id', $id)
                ->delete();
            return redirect('/admin/payment');
        }
    }
    public function approve($id)
    {
        $p = DB::table('payments')->where('id', $id)->first();
        $m = DB::table('memberships')->where('id', $p->member_id)->first();
        $t = $m->score - $p->score;
        DB::table('payments')->where('id', $id)->update(['status'=>1]);
        DB::table('memberships')->where('id', $p->member_id)->update(['score'=>$t]);
        $sms =<<<EOT
            <p>Dear {$m->first_name} {$m->last_name},</p>
            <br>
            <p>
                Your payment request with these information has been approved!
            </p>
            <p>
                Request ID: {$p->id}
            </p>
            <p>
                Request Date: {$p->request_date}
            </p>
            <p>
                Amount: $ {$p->score}
            </p>
EOT;
        Right::send_email($m->email, "Payment Request Approval", $sms);
        return redirect('/admin/payment');
    }

    public function detail($id)
    {
        $data['payment'] = DB::table('payments')
            ->join('memberships', 'payments.member_id', 'memberships.id')
            ->where('payments.id', $id)
            ->select('payments.*', 'memberships.first_name', 'memberships.last_name', 'memberships.email')
            ->first();
        return view('payments.detail', $data);
    }
}
