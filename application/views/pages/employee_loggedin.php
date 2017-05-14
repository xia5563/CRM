<!DOCTYPE html>
<html lang="en">
<head>
    <title>Overview</title>
    <?php $this->load->view("templates/meta")?>
    <?php $this->load->view("templates/basic_css")?>
    <?php $this->load->view("templates/basic_js", array("jquery_ui"=>"no", "cx_jQuery"=>"yes"))?>
</head>
<body class="cx_body">
<?php $this->load->view("templates/header")?>
<?php $this->load->view("templates/nav")?>
<?php $this->load->view("templates/overview_boxes")?>
<?php $this->load->view("templates/function_boxes")?>

</body>
</html>