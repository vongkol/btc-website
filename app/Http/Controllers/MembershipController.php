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
            ->select('orders.*', 'plans.name', 'plans.price')
            ->get();
        $data['lowers'] = DB::table('memberships')
            ->where('refby', md5($id))
            ->orderBy('id', 'desc')
            ->get();
        $data['payments'] = DB::table('payments')
            ->where('member_id', $id)
            ->orderBy('id', 'desc')
            ->get();
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
        DB::table('memberships')->where('id', $id)->update(['active'=>0]);
        return redirect('/admin/membership');
    }

    public function edit($id)
    {
        if(!Right::check('Page', 'u'))
        {
            return view('permissions.no');
        }
        $data['page'] = DB::table('pages')
            ->where('id',$id)->first();
        return view('pages.edit', $data);
    }

    public function update(Request $r)
    {
        if(!Right::check('Page', 'u'))
        {
            return view('permissions.no');
        }
        $data = array(
            'title' => $r->title,
            'description' => $r->description
        );
        $i = DB::table('pages')->where('id', $r->id)->update($data);
        if ($i)
        {
            $sms = "All changes have been saved successfully.";
            $r->session()->flash('sms', $sms);
            return redirect('/admin/page/edit/'.$r->id);
        }
        else
        {   
            $sms1 = "Fail to to save changes, please check again!";
            $r->session()->flash('sms1', $sms1);
            return redirect('/admin/page/edit/'.$r->id);
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
}

