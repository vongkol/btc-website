<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Intervention\Image\ImageManagerStatic as Image;
class SigninController extends Controller
{
    // index
    public function index()
    {
        return view('fronts.sign-in');
    }
    
    public function login(Request $r) {
        $username = $r->username;
        $pass = $r->pass;
        $membership = DB::table('memberships')->where('active',1)->where('username', $username)->first();
      
        if($membership!=null)
        {  
            if(password_verify($pass, $membership->password) && $membership->verify==1)
            {
              
                
                if($r->session()->get('membership')!=NULL)
                {
                    $r->session()->forget('membership');
                    $r->session()->flush();
                }
                // save user to session
                $r->session()->put('membership', $membership);
              
                return redirect('/dashboard');
            }
            else{
                $r->session()->flash('sms1', "Invalid email or password. Try again!");
                return redirect('/sign-in')->withInput();
            }
        }
        else{
            $r->session()->flash('sms1', "Invalid email or password!");
            return redirect('/sign-in')->withInput();
        }
    }

    // logout function
    public function logout(Request $request)
    {
        $request->session()->forget('membership');
        $request->session()->flush();
        return redirect('/');
    }

    public function profile(Request $r) {
        $data['profile'] = DB::table('memberships')->where('id',$r->session()->get('membership')->id)->first();
        return view('fronts.profile', $data);
    }
     

    public function edit($id)
    {
        $data['profile'] = DB::table('memberships')
            ->where('id',$id)->first();
        return view('fronts.profile-edit', $data);
    }

    public function update(Request $r) {
        // check the email if it is valid or not
        if (!filter_var($r->email, FILTER_VALIDATE_EMAIL)) {
            $r->session()->flash('sms1', "Your email is invalid. Check it again!");
            return redirect('/profile/edit/'.$r->id)->withInput();
        }
        $count_email = DB::table('memberships')->where('id', "!=", $r->id)
            ->where('email', $r->email)
            ->count();
        if($count_email>0)
        {
            $r->session()->flash('sms1', "The email '{$r->email}' already exist. Change a new one!");
            return redirect('/profile/edit/'.$r->id);
        }
        $data = array(
            'first_name' => $r->first_name,
            'last_name' => $r->last_name,
            'gender' => $r->gender,
            'email' => $r->email,
            'username' => $r->username
        );
        if($r->photo) {
            $file = $r->file('photo');
            $file_name = $file->getClientOriginalName();
            $ss = substr($file_name, strripos($file_name, '.'), strlen($file_name));
            $file_name = 'profile' .$r->id . $ss;
          
            $destinationPath = 'uploads/profiles/'; // usually in public folder
         
            // upload 250
            $n_destinationPath = 'uploads/profiles/small/';
            $new_img = Image::make($file->getRealPath())->resize(120, null, function ($con) {
                $con->aspectRatio();
            });
           

            $nn_destinationPath = 'uploads/profiles/smaller/';
            $new_img1 = Image::make($file->getRealPath())->resize(30, null, function ($con) {
                $con->aspectRatio();
            });
            $new_img1->save($nn_destinationPath . $file_name, 80);
            $new_img->save($n_destinationPath . $file_name, 80);
            $file->move($destinationPath, $file_name);
            $data['photo'] = $file_name;
        } 
        $sms = "All changes have been saved successfully.";
        $sms1 = "Fail to to save changes, please check again!";
        $i = DB::table('memberships')->where('id', $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/profile/edit/'.$r->id);
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/profile/edit/'.$r->id);
        }

    }
    
    public function upload(Request $r)
    {
        if($r->photo) {
            $file = $r->file('photo');
            $file_name = $file->getClientOriginalName();
            $ss = substr($file_name, strripos($file_name, '.'), strlen($file_name));
            $file_name = 'profile' .$r->id . $ss;
          
            $destinationPath = 'uploads/profiles/'; // usually in public folder
         
            // upload 250
            $n_destinationPath = 'uploads/profiles/small/';
            $new_img = Image::make($file->getRealPath())->resize(120, null, function ($con) {
                $con->aspectRatio();
            });
           

            $nn_destinationPath = 'uploads/profiles/smaller/';
            $new_img1 = Image::make($file->getRealPath())->resize(30, null, function ($con) {
                $con->aspectRatio();
            });
            $new_img1->save($nn_destinationPath . $file_name, 80);
            $new_img->save($n_destinationPath . $file_name, 80);
            $file->move($destinationPath, $file_name);
            $data['photo'] = $file_name;
            $i = DB::table('memberships')->where('id', $r->id)->update($data);
            $sms = "All changes have been saved successfully.";
            $r->session()->flash('sms', $sms);
            return redirect('/profile');
        } 
            else
            {   
                $sms1 = "Fail to to save changes, please check again!";
                $r->session()->flash('sms1', $sms1);
                return redirect('/profile');
            }
        }
        
        public function reset_password() {
            return view("fronts.reset-password");
        }

        public function forget_password() {
            return view("fronts.forget-password");
        }

        
        // reset password
        public function recovery_password(Request $r)
        {
            $email = $r->email;
            // check if email exist
            $result = DB::table("memberships")->where("email", $email)->first();

            if ($result!=null)
            {
                $id = md5($result->id);
                $i = Right::send_email_membership($email, $id);
                // update recovery mode for shop owern
                DB::select("update memberships set recovery_mode=1 where md5(id)='{$id}'");
                if($i) {
                    $r->session()->flash("sms", "Please check your email!");
                    return redirect('/membership/forget-password');
                }
            }
            else{
                $r->session()->flash("sms1", "Your email does not exist in Bill-Trade!");
                return redirect('/membership/forget-password')->withInput();
            }
        }

         // load new password form for membership
        public function new_password($id)
        {
            $data['id'] = $id;
            return view("fronts.recovery-password", $data);
        }
        public function update_password(Request $r)
        {
            $pass = password_hash($r->password, PASSWORD_BCRYPT);
            DB::select("update memberships set password='{$pass}', recovery_mode=0 where md5(id)='{$r->id}' and recovery_mode=1");
            $r->session()->flash("sms", "You has been reset your password. Please login with your new password.");
            return redirect('/sign-in');
        }

        public function change_password(Request $r) {
            $membership = $r->session()->get('membership');
            if($membership==NULL)
            {
                return redirect('/membership/reset-password');
            }
            $id = $membership->id;
            
            $data = ['password' => password_hash($r->password, PASSWORD_BCRYPT)];
            $i = DB::table('memberships')->where('id', $id)->update($data);
            if($i)
            {
                $r->session()->flash('sms', "Your new password has been changed successfully! please login with a new passowrd");
                return redirect('/membership/reset-password');
            }
            else{
                 $r->session()->flash('sms1', "Cannot reset your password!");
                return redirect('/membership/reset-password');
            }
        }
}
