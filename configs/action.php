<?php

require_once('controller.php');

//create
if (isset($_POST['createData'])) {
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone'])) {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $info = $_POST['info'];


        $object = new Controller();

        $object->Create($name, $email, $phone, $info);

        header("Location:../index.php");
    }
}

//update
if (isset($_POST['updateData'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $info = $_POST['info'];

    $object = new Controller();

    $object->Update($name, $email, $phone, $info, $id);

    header("Location:../index.php");
    
}
//details

// if (isset($_POST['id']) && isset($_POST['id']) != "") {

//     $id = $_POST['id'];

//     $object = new Controller();

//     echo $object->Details($id);
// }

//delete

if (isset($_GET['uid']) && isset($_GET['uid']) != "") {

    $uid = $_GET['uid'];

    $object = new Controller();
    $object->Delete($uid);

    header("Location:../index.php");
}

//search

if (isset($_POST['search'])) {

    $q    =    $_POST["search"];
    if (empty($q)) {
        Header("Location:../index.php");
    } else {

        $object = new Controller();
        $object->search($q);

        header("Location:../search.php");
    }
}