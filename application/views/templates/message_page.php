<!DOCTYPE html>
<html lang="en">
<head>
    <title>Message</title>
    <?php $this->load->view("templates/meta") ?>
    <?php $this->load->view("templates/basic_css") ?>
    <?php $this->load->view("templates/basic_js", array("jquery_ui" => "no", "cx_jQuery" => "no")) ?>
</head>
<body class="cx_body">
<?php $this->load->view("templates/header" ) ?>
<?php if(has_employee_loggedin()) {$this->load->view('templates/nav');} ?>
<div class="container cx_layout_margin_center">
    <div class="col-md-12">
        <div class="cx_message_box<?php echo  isset($msg_type)? "_".$msg_type: "" ;?>" >
            <div class="cx_message_title">
                <?php echo isset($msg_type)? ucfirst($msg_type) :"Unknown" ?>
            </div>
            <div class="cx_message_content">
                <?php echo isset($msg_content)? ucfirst($msg_content) : "Unknown" ?>
                <div class="cx_message_content_btns">
                    <?php if(isset($msg_btn1) && strlen($msg_btn1) > 0 ) {
                        echo "<a href='" . site_url($msg_btn1) ."' class='cx_btn_link_inline cx_msg_btn1'>" . $msg_btn1_text . "</a>";
                    }?>

                    <?php if(isset($msg_btn2) && strlen($msg_btn2) > 0 ) {
                        echo "<a href='" . site_url($msg_btn2) ."' class='cx_btn_link_inline cx_msg_btn2'>" . $msg_btn2_text . "</a>";
                    }?>

                    <?php if(isset($msg_btn3) && strlen($msg_btn3) > 0 ) {
                        echo "<a href='" . site_url($msg_btn3) ."' class='cx_btn_link_inline cx_msg_btn3'>" . $msg_btn3_text . "</a>";
                    }?>
               </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>