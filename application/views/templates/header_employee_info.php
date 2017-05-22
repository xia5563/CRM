<div class="col-md-1">
    <span class="glyphicon glyphicon-user cx_header_glyphicon"></span>
</div>
<div class="col-md-3">
    <div class="cx_header_employee_info">

        <div><?php echo isset($_SESSION['username']) ? $_SESSION['username'] : "empty"; ?></div>
        <div><?php echo isset($_SESSION['email']) ? $_SESSION['email'] : "empty"; ?></div>
        <div><a href="<?php echo site_url('Employee/employee_logout')?>" class="cx_btn_link">Log out</a></div>
    </div>
</div>