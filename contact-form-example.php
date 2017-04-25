<!-- Dependencies -->
<!--
  Boostrap,
  PhpMailer
-->
<!-- Dependencies -->
<div class="container">
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <p>
        <?php
          $db = new dbConnect;//your db connextion obj
          if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $name = ($_POST['name']);
            $email = ($_POST['email']);
            $subject = ($_POST['subject']);
            $message = ($_POST['message']);
            //validations
            //Put the validations here

            //email
            require_once("/directory/PHPMailerAutoload.php");//need to load the
            $mail = new PHPMailer();//PhpMailer Obj
            // $mail->SMTPDebug = 3;
            $mail->IsSMTP();
            $mail->Host = '****.lic-network.com';
            $email->Port = ***;
            $mail->SMTPAuth = true;     // turn on SMTP authentication
            $mail->Username = "***@lic-network.com";  // SMTP username
            $mail->Password = "******";
            $mail->SMTPSecure = "tls";

            $mail->SetFrom('*****@lic-network.com', 'LIC Network');
            $mail->AddAddress($userName);
            $mail->IsHTML(true);

            $mail->Subject = $subject;
            $body = utf8_encode('<h4>Blah blah blah</h4>');
            $mail->Body = $body;
            $mail->AltBody = $body;
            if(!$mail->Send())
            {
                echo "Message could not be sent. <br />";
                echo "Mailer Error: " . $mail->ErrorInfo;
                exit;
            } else {
              echo "<h4>Success!</h4>";
            }
          }
        ?>
        <form action="contact.php" method="post" enctype="multipart/form-data">
          <div class="forn-group div-center">
            <input name="name" type="text" class="form-control" placeholder="Name" required/>
          </div>
          <div class="forn-group div-center">
            <input name="email" type="email" class="form-control" placeholder="Email" required/>
          </div>
          <div class="forn-group div-center">
            <label>Subject</label>
            <select name="subject" class="form-control" required="true">
              <option value="x">x</option>
              <option value="y">y</option>
              <option value="z">z</option>
            </select>
          </div>
          <div class="forn-group">
            <textarea name="message" type="text" class="form-control" placeholder="Message" rows="5" required="true"></textarea>
          </div>
          <input class="btn btn-primary btn-lg div-center" type="submit" value="Send">
        </form>
      </p>
    </div>
    <div class="col-md-3"></div>
  </div>
</div>
