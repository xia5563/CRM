<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add user</title>
    <?php $this->load->view("templates/meta") ?>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Favicons (created with http://realfavicongenerator.net/)-->
    <link rel="manifest" href="img/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#00a8ff">
    <meta name="msapplication-config" content="img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <!-- Normalize -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . CSS . 'normalize.css'; ?>">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . CSS . 'bootstrap.css'; ?>">
    <!-- Owl -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . CSS . 'owl.css'; ?>">
    <!-- Animate.css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . CSS . 'animate.css'; ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url() . VIEWSFOLDER . 'font-awesome-4.1.0/css/font-awesome.min.css'; ?>">
    <!-- Elegant Icons -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . VIEWSFOLDER . 'eleganticons/et-icons.css'; ?>">
    <!-- Main style -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . CSS . 'cardio.css'; ?>">
</head>


<body>
<div class="preloader">  </div>
<nav class="navbar">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <h3><font color="#aaaaa5"> BS Education Melbourne</h3> </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right main-nav">

                <li><a href="newlogin.html" class="btn btn-blue ">Sign Out</a></li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<header id="intro"> </header>
<section>
    <!--  <div class="cut cut-top"></div> -->
    <div class="container">
        <div class="row intro-tables">
            <div class="col-md-3">
                <div class="intro-table intro-table-first">
                    <h5 class="white heading">Customer Database</h5>
                    <div class="owl-carousel owl-schedule bottom">

                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="intro-table intro-table-hover">
                    <h5 class="white heading">Finances</h5>
                    <div class="bottom"> </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="intro-table intro-table-third">
                    <h5 class="white heading">Employee Database</h5>
                    <div class="owl-testimonials bottom"> </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="intro-table intro-table-fourth">
                    <h5 class="white heading">Product Details</h5>

                </div>
            </div>
        </div>
    </div>

</section><!--
    <section id="services" class="section section-padded">
        <div class="container">
            <div class="row text-center title"> </div>
            <div class="cut cut-bottom"></div>
    </section>-->
<section id="pricing" class="section">
    <div class="container">

        <div class="row no-margin">
            <!--  <div class="col-md-7 no-padding col-md-offset-5 pricings text-center"> -->
            <div class="pricing">
                <div class="box-main active">
                    <!-- add user -->
                    <div class="modal-content modal-popup">
                        <h3 class="white">Add New User</h3>
                        <form action="<?php echo site_url() . '/User_Controller/add_user'?>" method="post" class="popup-form">
                            <input name="username" type="text" class="form-control form-white" placeholder="Username">
                            <input name="email" type="text" class="form-control form-white" placeholder="Email Address">
                            <input name="password" type="text" class="form-control form-white" placeholder="Password">
                            <button type="submit" class="btn btn-submit"><b>ADD</b></button>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>
<footer>
    <div class="container">

        <div class="row bottom-footer text-center-mobile">
            <div class="col-sm-12">
                <p>&copy; 2017 BS Education. All Rights Reserved.</p>
            </div>

        </div>
    </div>
</footer>
<!-- Holder for mobile navigation -->

<!-- Scripts -->
<script src="<?php echo base_url() . JS . 'jquery-1.11.1.min.js';?>"></script>
<script src="<?php echo base_url() . JS . 'owl.carousel.min.js';?> "></script>
<script src="<?php echo base_url() . JS . 'bootstrap.min.js';?> "></script>
<script src="<?php echo base_url() . JS . 'wow.min.js';?> "></script>
<script src="<?php echo base_url() . JS . 'typewriter.js';?> "></script>
<script src="<?php echo base_url() . JS . 'jquery.onepagenav.js';?> "></script>
<script src="<?php echo base_url() . JS . 'main.js';?>"> </script>
</body>

</html>