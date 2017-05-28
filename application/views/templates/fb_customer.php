<div class="cx_function_box cx_function_box_customer">
    <div class="cx_function_box_title">
        Customer Database
    </div>
    <div class="container-fluid cx_function_box_content">
        <div class="row ">
            <div class="col-md-8 cx_view_recent_col">

                <div class="cx_layout_group_a">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Add new customers?</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <a href="<?php echo site_url('Customer/add_customer') ;?>" class="cx_btn_link_add">Add new</a>
                        </div>
                        <div class="col-md-8">
                            <a href="#" class="cx_btn_link_add_csv">Add from CSV</a>
                        </div>
                    </div>
                </div>

                <div class="cx_layout_group_a">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>View recent customers?</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <span>Enquiry type:</span>
                        </div>
                        <div class="col-md-6">
                            <select id="view_recent_select">
                                <option value="py_enquiry_date">PY enquiry</option>
                                <option value="pte_enquiry_date">PTE enquiry</option>
                                <option value="rpl_enquiry_date">RPL enquiry</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <span>Within how many days:</span>
                        </div>
                        <div class="col-md-6">
                            <input type="number" id="view_recent_input" min="1" max="1000" value="1">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 ">
                            <button class="cx_btn" id="view_recent_btn">View recent</button>
                        </div>

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
                        <a href="<?php echo site_url('Customer/view_all_customers') ?>"
                           class="cx_btn_link_view_all">View all</a>
                    </div>
                </div>

            </div>
        </div>

        <div class="cx_layout_group_a">
            <div class="row">
                <div class="col-md-12">
                    <h4>Search for a specific customer?</h4>
                </div>
            </div>
            <div class="row cx_search_customer_row">
                <div class="col-md-4">
                    <select id="search_customer_select">
                        <option value="customer_name">Customer name</option>
                        <option value="email">Email</option>
                        <option value="mobile_phone">Mobile phone</option>
                    </select>
                </div>
                <div class="col-md-5">
                    <input type="text" id="search_customer_input"  placeholder="Keywords?">
                </div>
                <div class="col-md-3">
                    <button id="search_customer_btn" class="cx_btn_link_search" >Search</button>
                </div>
            </div>
        </div>

    </div>
</div>