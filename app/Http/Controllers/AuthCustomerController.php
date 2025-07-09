<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Accounts;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'D:/Loan_App/vendor/autoload.php';

class AuthCustomerController extends Controller
{
    public function Customer_Register(Request $request, $acc_no)
    {
        $search_acc = accounts::where('Account_No', $acc_no)->where('Status', 'Approved')->first();
        $sa = Customer::where('Account_No', $acc_no)->first();
        if(!$sa) {
            if (!$search_acc) {
                return [
                    'Message' => 'Entered Account No is Not found in our Records OR is not Approved by the Bank..!!!',
                    'Status' => 404
                ];
            } else {
                $n = 10;
                function getRandomString($n)
                {
                    return bin2hex(random_bytes($n / 2));
                }
                $me = getRandomString($n);
                Cache::put('Pswd', $me, now()->addMinutes(30));
                $post = customer::create([
                    "Account_No" => $acc_no,
                    "Full_Name" => $search_acc->Full_Name,
                    "DOB" => $search_acc->DOB,
                    "Mobile_No" => $search_acc->Mobile_No,
                    "Address" => $search_acc->Address,
                    "PAN" => $search_acc->PAN,
                    "UIDAI" => $search_acc->UIDAI,
                    "Email" => $search_acc->Email,
                    "Password" => Hash::make($me),
                    "Balance" => $search_acc->Initial_Amt
                ]);

                return [
                    'Message' => "Customer Account Created Successfully..!!!",
                    'User_Details' => $post,
                    'Password'=>$me,
                    'Status'=>200
                ];
            }
        }
        else
        {
            return [
                'Message'=>'Account number already exists in our records.',
                'Status'=>404
            ];
        }
    }

    public function Customer_Login(Request $request)
    {
        $request->validate([
            'Email' => 'required|max:255|exists:customers,Email',
            'Password' => 'required|max:255',
        ]);

        $search_user = customer::where('Email', $request->Email)->first();
        if (!$search_user) {
            return [
                'Message' => 'No such user with ' . $request->Email . ' found',
                'Status' => 404
            ];
        } else if (!$search_user || !Hash::check($request->Password, $search_user->Password)) {
            return [
                'Message' => 'Invalid credentials',
                'Status' => 404
            ];
        } else {
            $token = $search_user->createToken($search_user->Full_Name);

            return [
                'User_Details' => $search_user,
                'Message' => 'Login Successfull..!!!',
                'Status' => 200,
                'Token' => $token->plainTextToken
            ];
        }
    }

