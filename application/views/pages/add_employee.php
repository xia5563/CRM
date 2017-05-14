<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add new employee</title>
    <?php $this->load->view("templates/meta") ?>
    <?php $this->load->view("templates/basic_css") ?>
    <?php $this->load->view("templates/basic_js", array("jquery_ui" => "no", "cx_jQuery" => "yes")) ?>
</head>
<body class="cx_body">
<?php $this->load->view("templates/header") ?>
<?php $this->load->view("templates/nav") ?>
<div class="container cx_layout_margin_center ">
    <div class="row">
        <div class="col-md-12">
            <div class="cx_form_add_employee">
                <div class="cx_form_title">Add new employee</div>
                <form class="cx_form_content" action="<?php echo site_url('Employee_Controller/add_employee') ;?>" method="post">
                    <div class="row">
                        <div class="col-md-4">
                            <span class="cx_input_title">Employee name:</span>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="cx_input" name="username">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <span class="cx_input_title">Password:</span>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="cx_input" name="password">
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
                            <input class="cx_input" name="email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <span class="cx_input_title">Employee privilege</span>
                        </div>
                        <div class="col-md-8">
                            <input class="cx_input" name="privilege">
                        </div>
                    </div>
                    <div class="row cx_form_submit_footer">
                        <div class="col-md-6 ">
                            <button class="cx_link_btn_add" type="submit">Add</button>
                        </div>
                        <div class="col-md-6">
                            <a href="<?php echo site_url('Employee_Controller/employee_login') ?>" class="cx_link_btn_inline">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
