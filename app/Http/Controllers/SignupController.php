<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class SignupController extends Controller
{
    // index
    public function index(Request $r)
    {
        $data['countries'] = DB::table('apps_countries')->get();
        $data['ref'] = "";
        if($r->ref)
        {
            $data['ref'] = $r->ref;
        }
        return view('fronts.sign-up', $data);
    }
    public function save(Request $r)
    {
        // check the email if it is valid or not
        if (!filter_var($r->email, FILTER_VALIDATE_EMAIL)) {
            $r->session()->flash('sms1', "Your email is invalid. Check it again!");
            return redirect('/sign-up')->withInput();
        }
        $count_email = DB::table('memberships')
            ->where('email', $r->email)
            ->count();
        $counter = DB::table('memberships')
            ->where('username', $r->username)
            ->count();
        $pass_leg = strlen($r->password);
        if($count_email === 0 && $pass_leg >= 6 && $counter==0) {
            $data = array(
                'first_name' => $r->first_name,
                'last_name'=> $r->last_name,
                'gender' => $r->gender,
                'email' => $r->email,
                'country' => $r->country,
                'city' => $r->city,
                'postal_code' => $r->zipcode,
                'username' => $r->username,
                'refby' => $r->ref,
                'password' => password_hash($r->password, PASSWORD_BCRYPT)
            );
            $sms = "The sign up has been created successfully.";
            $sms1 = "Fail to create the sign up, please check again!";
            $i = DB::table('memberships')->insertGetId($data);
            if ($i)
            {
                $link = "https://bill-trade.com/confirm/".md5($i);
               
                $sms =<<<EOT
                <h2>Sign Up Verification</h2>
                <hr>
                <p>
                    Please click the link below to verify your registration.
                </p>
                <p>
                    <a href="{$link}" target="_blank">{$link}</a>
                </p>
EOT;
                // send email confirmation
                Right::send_sms($r->email, "Confirm Your Registration", $sms);
                return view('fronts.confirm');
            }
            else
            {
                $r->session()->flash('sms1', $sms1);
                return redirect('/sign-up')->withInput();
            }
        } else {
            if ($count_email > 0) {
                $sms1 = "Your email already exist. Please use a different one!";
            } 
            else if($counter>0)
            {
                $sms1 = "Ther username is already existed. Please use a different one!";
            }
            if ($pass_leg < 6) {
                $sms1 = "Your password should be equal or max than 6 characters";
            } 
            $r->session()->flash('sms1', $sms1);
            return redirect('/sign-up')->withInput();
        }
    } 
    public function confirm($id)
    {
        // DB::statement("UPDATE memberships set verify=1 where md5(id)='{$id}'");
        DB::table('memberships')->where(DB::raw('md5(id)'), $id)->update(['verify'=>1]);
        return redirect('/sign-in');
        
    }
}
