<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add new employee</title>
    <?php $this->load->view("templates/meta") ?>
    <?php $this->load->view("templates/basic_css") ?>
    <?php $this->load->view("templates/basic_js", array("jquery_ui" => "no", "cx_jQuery" => "no")) ?>
</head>
<body class="cx_body">
<?php $this->load->view("templates/header" ) ?>
<div class="container cx_layout_margin_center">
    <div class="col-md-12">
        <div class="cx_message_box<?php echo  isset($msg_type)? "_".$msg_type: "" ;?>" >
            <div class="cx_message_title">
                <?php echo isset($msg_type)? ucfirst($msg_type) :"Unknown" ?>
            </div>
            <div class="cx_message_content">
                <?php echo isset($msg_content)? ucfirst($msg_content) : "Unknown" ?>
                <div class="cx_message_content_btns">
                    <?php if(isset($msg_btn_one) && strlen($msg_btn_one) > 0 ) {
                        echo "<a href='" . site_url($msg_btn_one) ."' class='cx_link_btn_inline'>" . $msg_btn_one_text . "</a>";
                    }?>

                    <?php if(isset($msg_btn_two) && strlen($msg_btn_two) > 0 ) {
                        echo "<a href='" . site_url($msg_btn_two) ."' class='cx_link_btn_inline'>" . $msg_btn_two_text . "</a>";
                    }?>
               </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>