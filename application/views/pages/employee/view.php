<!DOCTYPE html>
<html lang="en">
<head>
    <title>View</title>
    <?php $this->load->view("templates/meta") ?>
    <?php $this->load->view("templates/basic_css") ?>
    <?php $this->load->view("templates/basic_js", array("jquery_ui" => "no", "cx_jQuery" => "no")) ?>
</head>
<body class="cx_body">
<?php $this->load->view("templates/header") ?>
<?php $this->load->view("templates/nav") ?>
<div class="container">
    <div class="row ">
        <div class="col-md-12">
            <div class="cx_solo_message_center">
                <span>   <?php echo isset($title_message)? $title_message: ""; ?>   </span>
            </div>
        </div>
    </div>
</div>
<div class="container cx_layout_margin_center">
    <div class="row">
        <div class="col-md-12">
            <?php if(isset($num_rows) && $num_rows>0): ?>
                <div class="cx_form_view">
                    <div class="cx_form_title">Employee information</div>
                    <form class=" cx_form_content" >
                        <div class="row">
                            <div class="col-md-4">
                                <span class="cx_input_title">Employee name:</span>
                            </div>
                            <div class="col-md-8">
                                <input type="hidden" name="employee_name" value="<?php echo $employee['employee_name'];?>">
                                <span class=""><?php echo $employee['employee_name'];?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <span class="cx_input_title">Password:</span>
                            </div>
                            <div class="col-md-8">
                                <span><?php echo $employee['password'] ;?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <span class="cx_input_title">Email:</span>
                            </div>
                            <div class="col-md-8">
                                <span><?php echo $employee['email'] ;?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <span class="cx_input_title">Employee privilege:</span>
                            </div>
                            <div class="col-md-8">
                                <span><?php echo $employee['privilege'] ;?></span>
                            </div>
                        </div>

                        <div class="row cx_form_submit_footer">
                            <div class="col-md-6">
                                <a href="<?php echo site_url('Employee/update_employee/' . $employee['employee_name'])?>"
                                   class="cx_btn_link_update">Update</a>
                            </div>
                            <div class="col-md-6">
                                <a href="<?php echo site_url('Employee/delete_employee/' . $employee['employee_name'])?>"
                                   class="cx_btn_link_delete">Delete</a>
                            </div>
                        </div>

                    </form>
                </div>

            <?php endif?>
        </div>
    </div>
</div>

</body>
</html>

