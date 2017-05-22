<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add new customer</title>
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
            <div class="cx_form_add">
                <div class="cx_form_title">Add new customer</div>
                <form class="cx_form_content" action="<?php echo site_url('Employee/add_customer') ;?>" method="post">
                    <div class="row">
                        <div class="col-md-4">
                            <span class="cx_input_title">Customer name:</span>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="cx_input" name="customer_name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <span class="cx_input_title">Email:</span>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="cx_input" name="email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <span class="cx_input_title">Mobile phone:</span>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="cx_input" name="mobile_phone">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <span class="cx_input_title">PY enquiry date:</span>
                        </div>
                        <div class="col-md-8">
                            <input class="cx_input" name="py_enquiry_date">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <span class="cx_input_title">PTE enquiry date:</span>
                        </div>
                        <div class="col-md-8">
                            <input class="cx_input" name="pte_enquiry_date">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <span class="cx_input_title">RPL enquiry date:</span>
                        </div>
                        <div class="col-md-8">
                            <input class="cx_input" name="rpl_enquiry_date">
                        </div>
                    </div>

                    <div class="row cx_form_submit_footer">
                        <div class="col-md-6 ">
                            <button class="cx_btn_link_add" type="submit">Add</button>
                        </div>
                        <div class="col-md-6">
                            <a href="<?php echo site_url('Employee/employee_login') ?>" class="cx_btn_link_inline">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
