<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
use Session;
class KYCController extends Controller
{
    public function index()
    {
        $member = session('membership');
        if($member==null)
        {
            return redirect('/sign-in');
        }
        $data['kyc'] = DB::table('documents')
                ->where('member_id', $member->id)
                ->first();
        return view('fronts.kyc', $data);
    }
    public function delete($id)
    {
        $member = session('membership');
        if($member==null)
        {
            return redirect('/sign-in');
        }
        $file = DB::table('documents')->where('id', $id)->first();
        unlink($file->file_name);

        DB::table('documents')->where('id', $id)->delete();
        return redirect('/kyc');
    }
    public function create()
    {
        $member = session('membership');
        if($member==null)
        {
            return redirect('/sign-in');
        }
       
        return view('fronts.kyc-form');
    }
    public function save(Request $r)
    {
        $member = session('membership');
        if($member==null)
        {
            return redirect('/sign-in');
        }
       $data = array(
           
           'first_name' => $r->first_name,
           'last_name' => $r->last_name,
           'phone' => $r->phone,
           'current_address' => $r->current_address,
           'member_id' => $member->id
       );
       
       if($r->file_name)
       {
           // upload and rename file
           $data['file_name'] = $r->file('file_name')->store('uploads/documents/', 'custom');
           
       }
       if($r->file_name1)
       {
           // upload and rename file
           $data['file_name1'] = $r->file('file_name1')->store('uploads/documents/', 'custom');
           
       }
       DB::table('documents')->insert($data);
       return redirect('/kyc');
    }
    public function edit($id)
    {
        $member = session('membership');
        if($member==null)
        {
            return redirect('/sign-in');
        }
       $data['kyc'] = DB::table('documents')->where('id', $id)->first();
        return view('fronts.kyc-edit', $data);
    }
    public function update(Request $r)
    {
        $member = session('membership');
        if($member==null)
        {
            return redirect('/sign-in');
        }
       $data = array(
           
           'first_name' => $r->first_name,
           'last_name' => $r->last_name,
           'phone' => $r->phone,
           'current_address' => $r->current_address,
           'member_id' => $member->id
       );
       
       if($r->file_name)
       {
           // upload and rename file
           $data['file_name'] = $r->file('file_name')->store('uploads/documents/', 'custom');
           
       }
       if($r->file_name1)
       {
           // upload and rename file
           $data['file_name1'] = $r->file('file_name1')->store('uploads/documents/', 'custom');
           
       }
       DB::table('documents')->where('id', $r->id)->update($data);
       return redirect('/kyc');
    }
}
