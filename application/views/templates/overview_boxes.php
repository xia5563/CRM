<div class="container cx_overview_boxes cx_layout_margin_center">
    <div class="row">
        <h3>Overview</h3>
    </div>
    <div class="row cx_overview_box_row">
        <div class="col-md-3">
            <div class="cx_overview_box cx_overview_box_customer">
                <div class="cx_overview_box_title">Customer Database</div>
                <div class="cx_overview_box_content">
                    <div class="cx_overview_box_content_num">
                        0
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="cx_overview_box cx_overview_box_finance">
                <div class="cx_overview_box_title">Finance</div>
                <div class="cx_overview_box_content">
                    <div class="cx_overview_box_content_num">
                        0
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="cx_overview_box cx_overview_box_employee">
                <div class="cx_overview_box_title">Employee Database</div>
                <div class="cx_overview_box_content">
                    <div class="cx_overview_box_content_num">
                        <?php echo isset($count_employee)? $count_employee : "unknown";?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="cx_overview_box cx_overview_box_product">
                <div class="cx_overview_box_title">Product details</div>
                <div class="cx_overview_box_content">
                    <div class="cx_overview_box_content_num">
                        0
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>