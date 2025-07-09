<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\transactions;
use App\Models\Customer;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'D:/Loan_App/vendor/autoload.php';

class TranscationController extends Controller
{
    public function debit(Request $request, $acc_no)
    {
        $ca = Customer::where('Account_No', $acc_no)->first();
        $fields = $request->validate([
            "Description" => 'required|max:255',
            "Mode" => 'required|max:255',
            "Type" => 'required|max:255',
            "To" => 'required|max:255',
            "Amount" => 'required|max:255',
        ]);
        $chk_to = Customer::where("Account_No", $request->To)->first();
        if ($acc_no != $request->To) {
            if ($ca) {
                if ($chk_to) {
                    if ($request->Type == "Debit") {
                        $id = rand(11111, 99999);
                        $current_acc = Customer::where('Account_No', $acc_no)->first();
                        $current_bal = $current_acc->Balance;
                        if ($request->Amount <= $current_bal) {
                            if ((float)$request->Amount >= 10) {
                                $post = transactions::create([
                                    'Transaction_Id' => "DB" . $id,
                                    'Date' => now(),
                                    'Description' => $fields['Description'],
                                    'Mode' => $fields['Mode'],
                                    'Trans_Type' => $fields['Type'],
                                    'From' => $acc_no,
                                    'To' => $fields['To'],
                                    'Amount' => $fields['Amount'],
                                    $total_bal = (float)$current_bal - (float)$fields['Amount'],
                                    'F_Balance' => $total_bal,
                                    $to_bal = (float)$chk_to->Balance + (float)$fields['Amount'],
                                    'T_Balance' => $to_bal
                                ]);
                                $current_acc->Balance = $total_bal;
                                $current_acc->save();

                                $chk_to->Balance = $to_bal;
                                $chk_to->save();

                                return [
                                    "Transaction_Details" => $post,
                                    "Message" => 'Transaction Successfull..!!!',
                                    "Status" => 200
                                ];
                            } else {
                                return [
                                    'Message' => 'Amount should be Greater than Rs.10',
                                    'Status' => 404
                                ];
                            }
                        } else {
                            return [
                                'Message' => 'Amount is more that Current Balance..!!!',
                                'Status' => 404
                            ];
                        }
                    } else {
                        return [
                            'Message' => 'Invalid Input..!!!',
                            'Status' => 404
                        ];
                    }
                } else {
                    return [
                        'Message' => 'To Account_No. Cannot be found..!!!',
                        'Status' => 404
                    ];
                }
            } else {
                return [
                    'Message' => 'No such Account with ' . $acc_no,
                    'Status' => 404
                ];
            }
        } else {
            return [
                'Message' => 'From and To accounts cannot be the same..!!!',
                'Status' => 404
            ];
        }
    }

    public function trans_det(Request $request, $acc_no)
    {
        $from_details = transactions::where('From', $acc_no)->get();
        $to_details = transactions::where('To', $acc_no)->get();
        if ($from_details && $to_details) {
            return [
                'From_Records' => $from_details,
                'To_Records' => $to_details,
                'Message' => 'Record Found..!!!',
                'Status' => 200
            ];
        } else {
            return [
                'Message' => "No Records Found..!!!",
                'Status' => 404
            ];
        }
    }

    public function send_otp(Request $request, $email)
    {
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
            $mail->Subject = 'Your Otp for Funds Transfering.';
            $mail->Body    = 'Your OTP is <b><u>' . $rand_otp . '</u></b> for Transfering of Funds.<br><br><b>OTP is only valid for 5-minutes</b>';

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

    public function chk_otp(Request $request)
    {
        $request->validate([
            'Enter_OTP' => 'required|max:255'
        ]);
        $storedOtp = Cache::pull('OTP');
        if ($request->Enter_OTP == $storedOtp) {
            return [
                'Message' => 'OTP Confirmed',
                'Status' => 200,
                'Enter_OTP' => $request->Enter_OTP,
                'User_OTP' => $storedOtp
            ];
        } else {
            return  [
                'Message' => 'Invalid OTP',
                'Status' => 404
            ];
        }
    }

    public function get_details(Request $request, $acc_no)
    {
        $search_user = Customer::where('Account_No', $acc_no)->first();

        if ($search_user) {
            return [
                'Details' => $search_user,
                'Name' => $search_user->Full_Name,
                'Message' => 'Details Found..!!!',
                'Status' => 200
            ];
        } else {
            return [
                'Message' => 'No such User..!!!',
                'Status' => 404
            ];
        }
    }
}
