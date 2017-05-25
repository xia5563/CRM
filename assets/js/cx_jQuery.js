$(document).ready(function() {
    cx_standard_search($("#view_recent_btn"), $("#view_recent_input"),
        $("#view_recent_select"),  "/Customer/view_recent_customer/");
    cx_standard_search($("#search_customer_btn"), $("#search_customer_input"),
        $("#search_customer_select"), "/Customer/search_customer/");
    cx_standard_search($("#search_employee_btn"),  $("#search_employee_input"),
        $("#search_employee_select"), "/Employee/search_employee/");
});

//Group of functions
function rm_spaces(str){
    var str01 = str.replace(/^\s+|\s+$/g, ""); //Remove spaces at the beginning and the end.
    var str02 = str01.replace(/\b\s+\b/g, " ");  //Remove multiple spaces with only one space in-between words.
    return str02;
}
function rm_rp_spaces(str){
    var str01 = str.replace(/^\s+|\s+$/g, ""); //Remove spaces at the beginning and the end.
    var str02 = str01.replace(/\s+/g, "~");  //Replace multiple spaces with "+" in-between words.
    return str02;
}
function are_symbols_illegal(str){
    var pattern = "/[^\w\s\.@#]/g";  //Legal symbols are: Any alphabet, space, ".", "@", "#"
    return pattern.test(str);
}

function cx_standard_search(btn, input, select, url_part){
    if(btn.length == 0) {return;} //Ignore following if non-exist.
    btn.on("click",function(){
        cx_search(input, select, url_part);
    });
    input.on("keypress", function(event) {
        //When user press "Enter" key
        if(event.which==13){
            cx_search($(this), select, url_part);
        }
    });
}
function cx_search(input,select,url_part){
    var inputVal = input.length > 0 ? input.val() : "";
    var selectVal = select.val();
    var selectText = select.find("option:checked").text();
    var url = site_url + url_part + selectVal + "/" + selectText +"/" + inputVal ;
    url = rm_rp_spaces(url);
    window.location.href = url;
}
