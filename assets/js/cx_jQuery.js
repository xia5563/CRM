$(document).ready(function() {
    view_recent_btn_click();
    search_customers_btn_click();
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
function view_recent_btn_click(){
    var btn = $("#view_recent_btn");
    if(btn.length == 0) {return;} //Ignore following if non-exist.
    btn.on("click",function(){
        var selectVal = $("#view_recent_select").val();
        var inputVal = $("#view_recent_input").val();
        window.location.href = site_url + "/Customer/view_customers/" + selectVal + "/" + inputVal;
    });
}
function search_customers_btn_click(){
    var btn = $("#search_customers_btn");
    if(btn.length == 0) {return;} //Ignore following if non-exist.
    btn.on("click",function(){
        var selectVal = $("#search_customers_select").val();
        var selectText = $("#search_customers_select option:checked").text();
        var inputVal = $("#search_customers_input").val();
        var url = site_url + "/Customer/search_customers/" + selectVal + "/" + inputVal +"/" + selectText ;
        url = rm_rp_spaces(url);
        alert(url);
        window.location.href = url;
    })
}

