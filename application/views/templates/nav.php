<nav class="container navbar navbar-default cx_navbar">
    <div class="row">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#cx_nav">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="cx_nav">
            <ul class="nav navbar-nav">
                <li ><a href="<?php echo site_url('Employee_Controller/employee_login') ?>" class="cx_link_btn_overview">Overview</a></li>
                <li ><a href="#" class="cx_link_btn_customer">Customer</a></li>
                <li ><a href="#" class="cx_link_btn_finance">Finance</a></li>
                <li class="dropdown ">
                    <a class="dropdown-toggle cx_link_btn_employee" data-toggle="dropdown" href="#">Employee</a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo site_url('Employee_Controller/view_all_employees') ?>" class="cx_link_btn_view_all">View all</a></li>
                        <li><a href="<?php echo site_url('Employee_Controller/add_employee') ?>" class="cx_link_btn_add">Add</a></li>
                    </ul>
                </li>
                <li><a href="#" class="cx_link_btn_product">Product</a></li>
            </ul>

        </div>
    </div>
</nav>