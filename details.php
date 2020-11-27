

<?php
include 'configs/header.php';
require_once('configs/function.php');

?>
   <?php
    require_once('configs/controller.php');
    $id = safe($_GET['id']);

    $object = new Controller();
    $customer = $object->Details($id);
    echo $customer;

?>








<?php
include 'configs/footer.php';

?>