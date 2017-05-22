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
<div class="container cx_layout_margin_center cx_show_multiple">
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
                <?php echo $employee['username']; ?>
            </div>
            <div class="col-md-3">
                <?php echo $employee['email']; ?>
            </div>
            <div class="col-md-3">
                <?php echo $employee['employee_privilege']; ?>
            </div>

            <div class="col-md-3">
                <a href="<?php echo site_url('Employee/update_employee/' . $employee['username'])?>" class="cx_btn_link_update_sm">update</a>
                <a href="<?php echo site_url('Employee/delete_employee/' . $employee['username']) ?>" class="cx_btn_link_delete_sm">delete</a>
            </div>
        </div>
    <?php endforeach; ?>

</div>

</body>
</html>
