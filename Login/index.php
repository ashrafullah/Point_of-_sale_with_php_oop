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
                Login with POS</span></h6>
                <p>
                    <ul>
                        <li><strong>Email:</strong> admin@gmail.com</li>
                        <li><strong>Pass:</strong>  123456</li>
                    </ul>
                </p>
            </div>
<?php 
if ($_SERVER['REQUEST_METHOD']== 'POST') {
$id=$_POST['id'];
$name=$_POST['name'];
$email=$dfm->validation($_POST['email']);
$password=$dfm->validation(md5($_POST['password']));
$name=mysqli_real_escape_string($dbcon->link,$name);
$id=mysqli_real_escape_string($dbcon->link,$id);
$user_type=$_POST['user_type'];
$user_type=mysqli_real_escape_string($dbcon->link,$user_type);
$password=mysqli_real_escape_string($dbcon->link,$password);
    $query="SELECT *  FROM users WHERE email='$email' AND password='$password' AND user_type='$user_type'";
    $result=$dbcon->select($query);
    // $count=mysqli_num_rows($result);

    if ($result!= false ) {
        // $value=mysqli_fetch_array($result);
            $value=$result->fetch_assoc();
            Session::set("login",true);
            // Session::set("user_type",$value['user_type']);
            Session::set("name",$value['name']);
            Session::set("id",$value['id']);

            if($value['user_type'] == "admin") {
        header("Location:../Admin/admin_home.php");
            }
            else if ($value['user_type'] == '') {
            echo "User Type Not Must be Empty";
        }
            else if($value['user_type'] == "cashier"){
        header("Location:../Admin/index_sales.php");
            }
            else if($value['user_type'] == "customer"){
        header("Location:../Admin/index_customer.php");
            }
        else if($value['user_type'] == "super_admin"){
        header("Location:../Admin/admin_home.php");
            }
        else if($value['user_type'] == "manager"){
        header("Location:../Admin/admin_home.php");
            }
           
    }
    else{
        
echo "<span style='color:red;font-size:16px'>
        Username and password and User Type Not Match</span>";

    }
            
}
?>
            <div class="card-body collapse in">
                <div class="card-block">
                    <form class="form-horizontal form-simple" action="" method="post">

                        <fieldset class="form-group position-relative has-icon-left mb-0">
                            <input type="text" class="form-control form-control-lg input-lg" id="user-name" placeholder="Your Email" name="email" id="email">
                            <div class="form-control-position">
                                <i class="icon-head"></i>
                            </div>
                        </fieldset>
                        <fieldset class="form-group position-relative has-icon-left">
                            <input type="password" class="form-control form-control-lg input-lg" id="password" placeholder="Enter Password" name="password" id="password">
                            <div class="form-control-position">
                                <i class="icon-key3"></i>
                            </div>
                        </fieldset>
                       <fieldset>
<select required name="user_type" class="form-control">

    <option value="admin" selected="selected">Admin</option>
    <option value="super_admin">Super Admin</option>
    <option value="cashier">Cashier</option>
    <option value="manager">Manager</option>
    <option value="customer">Customer</option>
</select>
                       </fieldset>
                       <br>
                        <fieldset class="form-group row">
                            
                            <div class="col-md-6 col-xs-12 text-xs-center text-md-right">
                    <a href="forget_pass.php" class="card-link">
                        <i class="icon-key3"></i>&nbsp;Forgot Password?</a></div>
                        </fieldset>
                        <button name="login" id="login" type="submit" class="btn btn-primary btn-lg btn-block">
                    <i class="icon-unlock2"></i> 
                        Login</button>
                    </form>
                </div>
            </div>
            <div class="card-footer">
                <div class="">
               
                    <p class="float-sm-right text-xs-center m-0">
                    New to POS? 
                    <a href="register.php" class="card-link">
                    Sign Up</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
      </div>
    </div>
<?php include'footer.php'; ?>