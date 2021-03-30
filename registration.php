<?php
  require_once "header.php";
  require_once "navbar.php";
    
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(isset($_POST['sign_up']))
        {
            $email=$_POST['email'];
            $name=$_POST['name'];
            $ip_address=get_client_ip();
            $password=md5($_POST['password']);
            $sql="select * from users where email='$email'";
            if($result =  $conn->query($sql))
            {
                if($result->num_rows>0)
                {
                    $errorMember="User with this email id already exist. Try another.";
                }
                else
                {
                    $sql = "insert into users(name, email,password,  ip_address, status) values('$name', '$email', '$password', '$ip_address', 1)";
                    if($conn->query($sql))
                    { 
                        $email=$conn->real_escape_string(strtolower(trim($_POST['email'])));
                        $password=md5($_POST['password']);
                        user_login($email,$password,$conn,"index"); 
                            ?>
                                <script type="text/javascript">
                                    window.location.href = 'index';
                                </script>
                            <?php
                    }
                    else
                    {
                        $errorMember=$conn->error;
                    }
                }
            }   
        } 
        if(isset($_POST['login']))
        {
            $email=$conn->real_escape_string(strtolower(trim($_POST['eemail'])));
            $password=md5($_POST['epassword']);
            if(!user_login($email,$password,$conn,"index"))
            {
              $errorMember2= "invalid user & Password";
            }
            else
            {  
                ?>
                    <script type="text/javascript">
                        window.location.href = 'index';
                    </script>
                <?php
            }
        } 
    }
?> 
  
    <!-- Inner Page Header serction start here -->
    <div class="inner-page-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="header-page-title">
                        <h2>Login and Registration</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="header-page-locator">
                        <ul>
                            <li><a href="index.html">Home /</a> Login and Registration</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Inner Page Header serction end here -->
    <br>


    <!-- Login and Registration start Here -->
    <div class="loginregistration-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 mb-sm-30">
                    <div class="login-area">
                    
                        <h2>Login</h2>
                        <?php
                            if(isset($resMember))
                            {
                                ?>
                        <div class="alert alert-success"><strong>Success! </strong><?=$resMember?></div>
                        <?php
                            }
                            else if(isset($errorMember2))
                            {
                                ?>
                        <div class="alert alert-danger"><strong>Error! </strong><?=$errorMember?></div>
                        <?php
                            }
                            ?>
                        <form method="post">
                            <fieldset>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" id="eemail" name="eemail" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" id="epassword" name="epassword" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="connected-area">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Remember me
                                                </label>
                                                <p><a href="#">Lost your password?</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <button class="btn-send" type="submit" name="login">Login</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="registration-area">
                        <h2>Registration</h2>
                        <div class="alert alert-danger" id="pchange" style="display: none;"><strong>Error!
                            </strong>Password Mismatched</div>
                        <?php
                            if(isset($resMember))
                            {
                                ?>
                        <div class="alert alert-success"><strong>Success! </strong><?=$resMember?></div>
                        <?php
                            }
                            else if(isset($errorMember))
                            {
                                ?>
                        <div class="alert alert-danger"><strong>Error! </strong><?=$errorMember?></div>
                        <?php
                            }
                            ?>


                        <form method="post">
                            <fieldset>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input name="name" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" id="password" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label> Confirm Password</label>
                                        <input type="password" name="c_password" id="c_password" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label> E-mail</label>
                                        <input type="email" name="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <button class="btn-send" name="sign_up" id="sign_up" onclick="passcheck()"
                                            type="button">Sign Up!</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login and Registration End Here -->

  <?php
    require_once 'footer.php';
    require_once 'js-links.php';
  
  ?>
</html>

<script>
function passcheck() {
    var p1 = $("#password").val();
    var p2 = $("#c_password").val();
    if (p1 != p2) {
        $("#pchange").show();

    } else {
        $("button[name='sign_up']").prop("type", "submit");
    }
}
</script>
