

<?php
include 'configs/header.php';

?>
   <?php
    require_once('configs/controller.php');
    $id = $_GET['id'];

    $object = new Controller();
    $customer = $object->Details($id);
    echo $customer;

?>








<?php
include 'configs/footer.php';

?>