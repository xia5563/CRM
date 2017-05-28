<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update employee</title>
    <?php $this->load->view("templates/meta") ?>
    <?php $this->load->view("templates/basic_css") ?>
    <?php $this->load->view("templates/basic_js", array("jquery_ui" => "no", "cx_jQuery" => "yes")) ?>
</head>
<body class="cx_body">
<?php $this->load->view("templates/header") ?>
<?php $this->load->view("templates/nav") ?>
<div class="container">
    <div class="row ">
        <div class="cx_solo_message_center">
            <span><?php echo isset($title_message)? $title_message: ""; ?></span>
        </div>
    </div>
</div>
<div class="container cx_layout_margin_center ">
    <div class="row">
        <div class="col-md-12">
            <div class="cx_form_update">
                <div class="cx_form_title">Update employee</div>
                <form class="cx_form_content" action="<?php echo site_url('Employee/update_employee');?>" method="post">
                    <div class="row">
                        <div class="col-md-4">
                            <span class="cx_input_title">Employee name:</span>
                        </div>
                        <div class="col-md-8">
                            <input type="test" class="cx_input" name="employee_name"
                                   value="<?php echo $employee['employee_name'];?>">
                            <input type="hidden" name="old_employee_name"
                                   value="<?php echo $employee['employee_name']?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <span class="cx_input_title">Password:</span>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="cx_input" name="password"
                                    value="<?php echo $employee['password']?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <span class="cx_input_title">Confirm password:</span>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="cx_input" name="confirm_password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <span class="cx_input_title">Email:</span>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="cx_input" name="email"
                                   value="<?php echo $employee['email']?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <span class="cx_input_title">Employee privilege:</span>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="cx_input" name="privilege"
                                   value="<?php echo $employee['privilege']?>">
                        </div>
                    </div>

                    <div class="row cx_form_submit_footer">
                        <div class="col-sm-6">
                            <button class="cx_btn_link_add" type="submit">Update</button>
                        </div>
                        <div class="col-sm-6">
                            <a href="<?php echo site_url('Employee/employee_login')?>" class="cx_btn_link_inline">Cancel</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
