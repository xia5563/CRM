<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <?php $this->load->view("templates/meta")?>
    <?php $this->load->view("templates/basic_css")?>
    <?php $this->load->view("templates/basic_js", array("jquery_ui"=>"no", "cx_jQuery"=>"yes"))?>
    <style type="text/css">
        .row{
            margin-top:100px;
        }
        div {
            margin:10px;
        }
    </style>
    <script>
        $(document).ready(function(){
            $("#test_btn").click(function(){
                var str = $("#test01").val();
                var str01 = str.replace(/^\s+|\s+$/g, "");
                var str02 = str01.replace(/\b\s+\b/g, " ");
                $("#test02").text(str02);
            })
        });
    </script>
</head>

<body >
<div class="container ">
    <div class="row">
        <div class="col-md-12 text-center">
            <div> Input something: <input id="test01" ></div>
            <div> <button id="test_btn">Run it</button> </div>
            <div> The result is :"<span id="test02"></span>".</div>
        </div>
    </div>

</body>
</html>
