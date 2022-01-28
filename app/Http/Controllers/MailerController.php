<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailerController extends Controller
{
   public function email()
   {
      return view("email");
   }

   public function composeEmail(Request $request)
   {
      // dd($request->toArray());
      require base_path("vendor/autoload.php");
      $mail = new PHPMailer(true);     // Passing `true` enables exceptions

      try {

         // Email server settings
         $mail->SMTPDebug = 0;
         $mail->isSMTP();
         $mail->Host = 'mail.frothapps.com.au';             //  smtp host
         $mail->SMTPAuth = true;
         $mail->Username = 'smtptest@frothapps.com.au';   //  sender username
         $mail->Password = 'FrothApps7755.';       // sender password
         $mail->SMTPSecure = 'tls';                  // encryption - ssl/tls
         $mail->Port = 146;                          // port - 587/465

         $mail->setFrom('smtptest@frothapps.com.au', 'Ishani');
         $mail->addAddress($request->emailRecipient);
         // $mail->addCC($request->emailCc);
         // $mail->addBCC($request->emailBcc);

         $mail->addReplyTo('smtptest@frothapps.com.au', 'Ishani Reply');

         if (isset($_FILES['emailAttachments'])) {
            for ($i = 0; $i < count($_FILES['emailAttachments']['tmp_name']); $i++) {
               $mail->addAttachment($_FILES['emailAttachments']['tmp_name'][$i], $_FILES['emailAttachments']['name'][$i]);
            }
         }


         $mail->isHTML(true);                // Set email content format to HTML

         $mail->Subject = $request->emailSubject;
         $mail->Body    = $request->emailBody;

         // $mail->AltBody = plain text version of email body;

         if (!$mail->send()) {
            return back()->with("failed", "Email not sent.")->withErrors($mail->ErrorInfo);
         } else {
            dd(1);
            return back()->with("success", "Email has been sent.");
         }
      } catch (Exception $e) {
         dd($e);
         return back()->with('error', 'Message could not be sent.');
      }
   }
}
