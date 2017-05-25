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
            <span> <?php echo isset($title_message)? $title_message: ""; ?> </span>
        </div>
    </div>
</div>
<div class="cx_layout_margin_center cx_show_multiple">
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
        <div class="col-md-1">
            PY enquiry date
        </div>
        <div class="col-md-1">
            PTE enquiry date
        </div>
        <div class="col-md-1">
            RPL enquiry date
        </div>
    </div>

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
            <div class="col-md-1">
                <?php echo $customer['py_enquiry_date']; ?>
            </div>
            <div class="col-md-1">
                <?php echo $customer['pte_enquiry_date']; ?>
            </div>
            <div class="col-md-1">
                <?php echo $customer['rpl_enquiry_date']; ?>
            </div>
            <div class="col-md-3">
                <a href="<?php echo site_url('Customer/view_customer/' . $customer['email'])?>"
                   class="cx_btn_link_view_sm">view</a>
                <a href="#" class="cx_btn_link_update_sm">update</a>
                <a href="#" class="cx_btn_link_delete_sm">delete</a>
            </div>

        </div>
    <?php endforeach;  ?>

    <?php endif?>

</div>

</body>
</html>

