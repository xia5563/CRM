<div class="cx_function_box cx_function_box_employee">

    <div class="cx_function_box_title">
        Employee Database
    </div>

    <div class="container-fluid cx_function_box_content">
        <div class="row ">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Add a new employee?</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <a href="<?php echo site_url('Employee/add_employee') ?>"
                           class="cx_btn_link_add">Add new</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <img src="<?php echo base_url() . IMG .'structure.png' ?>"
                             class="cx_function_box_img img-responsive" alt="Company structure">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 cx_function_box_content_btn_under_img">
                        <a href="<?php echo site_url('Employee/view_all_employees') ?>"
                           class="cx_btn_link_view_all">View all</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h4>Search for a specifc employee?</h4>
            </div>
        </div>
        <div class="row cx_search_employee_row">
            <div class="col-md-4">
                <select id="search_employee_select">
                    <option value="employee_name">Employee name</option>
                    <option value="email">Email</option>
                    <option value="privilege">Privilege</option>
                </select>
            </div>
            <div class="col-md-5">
                <input type="text" id="search_employee_input"  placeholder="Keywords?">
            </div>
            <div class="col-md-3">
                <button id="search_employee_btn" class="cx_btn_link_search" >Search</button>
            </div>
        </div>
    </div>
</div>