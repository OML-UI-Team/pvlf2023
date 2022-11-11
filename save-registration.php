<?php header('location:nomination.php') ?>

<?php include('includes/header.php'); ?>

<?php if($_POST) {
   ini_set('display_startup_errors', 1);
   ini_set('display_errors', 1);
   error_reporting(-1);


  $admin_email = "media@frontlist.in";
  //$admin_email = "pankaj.kumar@omlogic.com";
  $admin_subject = "PVLF 2023 New Nomination received - ".$_POST['name'];
  //$admin_bcc = array('navita@omlogic.com', 'sumit@omlogic.com');

  $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
  // User Email
  $user_name = $_POST['name'];
  $user_email = $_POST['email'];
  $user_phone = $_POST['phone'];

  //$temp = explode(".", $_FILES["receipt"]["name"]);
  //$receipt = round(microtime(true)) . '.' . end($temp);
  //$receipt = "receipts/" . $receipt;
  //move_uploaded_file($_FILES["receipt"]["tmp_name"], $receipt);
  // End user email


  // Admin Mail
  $message = "<p>Hello Admin,</p> <h3>We have received new registration:</h3>";
  foreach ($_POST as $key => $value) {
        if(is_array($value)) {
            $message .= "<p>".str_replace('_', ' ', ucfirst($key)).': '.implode(', ', $value)."</p>";
        } else {
            $message .= "<p>".str_replace('_', ' ', ucfirst($key)).': '.$value."</p>";
        }
  }

  //$message .= "<p>Receipt: <a href='".$actual_link.'/'.$receipt."'>Click here to download</a></p>";

  $message .= "<br><p>Thank You</p>";

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
  //$adminMail->addAttachment($receipt, 'Receipt');
  if(!$adminMail->send()) {
      echo "Mailer Error: " . $adminMail->ErrorInfo;
  }
  
  //   User mail
    $user_subject = "PVLF Author Excellence Awards 2023 Nomination Details";
    $message ="
    <p>Dear $user_name</p>
    
    <p>Thank you for sending your nominations for PVLF Author Excellence Awards 2023.</p>
    
    <p>While we are verifying your payment details, please fill in this form and provide us more details about yourself and the your nomination.</p>
    
    <p><a href='https://docs.google.com/forms/d/e/1FAIpQLSc10hKbU8fVikATRPJ2FSZ7Zos_yj_zKk3y5o8SQQPQs3dYSw/viewform?vc=0&c=0&w=1&flr=0'>Click here to fill in the form.</a></p>
    
    <p>During the whole process, if you face any difficulty or need any clarifications, do not hesitate to call or mail to the contact details mentioned below.</p>
    
    <p>&nbsp;</p>
    
    <p>For Queries  send a mail to media@frontlist.in or call  +91-9811251772</p>
    
    <p>&nbsp;</p>
    
    <p>Regards,</p>
    
    <p>Team Frontlist</p>
    ";

      $userMail = new PHPMailer;
      $userMail->isSMTP();                                                    // Set mailer to use SMTP
      $userMail->Host = 'smtp.gmail.com';                                     // Specify main and backup SMTP servers
      $userMail->SMTPAuth = true;                                             // Enable SMTP authentication
      $userMail->Username = 'mail@omlogic.com';                       // SMTP username
      $userMail->Password = 'Manjeet@123';                                     // SMTP password
      $userMail->SMTPSecure = 'tls';                                          // Enable TLS encryption, `ssl` also accepted
      $userMail->Port = 587;                                                  // TCP port to connect to
      $userMail->addAddress($user_email);      // Add a recipient
      $userMail->AddReplyTo($user_email, $user_name);
      $userMail->setfrom($admin_email, 'Frontlist');
      $userMail->WordWrap = 50;                                               // Set word wrap to 50 characters
      $userMail->isHTML(true);                                                // Set email format to HTML
      $userMail->Subject = $user_subject;
      $userMail->Body    = $message;
      if(!$userMail->send()) {
          echo "Mailer Error: " . $userMail->ErrorInfo;
      }
// End user Mail

    //header("location: ./thank-you.php");
    echo "<script>location.href='thank-nominate.php';</script>";
    exit;
  // End Admin Email

} else {
    //header("location: ./nomination.php");
    echo "<script>location.href='nomination.php';</script>";
    exit;
} ?>