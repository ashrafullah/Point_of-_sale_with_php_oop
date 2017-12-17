<?php include'header-login.php'; ?>
  <body data-open="click" data-menu="vertical-menu" data-col="1-column" class="vertical-layout vertical-menu 1-column  blank-page blank-page">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
       <div class="content-body"><section class="flexbox-container">
    <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1  box-shadow-2 p-0">
        <div class="card border-grey border-lighten-3 m-0">
            <div class="card-header no-border">
                <div class="card-title text-xs-center">
                    <div class="p-1 img-fluid">
                    <a href="index.php"><img src="../Admin/public/app-assets/images/logo/logo-login.png"  alt="branding logo"></a>
                </div>
                </div>
                <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span>
                Password Reset</span></h6>
            </div>
<?php 
    if ($_SERVER['REQUEST_METHOD']== 'POST') {
        $email = $dfm->validation($_POST['email']);
        $email = mysqli_real_escape_string($dbcon->link,$email);
        if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email address";
        }
        else{
        $mailquery ="SELECT * FROM users 
          WHERE email='$email' limit 1";
        $mailcheck=$dbcon->select($mailquery);
        if ($mailcheck !=false) {
            while ($value=$mailcheck->fetch_assoc()) {
                $userid=$value['id'];
                $name=$value['name'];
            }
            $text=substr($email, 0,3);
            $rand=rand(10000,99999);
            $newpass="$text$rand";
            $password=md5($newpass);
            $update="UPDATE users
                    SET 
                    password='$password'
                    WHERE id='$userid'";
            $update_row=$dbcon->update($update);
            $to="$email";
            $from      ="imran@gmail.com";
            $headers   ="from :$from\n";
            $headers  .= 'MIME-Version: 1.0' . "\r\n";
            $headers  .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $subject="Your lost password";
            $message="Your username is ".$name." and
            password is ".$newpass." Please visit website  <a href='http://imran.phpbd4.com/pos/Login/index.php'>to login</a> ";
    $sendemail=mail($to, $subject, $message,$headers);
    if ($sendemail) {
echo "<span style='color:green;'>Please Check your email for new password.</span>";
    }
    else
    {
echo "<span style='color:red;'>Email Not send</span>";
    }

            }
                else{
    echo "<span style='color:red;'>
            Email Not exists.
        </span>";

    }
            
        }
}
 ?>
            <div class="card-body collapse in">
                <div class="card-block">
                    <form class="form-horizontal form-simple" action="" method="post">

                        <fieldset class="form-group position-relative has-icon-left mb-0">
            <input type="email" class="form-control form-control-lg input-lg" id="user-email" placeholder="Enter Your Verified Email" name="email" id="email">
            <div class="form-control-position">
                <i class="icon-head"></i>
            </div>
                        </fieldset>
        
            
                        <button name="login" id="login" type="submit" class="btn btn-primary btn-lg btn-block"><i class="icon-unlock2"></i> Send</button>
                    </form>
                </div>
            </div>
            <div class="card-footer">
                <div class="">
               
                    <p class="float-sm-right text-xs-center m-0">
                    <a href="index.php" class="card-link">Back To Login Page</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
      </div>
    </div>
<?php include'footer.php'; ?>