<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use PHPMailer\PHPMailer\PHPMailer;

class Right
{
    public static function check($permission_name, $action) {
    	$role_id = Auth::user()->role_id;
    	$q = DB::table('role_permissions')
                ->join('permissions', 'permissions.id', '=', 'role_permissions.permission_id')
                ->select('role_permissions.list','role_permissions.insert','role_permissions.delete','role_permissions.update')
                ->where(['role_permissions'.'.role_id' => $role_id, 'permissions.name' => $permission_name]);

        switch ($action) {
        	case 'i':
        		$q = $q->where('role_permissions.insert', 1);
        		break;
        	case 'u':
        		$q = $q->where('role_permissions.update', 1);
        		break;
        	case 'd':
        		$q = $q->where('role_permissions.delete', 1);
        		break;
    		case 'l':
        		$q = $q->where('role_permissions.list', 1);
        		break;	
        	default:
        		break;
        }
	   
       	return $q->count() > 0;
    }
    public static function branch($id)
    {
        $arr = array();
        $data = DB::table('user_branches')->where('user_id', $id)->get();
        foreach($data as $b)
        {
            array_push($arr, $b->branch_id);
        }
        return $arr;
    }
    public static function send_sms($to, $subject, $message)
    {
        $mail = new PHPMailer(true); // notice the \  you have to use root namespace here
        try {
            $mail->isSMTP(); // tell to use smtp
            $mail->CharSet = "utf-8"; // set charset to utf8
            $mail->SMTPAuth = true;  // use smpt auth
            $mail->SMTPSecure = "ssl"; // or ssl
            $mail->Host = "sg06.tmd.cloud";
            $mail->Port = 465; 
            $mail->Username = "sales@bill-trade.com";
            $mail->Password = "Khmer@123";
            $mail->setFrom("sales@bill-trade.com", "BT Team");
            $mail->Subject = $subject;
            $mail->MsgHTML($message);
            $mail->addAddress($to, $to);
            $mail->send();
        } catch (phpmailerException $e) {
//            dd($e);
        } catch (Exception $e) {
//            dd($e);
        }
    }
    public static function sms($to, $message)
    {
        $mail = new PHPMailer(true); // notice the \  you have to use root namespace here
        try {
            $mail->isSMTP(); // tell to use smtp
            $mail->CharSet = "utf-8"; // set charset to utf8
            $mail->SMTPAuth = true;  // use smpt auth
            $mail->SMTPSecure = "ssl"; // or ssl
            $mail->Host = "sg06.tmd.cloud";
            $mail->Port = 465; 
            $mail->Username = "sales@bill-trade.com";
            $mail->Password = "Khmer@123";
            $mail->setFrom("sales@bill-trade.com", "BT Team");
            $mail->Subject = "Confirm Your Registration";
            $mail->MsgHTML($message);
            $mail->addAddress($to, $to);
            $mail->send();
        } catch (phpmailerException $e) {
//            dd($e);
        } catch (Exception $e) {
//            dd($e);
        }
        return 1;
    }
    public static function send_email($to, $subject, $message)
    {
        $mail = new PHPMailer(true); 
        try {
            $mail->isSMTP(); 
            $mail->CharSet = "utf-8"; 
            $mail->SMTPAuth = true; 
            $mail->SMTPSecure = "ssl";
            $mail->Host = "sg06.tmd.cloud";
            $mail->Port = 465; 
            $mail->Username = "sales@bill-trade.com";
            $mail->Password = "Khmer@123";
            $mail->setFrom("sales@bill-trade.com", "sales@bill-trade.com");
            $mail->Subject = $subject;
            $mail->MsgHTML($message);
            $mail->addAddress($to, $to);
            $mail->send();
        } catch (phpmailerException $e) {
//            dd($e);
        } catch (Exception $e) {
//            dd($e);
        }
        return 1;
    }
    public static function send_email_membership($send_to, $id)
    {
        $a = 'https://bill-trade.com/membership/service/reset/'.$id;
        $mail = new PHPMailer(true); // notice the \  you have to use root namespace here
        try {
            $mail->isSMTP(); // tell to use smtp
            $mail->CharSet = "utf-8"; // set charset to utf8
            $mail->SMTPAuth = true;  // use smpt auth
            $mail->SMTPSecure = "ssl"; // or ssl
            $mail->Host = "sg06.tmd.cloud";
            $mail->Port = 465; // most likely something different for you. This is the mailtrap.io port i use for testing.
            $mail->Username = "sales@bill-trade.com";
            $mail->Password = "Khmer@123";
            $mail->setFrom("sales@bill-trade.com", "sales@bill-trade.com");
            $mail->Subject = "Reset Your Password";
            $mail->MsgHTML("<p>Please click the link below to reset your password.</p><p><a href='{$a}'>{$a}</a></p>");
            $mail->addAddress($send_to, $send_to);
            $mail->send();
        } catch (phpmailerException $e) {
           dd($e);
        } catch (Exception $e) {
           dd($e);
        }
        return 1;
    }
}