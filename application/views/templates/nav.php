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
                <li ><a href="<?php echo site_url('Employee/employee_login') ?>" class="cx_btn_link_overview">Overview</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle cx_btn_link_customer" data-toggle="dropdown">Customer</a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo site_url('Customer/view_customers')?>"
                               class="cx_btn_link_view_all">View all</a> </li>
                        <li><a href="<?php echo site_url('Customer/add_customer')?>"
                               class="cx_btn_link_add">Add</a> </li>
                    </ul>
                </li>
                <li ><a href="#" class="cx_btn_link_finance">Finance</a></li>
                <li class="dropdown ">
                    <a href="#" class="dropdown-toggle cx_btn_link_employee" data-toggle="dropdown" >Employee</a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo site_url('Employee/view_all_employees') ?>"
                               class="cx_btn_link_view_all">View all</a></li>
                        <li><a href="<?php echo site_url('Employee/add_employee') ?>"
                               class="cx_btn_link_add">Add</a></li>
                    </ul>
                </li>
                <li><a href="#" class="cx_btn_link_product">Product</a></li>
            </ul>

        </div>
    </div>
</nav>