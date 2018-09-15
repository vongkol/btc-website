<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
class PlanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // index
    public function index()
    {
        $data['plans'] = DB::table('plans')
            ->where('active', 1)
            ->orderBy('id', 'desc')
            ->paginate(18);
        return view('plans.index', $data);
    }
    // load create form
    public function create()
    {
        return view('plans.create');
    }
    // save new page
    public function save(Request $r)
    {
        $data = array(
            'name' => $r->name,
            'description' => $r->description
        );
        $sms = "The new page has been created successfully.";
        $sms1 = "Fail to create the new page, please check again!";
        $i = DB::table('plans')->insert($data);
       
        if($i){
            $r->session()->flash('sms', 'New plan has been created successfully!');
            return redirect('/admin/plan/create');
        }
        else{
            $r->session()->flash('sms1', 'Fail to create new post. Please check your input again!');
            return redirect('/admin/plan/create')->withInput();
        }
    }
    // delete
    public function delete($id)
    {
        DB::table('plans')->where('id', $id)->update(['active'=>0]);
        return redirect('/admin/plan');
    }

    public function edit($id)
    {
        $data['plan'] = DB::table('plans')
            ->where('id',$id)->first();
        return view('plans.edit', $data);
    }

    public function update(Request $r)
    {
        $data = array(
            'name' => $r->name,
            'description' => $r->description
        );
        $i = DB::table('plans')->where('id', $r->id)->update($data);
        if ($i)
        {
            $sms = "All changes have been saved successfully.";
            $r->session()->flash('sms', $sms);
            return redirect('/admin/plan/edit/'.$r->id);
        }
        else
        {   
            $sms1 = "Fail to to save changes, please check again!";
            $r->session()->flash('sms1', $sms1);
            return redirect('/admin/plan/edit/'.$r->id);
        }
    }
    // view detail
    public function view($id) 
    {
        $data['plan'] = DB::table('plans')
            ->where('id',$id)->first();
        return view('plans.view', $data);
    }
}

