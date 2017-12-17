<?php include'header-login.php'; ?>
  <body data-open="click" data-menu="vertical-menu" data-col="1-column" class="vertical-layout vertical-menu 1-column  blank-page blank-page">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
       <div class="content-body"><section class="flexbox-container">
    <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1  box-shadow-2 p-1">
        <div id="register" class="card border-grey border-lighten-3 m-0">
            <div class="card-header no-border">
              <br>
              <hr>
                <div class="card-title text-xs-center">
                    <div class="img-fluid">
                    <a href="register.php"><img src="../Admin/public/app-assets/images/logo/logo-login.png" width="120" height="100" alt="branding logo"></a>
                </div>
                </div>
            
            </div>
            <p style="color: white" id="message"></p>
            <div class="card-body collapse in">
                <div class="card-block">
               <form class="form-horizontal form-simple">
                        <label class="label">Name</label>
                        <fieldset class="form-group position-relative has-icon-left mb-0">
                        <input type="text" class="form-control form-control-lg input-lg"  placeholder="Enter Your Name" name="name" id="name" required="">
                            <div class="form-control-position">
                                <i class="icon-head"></i>
                            </div>
                        </fieldset>
                        <span id="result"></span>
                        <br>
                        <label class="label">Email</label>
                        <fieldset class="form-group position-relative has-icon-left">
                            <input type="email" class="form-control form-control-lg input-lg" placeholder="Enter Email" name="email" id="email" required="">
                            <div class="form-control-position">
                                <i class="icon-email"></i>
                            </div>
                            <span id="emailcheck"></span>
                        </fieldset>
                        <label class="label">Password</label>
                        <fieldset class="form-group position-relative has-icon-left">
                           <input type="password" class="form-control form-control-lg input-lg"  placeholder="Enter Password" name="password" id="password" required="">
                            <div class="form-control-position">
                                <i class="icon-key3"></i>
                            </div>
                        </fieldset>
                        <label class="label">Address</label>
                        <fieldset class="form-group position-relative has-icon-left">
                            <input type="text" class="form-control form-control-lg input-lg" placeholder="Enter Address" name="address" id="address">
                            <div class="form-control-position">
                                <i class="icon-unlock2"></i>
                            </div>
                        </fieldset>
                       <fieldset>
<select name="user_type" class="form-control" id="user_type">
 
    <option value="admin">Admin</option>
    <option value="super_admin">Super Admin</option>
    <option value="cashier">Cashier</option>
    <option value="manager">Manager</option>
    <option value="customer">Customer</option>
</select>
                       </fieldset>
                       <br>
                        <button type="button" class="btn btn-success btn-block" name="register" id="submit" onclick="insertData()">Register</button>
                        <!-- <input type="submit" name="" onclick="insertData()"> -->
                    </form>
                </div>
                <a class="pull-right btn-sm btn-warning" href="index.php" class="card-link">
                  <i class="icon-arrow-left"></i>
                    Back Login</a>
                    <hr>
            </div>
          
                    

        </div>
    </div>
</section>
</div>
      </div>
<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

<script type="text/javascript">
 function insertData() {
    var name=$("#name").val();
    var email=$("#email").val();
    var password=$("#password").val();
    var address=$("#address").val();
    var user_type=$("#user_type").val();
 
 
// AJAX code to send data to php file.
        $.ajax({
            type : "POST",
           url : "ajax/registration_ajax_check.php",
            data: {name:name,email:email,password:password,address:address,user_type:user_type},
            dataType: "JSON",
            beforeSend: function() {
              $("#submit").html("Send..");
              $("#submit").addClass("alert alert-success");
           },
            success: function(data) {
             $("#message").html(data);
            $("p").addClass("alert alert-info");
            
            console.log(data);
            },

            error: function(data) {
            $("#message").html("field Not Must be empty");
            $("p").addClass("alert alert-warning");
            alert(err);
            console.log(data);
            }
        });
 
}
</script>
<script type="text/javascript">
  
$(document).ready(function()
{    
  $("#name").keyup(function()
  {   
    var name = $(this).val(); 
    
    if(name.length > 3)
    {   
      $("#result").html('checking...');
      
      
      $.ajax({
        
        type : 'POST',
        url  : 'ajax/check.php',
        data : $(this).serialize(), //The serialize() method creates a URL encoded text string by serializing form values. The serialized values can be used in the URL query string when making an AJAX request.
        success : function(data)
              {
                   $("#result").html(data);
                }
        });
        return false;
      
    }
    else
    {
      $("#result").html('');
    }
  });
  
  
});
</script>
<script type="text/javascript">
  $(document).ready(function(){
    // email check
  $("#email").keyup(function()
  {   
    var email = $(this).val(); 
    
    if(email.length > 3)
    {   
      $("#emailcheck").html('checking...');
    
      
      $.ajax({
        
        type : 'POST',
        url  : 'ajax/check.php',
        data : $(this).serialize(), //The serialize() 
        success : function(data)
              {
                   $("#emailcheck").html(data);
                }
        });
        return false;
      
    }
    else
    {
      $("#emailcheck").html('');
    }
  });
});
</script>
  
    </div>
<?php include'footer.php'; ?>