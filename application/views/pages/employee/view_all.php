<!DOCTYPE html>
<html lang="en">
<head>
    <title>View all employees</title>
    <?php $this->load->view("templates/meta") ?>
    <?php $this->load->view("templates/basic_css") ?>
    <?php $this->load->view("templates/basic_js", array("jquery_ui" => "no", "cx_jQuery" => "yes")) ?>
</head>
<body class="cx_body">
<?php $this->load->view("templates/header") ?>
<?php $this->load->view("templates/nav") ?>
<div class="container">
    <div class="row ">
        <div class="cx_solo_message">
            <span><?php echo isset($title_message)? $title_message: ""; ?></span>
        </div>
    </div>
</div>
<div class="cx_layout_margin_center cx_show_multiple">
    <?php if(isset($num_rows) && $num_rows>0): ?>
    <div class="row cx_show_title">
        <div class="col-md-3">
             Employee name
        </div>
        <div class="col-md-3">
             Email
        </div>
        <div class="col-md-3">
             Employee privilege
        </div>
        <div class="col-md-3">

        </div>
    </div>

    <?php foreach($employees as $employee):  ?>
        <div class="row">
            <div class="col-md-3">
                <?php echo $employee['employee_name']; ?>
            </div>
            <div class="col-md-3">
                <?php echo $employee['email']; ?>
            </div>
            <div class="col-md-3">
                <?php echo $employee['privilege']; ?>
            </div>

            <div class="col-md-3">
                <a href="<?php echo site_url('Employee/view_employee/' . $employee['employee_name'])?>" class="cx_btn_link_view_sm">view</a>
                <a href="<?php echo site_url('Employee/update_employee/' . $employee['employee_name'])?>" class="cx_btn_link_update_sm">update</a>
                <a href="<?php echo site_url('Employee/delete_employee/' . $employee['employee_name']) ?>" class="cx_btn_link_delete_sm">delete</a>
            </div>
        </div>
    <?php endforeach; ?>

    <?php endif?>


</div>

</body>
</html>
