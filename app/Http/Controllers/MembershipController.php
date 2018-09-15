<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
class MembershipController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // index
    public function index()
    {
        $data['memberships'] = DB::table('memberships')
            ->where('active', 1)
            ->orderBy('id', 'desc')
            ->paginate(18);
        return view('memberships.index', $data);
    }
    public function detail($id)
    {
        $data['member'] = DB::table('memberships')
            ->where('id', $id)
            ->first();
        $data['orders'] = DB::table('orders')
            ->join('plans', 'orders.plan_id', 'plans.id')
            ->where('orders.member_id', $id)
            ->orderBy('orders.id', 'desc')
            ->select('orders.*', 'plans.name')
            ->get();
        $data['lowers'] = DB::table('memberships')
            ->where('refby', $data['member']->username)
            ->orderBy('id', 'desc')
            ->get();
        $data['payments'] = DB::table('payments')
            ->where('member_id', $id)
            ->orderBy('id', 'desc')
            ->get();
        $data['kyc'] = DB::table('documents')
            ->where('member_id', $id)
            ->first();
        return view('memberships.detail', $data);
    }
    // load create form
    public function create()
    {
        if(!Right::check('Page', 'i'))
        {
            return view('permissions.no');
        }
        return view('memberships.create');
    }
    // save new page
    public function save(Request $r)
    {
        if(!Right::check('Page', 'i'))
        {
            return view('permissions.no');
        }
        $data = array(
            'title' => $r->title,
            'description' => $r->description
        );
        $sms = "The new page has been created successfully.";
        $sms1 = "Fail to create the new page, please check again!";
        $i = DB::table('pages')->insertGetId($data);
        $url = '/page/'.$i;
        DB::table('pages')->where('id', $i)->update(['url'=> $url]);
        if($i){
            $r->session()->flash('sms', 'New page has been created successfully!');
            return redirect('/admin/page/create');
        }
        else{
            $r->session()->flash('sms1', 'Fail to create new post. Please check your input again!');
            return redirect('/admin/page/create')->withInput();
        }
    }
    // delete
    public function delete($id)
    {
        DB::table('memberships')->where('id', $id)->delete();
        return redirect('/admin/membership');
    }

    public function edit($id)
    {
      
        $data['m'] = DB::table('memberships')
            ->where('id',$id)->first();
        return view('memberships.edit', $data);
    }

    public function update(Request $r)
    {
       
        $data = array(
            'first_name' => $r->first_name,
            'last_name' => $r->last_name,
            'gender' => $r->gender,
            'email' => $r->email,
            'country' => $r->country,
            'city' => $r->city,
            'postal_code' => $r->postal_code,
            'username' => $r->username,
            'score' => $r->score
        );
        if($r->password!=null)
        {
            $data['password'] = bcrypt($r->password);
        }
        $i = DB::table('memberships')->where('id', $r->id)->update($data);
        if ($i)
        {
            $sms = "All changes have been saved successfully.";
            $r->session()->flash('sms', $sms);
            return redirect('/admin/membership');
        }
        else
        {   
            $sms1 = "Fail to to save changes, you might not make any change!";
            $r->session()->flash('sms1', $sms1);
            return redirect('/admin/membership/edit/'.$r->id);
        }
    }
    public function edit_score($id)
    {
        $member = DB::table('memberships')
            ->where('id', $id)
            ->first();
        return view('memberships.edit-score', compact('member'));
    }
    public function update_score(Request $r)
    {
        $data = array(
            'score' => $r->score
        );
        DB::table('memberships')->where('id', $r->id)->update($data);
        $r->session()->flash('sms', "Score has been updated!");
        return redirect("/admin/membership/edit-score/".$r->id);
    }
    public function delete_document()
    {
        $id = $_GET['id'];
        $dc = $_GET['dc'];
        $file = DB::table('documents')->where('id', $dc)->first();
        unlink($file->file_name);
        DB::table('documents')->where('id', $dc)->delete();
        return redirect('/admin/membership/detail/'.$id);
    }
    public function approve_document()
    {
        $id = $_GET['id'];
        $dc = $_GET['dc'];
        DB::table('documents')->where('id', $dc)->update(['approved'=>1]);
        return redirect('/admin/membership/detail/'.$id);
    }
    public function de_approve()
    {
        $id = $_GET['id'];
        $dc = $_GET['dc'];
        DB::table('documents')->where('id', $dc)->update(['approved'=>0]);
        return redirect('/admin/membership/detail/'.$id);
    }
}

