<!DOCTYPE html>
<html lang="en">
<head>
    <title>LOGIN</title>
    <?php $this->load->view("templates/meta")?>

    <link rel="stylesheet" href="<?php echo base_url() . CSS . 'bootstrap.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url() . CSS . 'style.css';?>">

</head>

<body>
<div class="container-fluid">


    <div class="row">  <div class="col-xs-12"><div class="wrapper">
                <form class="form-signin" action="<?php echo site_url().'/User_Controller/check_user'?>" method="post">


                    <h2 class="form-signin-heading"><font color="white">Please Login</font></h2>
                    <h3 class="form-signin-bse"> BS EDUCATION MELBOURNE</h3>

                    <div class="row">  <div class="col-xs-8">
                            <input type="text" class="form-control" name="username" placeholder="username" required="" autofocus="" /> <br>




                            <input type="password" class="form-control" name="password" placeholder="password" required=""/>
                            <label class="checkbox">
                                <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
                            </label>
                        </div></div>

                    <div class="row">  <div class="col-md-10">
                            <button class="btn btn-lg btn-primary btn-block" > Log In </button>   <br>

                        </div></div>
                    <div class="row">  <div class="col-xs-8">

                            <a class="login-link" href="#">Forgot password</a>
                        </div></div>
                </form>
            </div></div>


    </div>



</body>
</html>
