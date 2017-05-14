<script src="<?php echo base_url(). BOOTSTRAP_JS . 'jquery-2.2.1.js'?>"></script>
<?php
if(isset($jquery_ui) and  $jquery_ui == 'yes'  ) {
    echo "<script src='". base_url() . BOOTSTRAP_JS . "jquery-ui.js'" ."></script>";
}
?>
<script src="<?php echo base_url() . BOOTSTRAP_JS . 'bootstrap.js'?>"></script>
<?php
if(isset($cx_jQuery) and  $cx_jQuery == 'yes'  ) {
    echo "<script src='". base_url() . JS . "cx_jQuery.js'" ."></script>";
}
?>
