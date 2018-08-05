<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
use Intervention\Image\ImageManagerStatic as Image;
class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // index
    public function index()
    {
        if(!Right::check('Video', 'l'))
        {
            return view('permissions.no');
        }
        $data['videos'] = DB::table('videos')
            ->where('videos.active',1)
            ->orderBy('videos.id', 'desc')
            ->paginate(18);
        return view('videos.index', $data);
    }
    // load create form
    public function create()
    {
        if(!Right::check('Video', 'i'))
        {
            return view('permissions.no');
        }
        return view('videos.create');
    }
    // save new social
    public function save(Request $r)
    {
        if(!Right::check('Video', 'i'))
        {
            return view('permissions.no');
        }
        $data = array(
            'url' => $r->url,
            'title' => $r->title,
        );
        $i = DB::table('videos')->insertGetId($data);

        if ($i) {
            $r->session()->flash("sms", "New video has been created successfully!");
            return redirect("/admin/video/create");
        } else {
            $r->session()->flash("sms1", "Fail to create new video!");
            return redirect("/admin/video/create")->withInput();
        }   
    }
    // delete
    public function delete($id)
    {
        if(!Right::check('Video', 'd'))
        {
            return view('permissions.no');
        }

        DB::table('videos')->where('id', $id)->update(['active'=>0]);
        return redirect('/admin/video');
    }

    public function edit($id)
    {
        if(!Right::check('Video', 'u'))
        {
            return view('permissions.no');
        }
        $data['video'] = DB::table('videos')
            ->where('id',$id)->first();
        return view('videos.edit', $data);
    }
    
    public function update(Request $r)
    {
        if(!Right::check('Video', 'u'))
        {
            return view('permissions.no');
        }
    	$data = array(
            'url' => $r->url,
            'title' => $r->title,
        );
        $sms = "All changes have been saved successfully.";
        $sms1 = "Fail to to save changes, please check again!";
        $i = DB::table('videos')->where('id', $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/admin/video/edit/'.$r->id);
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/admin/video/edit/'.$r->id);
        }
    }
}
