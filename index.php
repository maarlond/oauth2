<?php
session_start();
?>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title></title>
</head>
<body>
    <div style="height:100%;width:100%; border-width: 0px; background-image: linear-gradient(to right,#2a529d, #507de1);" >
        <a href="./auth.php">Login<a>
    </div>
</body>
</html>
<?php
    if(isset($_SESSION) && !empty($_SESSION) ){
        header("Location:./sistema.php");
    }
?>