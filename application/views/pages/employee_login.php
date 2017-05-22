<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <?php $this->load->view("templates/meta")?>
    <?php $this->load->view("templates/basic_css")?>
    <?php $this->load->view("templates/basic_js", array("jquery_ui"=>"no", "cx_jQuery"=>"yes"))?>
</head>

<body class="cx_body">
<div class="container-fluid cx_loggin_container">
    <div class="row">
        <div class="col-md-12 cx_loggin">
            <h1>
                <span class="cx_span_animateA">C</span>
                <span class="cx_span_animateA">R</span>
                <span class="cx_span_animateA">M</span>
            </h1>
            <h3>
                <span class="cx_span_animateA">B</span>
                <span class="cx_span_animateA">S</span>&nbsp;
                <span class="cx_span_animateA">E</span>
                <span class="cx_span_animateA">d</span>
                <span class="cx_span_animateA">u</span>
                <span class="cx_span_animateA">c</span>
                <span class="cx_span_animateA">a</span>
                <span class="cx_span_animateA">t</span>
                <span class="cx_span_animateA">i</span>
                <span class="cx_span_animateA">o</span>
                <span class="cx_span_animateA">n</span>&nbsp;
                <span class="cx_span_animateA">M</span>
                <span class="cx_span_animateA">e</span>
                <span class="cx_span_animateA">l</span>
                <span class="cx_span_animateA">b</span>
                <span class="cx_span_animateA">o</span>
                <span class="cx_span_animateA">u</span>
                <span class="cx_span_animateA">r</span>
                <span class="cx_span_animateA">n</span>
                <span class="cx_span_animateA">e</span>
            </h3>
            <form class="cx_formA "  action="<?php echo site_url('Employee/employee_login')?>" method="post">
                <div class="row cx_layout_margin">
                    <div class="col-md-5">
                        <span  >User name:</span>
                    </div>
                    <div class="col-md-7">
                        <input type="text" name="username" class="cx_validate_normal">
                    </div>
                </div>
               <div class="row cx_layout_margin">
                   <div class="col-md-5">
                       <span  >Password:</span>
                   </div>
                   <div class="col-md-7">
                       <input type="password" name="password">
                   </div>
               </div>

                <div class="row cx_layout_margin">
                    <div class="col-md-12">
                        <button type="submit" class="cx_btn">Log in</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

</body>
</html>
