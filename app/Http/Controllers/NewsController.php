<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data['news'] = DB::table('news')
            ->where('active', 1)
            ->orderBy('id', 'desc')
            ->paginate(18);
        return view('news.index', $data);
    }
    public function create()
    {
        return view('news.create');
    }
    public function save(Request $r)
    {
        $data = array(
            'title' => $r->title,
            'short_description' => $r->short_description,
            'description' => $r->description
        );
        $i = DB::table('news')->insertGetId($data);
        if($r->photo)
        {
            $file = $r->file('photo');
            $file_name = $file->getClientOriginalName();
            $ss = substr($file_name, strripos($file_name, '.'), strlen($file_name));
            $file_name = md5($i) . $ss;
            $dsPath = 'uploads/news/';
            $file->move($dsPath, $file_name);
            DB::table('news')->where('id', $i)->update(['featured_image'=>$file_name]);
        }
        if($i)
        {
            $r->session()->flash('sms', 'Your news has been saved successfully!');
            return redirect('admin/news/create');
        }
        else{
            $r->session()->flash('sms1', 'Fail to create news. Please check your input again!');
            return redirect('admin/news/create')->withInput();
        }
    }
    public function edit($id)
    {
        $data['news'] = DB::table('news')->where('id', $id)->first();
        return view('news.edit', $data);
    }
    public function update(Request $r)
    {
        $data = array(
            'title' => $r->title,
            'short_description' => $r->short_description,
            'description' => $r->description
        );
        if($r->photo)
        {
            $file = $r->file('photo');
            $file_name = $file->getClientOriginalName();
            $ss = substr($file_name, strripos($file_name, '.'), strlen($file_name));
            $file_name = md5($r->id) . $ss;
            $dsPath = 'uploads/news/';
            $file->move($dsPath, $file_name);
            $data['featured_image'] = $file_name;
        }
        $i = DB::table('news')->where('id', $r->id)->update($data);
        if($i)
        {
            $r->session()->flash('sms', 'Your news has been updated successfully!');
            return redirect('admin/news/edit/'.$r->id);
        }
        else{
            $r->session()->flash('sms1', 'Fail to update news. Please check your input again!');
            return redirect('admin/news/edit/'.$r->id);
        }
    }
    public function delete($id)
    {
        DB::table('news')->where('id', $id)->update(['active'=>0]);
        return redirect('/admin/news');
    }
}
