<!DOCTYPE html>
<html lang="en">
<head>
    <title>View</title>
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
             <?php echo isset($title_message)? $title_message: ""; ?>
        </div>
    </div>
</div>
<div class="container cx_layout_margin_center cx_show_multiple">
    <?php if(isset($num_rows) && $num_rows>0): ?>
        <div class="row cx_show_title">
        <div class="col-md-2">
            Customer name
        </div>
        <div class="col-md-2">
            Email
        </div>
        <div class="col-md-2">
            Mobile number
        </div>
        <div class="col-md-2">
            PY enquiry date
        </div>
        <div class="col-md-2">
            PTE enquiry date
        </div>
        <div class="col-md-2">
            RPL enquiry date
        </div>
    </div>
    <?php endif?>


    <?php foreach($customers as $customer): ?>
        <div class="row">
            <div class="col-md-2">
                <?php echo $customer['customer_name']; ?>
            </div>
            <div class="col-md-2">
                <?php echo $customer['email']; ?>
            </div>
            <div class="col-md-2">
                <?php echo $customer['mobile_phone']; ?>
            </div>
            <div class="col-md-2">
                <?php echo $customer['py_enquiry_date']; ?>
            </div>
            <div class="col-md-2">
                <?php echo $customer['pte_enquiry_date']; ?>
            </div>
            <div class="col-md-2">
                <?php echo $customer['rpl_enquiry_date']; ?>
            </div>

        </div>
    <?php endforeach;  ?>
</div>

</body>
</html>

