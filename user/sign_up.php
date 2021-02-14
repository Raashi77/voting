<?php
    
    
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $email=$_POST['email'];
        $name=$_POST['name'];
        $mobile=$_POST['mobile'];
        $password=md5($_POST['password']);
        if(isset($_POST['sign_up']))
        {
            $sql = "insert into users(name, email,password, mobile, status) values('$name', '$email', '$password', '$mobile', 1)";
            if($conn->query($sql))
            {
                $resMember=true;   
            }
            else
            {
                $errorMember=$conn->error;
            }
        }  
    }
 
?>

<style>
    .box-body{
	overflow: auto!important;
}
</style>

<form method="post">
    <h1>Sign Up</h1>
    <label>Name</label>
    <input type="text"name="name" class="form-control" required>
    <label>Email</label>
    <input type="email" name="email" class="form-control" required>
    <label>Password</label>
    <input type="text"name="password" class="form-control" required>
    <button type="submit" name="sign_up">Sign Up</button>
    <p>Already have an account?<a href="login">login</a></p>
</form>

  

<?php
    require_once 'js-links.php';
?>



