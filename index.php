<?php 
include("includes/connection.php");

if($_POST['stage']){
    $email = $connect->real_escape_string($_POST['email']);
    $password = $connect->real_escape_string($_POST['password']);//base64_encode();
    $sql = db_query("SELECT * FROM user_details WHERE email='$email' && password='$password'");
    $res = mysqli_fetch_object($sql);		
        
    if (mysqli_num_rows($sql)) {
        $_SESSION['user_id'] = $res->id;
        $_SESSION['name'] = $res->name;
        $_SESSION['role'] = $res->role;
        header("Location: dashboard.php");
    }
    else{
        $msg = "Invalid Email/Password";
        setcookie("msg", $msg, time() + 3);
        header("Location: index.php");
    }
}
?>
<!DOCTYPE html>  
<html lang="en" >  
<head>  
  <meta charset="UTF-8">  
  <title> Bootstrap 4 Login Form Example  
 </title>  
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">  
</head>  
<?php include("includes/style.php"); ?>
<body>  
<div class="pt-5">  
  <div class="global-container">  
    <div class="card login-form">  
    <div class="card-body">  
        <h3 class="card-title text-center"> Login Form </h3>  
        <div class="card-text">  
            <?php if (isset($_COOKIE['msg'])) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php print str_replace("+", " ", $_COOKIE['msg']); ?>
                </div>
            <?php } ?>
            <form method="post" action="">  
                <input type="hidden" class="form-control" id="stage" name="stage" value="2">
                <div class="form-group">  
                    <label for="exampleInputEmail1"> Enter Email address </label>  
                    <input type="email" class="form-control" name="email" required>  
                </div>  
                <div class="form-group">  
                    <label for="exampleInputPassword1">Enter Password </label>  
                    <input type="password" class="form-control" name="password" required>  
                </div>  
                <button type="submit" class="btn btn-primary btn-block"> Sign in </button>  
                <div class="sign-up">  
                    Don't have an account? <a href="user_signup.php"> Create One </a>  
                </div>  
            </form>  
        </div>  
    </div>  
</div>  
</div>  
</body>  
</html> 