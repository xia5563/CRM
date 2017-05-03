<?php (isset($test) and strlen($test)>0) or $this->load->view("news/success"); ?>
<!doctype html>
<html>
<head>
    <title>testing....</title>
</head>
<body>
<?php
echo "$test <br> $shuffle <br> $unshuffle";
?>
</body>
</html>

