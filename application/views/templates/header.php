<div class="container-fluid cx_header">
    <div class="row">
        <div class="col-md-8">
            <span class="cx_header_title">BS Education Melbourne</span>
        </div>
        <?php
            if(has_employee_loggedin()) {
                $this->load->view("templates/header_employee_info");
            }
        ?>
    </div>
</div>

