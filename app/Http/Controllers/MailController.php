<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class MailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data['mails'] = DB::table('mails')->orderBy('id', 'desc')->paginate(18);
        return view('mails.index', $data);
    }
    
    public function create()
    {
        return view('mails.create');
    }
    public function save(Request $r)
    {
        $members = DB::table('memberships')->where('active', 1)->get();
        $data = array(
            'subject' => $r->subject,
            'message' => $r->description,
            'send_date' => date('Y-m-d')
        );
        foreach($members as $m)
        {
            if (filter_var($m->email, FILTER_VALIDATE_EMAIL)) 
            {
                Right::send_sms($m->email, $r->subject, $r->description);
            } 
        }
        DB::table('mails')->insert($data);
        $r->session()->flash('sms', 'Your email has been sent!');
        return redirect('admin/mail');
    }
    public function delete($id)
    {
        DB::table('mails')->where('id', $id)->delete();
        return redirect('admin/mail');
    }
    public function view($id)
    {
        $data['mail'] = DB::table('mails')->where('id', $id)->first();
        return view('mails.view', $data);
    }
}
