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
        
    }
}