    public function Customer_Logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return [
            'Message' => 'LoggedOut Successfully..!!!',
            'Status' => 200
        ];
    }

    public function get_amt(Request $request, $acc_no)
    {
        $search_acc = Customer::where('Account_No', $acc_no)->first();
        if (!$search_acc) {
            return [
                'Message' => 'No Such Account found..!!!',
                'Status' => 404
            ];
        } else {
            return [
                'acc_no' => $acc_no,
                'amount' => $search_acc->Balance,
                'Message' => 'Account found..!!!',
                'Status' => 200
            ];
        }
    }

    public function update_pass(Request $request, $email)
    {
        $search_user = Customer::where('Email', $email)->first();
        if ($search_user) {
            $request->validate([
                'pass' => 'required|max:255|confirmed',
            ]);

            $search_user->Password = Hash::make($request->pass);
            $search_user->save();

            return [
                'Message' => 'Password Updated Successfully..!!!',
                'Status' => 200
            ];
        } else {
            return [
                'Message' => 'No such user with ' . $email . ' Found',
                'Status' => 404
            ];
        }
    }


    public function send_otp_pass(Request $request, $email)
    {
        $search_email = Customer::where('Email', $email)->first();
        if (!$search_email) {
            return [
                'Message' => 'No Accounts with '. $email .' Found..!!!',
                'Status' => 404
            ];
        } else {
            $rand_otp = rand(111111, 999999);
            Cache::put('OTP', $rand_otp, now()->addMinutes(5));
            $mail = new PHPMailer(true);
            try {
                // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username    = getenv('MAIL_USERNAME');
                $mail->Password    = getenv('MAIL_PASSWORD');
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = 587;
                $mail->setFrom(getenv('MAIL_FROM_ADDRESS'), 'IndBank');
                $mail->addAddress($email);

                $mail->isHTML(true);
                $mail->Subject = 'Your Otp for Password Reset.';
                $mail->Body    = 'Your OTP is <b><u>' . $rand_otp . '</u></b> for Password Reset<br><br><b>OTP is only valid for 5-minutes</b>';

                $mail->send();
                return [
                    'Message' => 'OTP Sent..!!!',
                    'Status' => 200
                ];
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                return [
                    "Message" => 'Error_Occured',
                    "Status" => 404
                ];
            }
        }
    }

    public function chk_otp_pass(Request $request)
    {
        $request->validate([
            'Enter_OTP' => 'required|max:255'
        ]);
        $storedOtp = Cache::pull('OTP');
        if ($request->Enter_OTP == $storedOtp) {
            return [
                'Message' => 'OTP Confirmed',
                'Status' => 200,
            ];
        } else {
            return  [
                'Message' => 'Invalid OTP',
                'Status' => 404
            ];
        }
    }

    public function ln_f(Request $request, $email)
    {   
        $search_email = Customer::where('Email', $email)->first();

        if(!$search_email)
        {
            return [
                'Message'=>'No such Account Found..!!!',
                'Status'=>404
            ];
        }
        return [
            'Message'=>'Account Found..!!!',
            'Status'=>200,
            'Details'=>$search_email
        ];
    }


    public function send_otp_login(Request $request, $email)
    {
        $search_email = Customer::where('Email', $email)->first();
        if (!$search_email) {
            return [
                'Message' => 'No Accounts with '. $email .' Found..!!!',
                'Status' => 404
            ];
        } else {
            $rand_otp = rand(111111, 999999);
            Cache::put('OTP', $rand_otp, now()->addMinutes(5));
            $mail = new PHPMailer(true);
            try {
                // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username    = getenv('MAIL_USERNAME');
                $mail->Password    = getenv('MAIL_PASSWORD');
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = 587;
                $mail->setFrom(getenv('MAIL_FROM_ADDRESS'), 'IndBank');
                $mail->addAddress($email);

                $mail->isHTML(true);
                $mail->Subject = 'Your Otp for Logging into your Account.';
                $mail->Body    = 'Your OTP is <b><u>' . $rand_otp . '</u></b>, for Logging into your Account.<br><br><b>OTP is only valid for 5-minutes</b>';

                $mail->send();
                return [
                    'Message' => 'OTP Sent..!!!',
                    'Status' => 200
                ];
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                return [
                    "Message" => 'Error_Occured',
                    "Status" => 404
                ];
            }
        }
    }

    public function chk_otp_login(Request $request)
    {
        $request->validate([
            'Enter_OTP' => 'required|max:255'
        ]);
        $storedOtp = Cache::pull('OTP');
        if ($request->Enter_OTP == $storedOtp) {
            return [
                'Message' => 'OTP Confirmed',
                'Status' => 200,
            ];
        } else {
            return  [
                'Message' => 'Invalid OTP',
                'Status' => 404
            ];
        }
    }

    public function send_pass(Request $request, $acc_no)
    {
        $search_email = Accounts::where('Account_No', $acc_no)->get('Email');
        $mall = $search_email[0]['Email'];
        if (!$search_email) {
            return [
                'Message' => 'No Accounts with '. $acc_no .' Found..!!!',
                'Status' => 404
            ];
        } else {
            $storedPass = Cache::pull('Pswd');
            $mail = new PHPMailer(true);
            try {
                // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username    = getenv('MAIL_USERNAME');
                $mail->Password    = getenv('MAIL_PASSWORD');
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = 587;
                $mail->setFrom(getenv('MAIL_FROM_ADDRESS'), 'IndBank');
                $mail->addAddress($mall);
                $mail->isHTML(true);
                $mail->Subject = 'Your Password for Logging into your Account.';
                $mail->Body    = 'Your Password is <b><u>' . $storedPass . '</u></b>, for Logging into your Account.<br><br><b>Password is only valid for 30-minutes.</b><br><br><b>Please Do Reset Your Password After LogIn.</b>';

                $mail->send();
                return [
                    'Message' => 'Password Sent..!!!',
                    'Status' => 200
                ];
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                return [
                    "Message" => 'Error_Occured',
                    "Status" => 404
                ];
            }
        }
    }
}
