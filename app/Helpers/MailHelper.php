<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendToAllUsers;

class MailHelper
{
public static function sendEmailToUser($email, $title, $messageBody)
{
try {
Mail::to($email)->send(new SendToAllUsers($title, $messageBody));
return true; // Email sent successfully
} catch (\Exception $e) {
return false; // Email sending failed
}
}
}