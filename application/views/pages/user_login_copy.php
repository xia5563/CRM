<!DOCTYPE html>
<html>
<head>
    <title>Please login.</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Chao Xia">

    <meta name="keywords" content="user login">
    <meta name="description" content="">
    <meta name="pageIndex" content="user_login">



</head>
<body>
<?php
if(isset($err_msg)) echo $err_msg ;
?>
<?php echo form_open('User_Controller/check_user'); ?>

<label for="username">User name: </label>
<input type="input" name="username" /><br />

<label for="password">Password: </label>
<input type="password" name="password" /><br />

<input type="submit" name="submit" value="Login" />

</form>

</body>