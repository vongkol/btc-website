<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class AnnouncementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data['announcements'] = DB::table('announcements')
            ->orderBy('id', 'desc')
            ->paginate(18);
        return view('announcements.index', $data);

    }
    public function create()
    {
        return view('announcements.create');
    }
    public function save(Request $r)
    {
        $data = array(
            'title' => $r->title,
            'short_description' => $r->short_description,
            'description' => $r->description,
            'create_at' => date('Y-m-d')
        );
        $i = DB::table('announcements')->insert($data);
        if($i)
        {
            $r->session()->flash('sms', 'You announcement has been created successfully!');
            return redirect('/admin/announcement/create');
        }
        else{
            $r->session()->flash('sm1', 'Fail to create new announcement. Check your input again!');
            return redirect('/admin/announcement/create')->withInput();
        }
    }
    public function edit($id)
    {
        $data['anc'] = DB::table('announcements')->where('id', $id)->first();
        return view('announcements.edit', $data);
    }
    public function update(Request $r)
    {
        $data = array(
            'title' => $r->title,
            'short_description' => $r->short_description,
            'description' => $r->description
        );
        $i = DB::table('announcements')->where('id', $r->id)->update($data);
        if($i)
        {
            $r->session()->flash('sms', 'All changes have saved successfully!');
            return redirect('/admin/announcement/edit/'.$r->id);
        }
        else{
            $r->session()->flash('sm1', 'Fail to save changes. You might not make any change!');
            return redirect('/admin/announcement/edit/'.$r->id);
        }
    }
    public function delete($id)
    {
        DB::table('announcements')->where('id', $id)->delete();
        return redirect('/admin/announcement');
    }
}
