<?php include('includes/thanks-header.php'); ?>

<?php if($_POST) {
   ini_set('display_startup_errors', 1);
   ini_set('display_errors', 1);
   error_reporting(-1);
    
   $admin_email = "media@frontlist.in";
   $admin_subject = "New query from ".$_POST['email'];
   //$admin_bcc = array('navita@omlogic.com', 'sumit@omlogic.com');

   // User Email
   $user_name = $_POST['name'];
   $user_email = $_POST['email'];
   $user_phone = $_POST['phone'];
   $user_subject = $_POST['subject'];
   $user_message = $_POST['message'];

   /*
   $user_email_header = "From:".$admin_email." \r\n";
   $user_email_header .= "MIME-Version: 1.0\r\n";
   $user_email_header .= "Content-type: text/html\r\n";

   $user_email_message = "<p>Hello ".$user_name.",</p>
                        <p>Thank you for query.</p>
                        
                        <p>Thank you</p>
   ";

   mail ($user_email, $user_subject, $user_email_message, $user_email_header);
   */
   // End user email


   // Admin Mail
   $message = "<p>Hello Admin,</p> <h3>We have received new query:</h3>";
   foreach ($_POST as $key => $value) {
      $message .= "<p>".ucfirst($key).': '.$value."</p>";
   }

   $message .= "<br><p>Thank You</p>";

   //$admin_email_header  = "MIME-Version: 1.0\r\n";
   //$admin_email_header .= "Content-type: text/html; charset=utf-8\r\n";
   //$admin_email_header .= "From:".$user_email." \r\n";
   //$admin_email_header .= "BCC:".$admin_bcc." \r\n";

   //if(!mail ($admin_email, $admin_subject, $message, $admin_email_header)) {
   //    print_r(error_get_last());
   //}
   
   require '../PHPMailer/PHPMailerAutoload.php';

  $adminMail = new PHPMailer;
  $adminMail->isSMTP();                                                    // Set mailer to use SMTP
  $adminMail->Host = 'smtp.gmail.com';                                     // Specify main and backup SMTP servers
  $adminMail->SMTPAuth = true;                                             // Enable SMTP authentication
  $adminMail->Username = 'mail@omlogic.com';                       // SMTP username
  $adminMail->Password = 'Manjeet@123';                                     // SMTP password
  $adminMail->SMTPSecure = 'tls';                                          // Enable TLS encryption, `ssl` also accepted
  $adminMail->Port = 587;                                                  // TCP port to connect to
  $adminMail->addAddress($admin_email);      // Add a recipient
  $adminMail->addBCC('navita@omlogic.com');      // Add a recipient
  $adminMail->addBCC('sumit@omlogic.com');      // Add a recipient
  $adminMail->AddReplyTo($user_email, $user_name);
  $adminMail->setfrom($user_email, $user_name);
  $adminMail->WordWrap = 50;                                               // Set word wrap to 50 characters
  $adminMail->isHTML(true);                                                // Set email format to HTML
  $adminMail->Subject = $admin_subject;
  $adminMail->Body    = $message;
  if(!$adminMail->send()) {
      echo "Mailer Error: " . $mail->ErrorInfo;
  }
} ?>

   <div class="auto-hgh" style="background-image:url(images/hero_area/banner_bg.jpg)">
      <h2>Thank You</h2>
      <p>Thank you for sharing your query with us. Someone from our team will get back to you.</p>
      <a href="index.php" class="btn-white">Back to site</a>
   </div>
   


   
     
     <?php include('includes/thank-footer.php'); ?>