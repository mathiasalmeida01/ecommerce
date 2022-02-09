
<?php
ob_start();
?>
<?php
header("location: ../ecommerce.php");
echo '<script>alert("Compra realizada exitosamente!")</script>';
exit;
?>
<?php
ob_end_flush();
?>