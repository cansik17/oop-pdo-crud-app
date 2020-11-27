<?php

require_once('controller.php');
require_once('function.php');


// //create
// if (isset($_POST['createData'])) {
//     if (($_POST['name']!="") and ($_POST['email']!="") and ($_POST['phone']!="")) {

//         $name = safe($_POST['name']);
//         $email = safe($_POST['email']);
//         $phone = safe($_POST['phone']);
//         $info = safe($_POST['info']);


//         $object = new Controller();

//         $object->Create($name, $email, $phone, $info);

//         header("Location:../create.php?alert=ok");
  
//     }else {
//         header("Location:../create.php?alert=no");
//     }
// }

//update
// if (isset($_POST['updateData'])) {

//     if (($_POST['name'] != "") and ($_POST['email'] != "") and ($_POST['phone'] != "")) {
  
//     $id = safe($_POST['id']);
//     $name = safe($_POST['name']);
//     $email = safe($_POST['email']);
//     $phone = safe($_POST['phone']);
//     $info = safe($_POST['info']);

//     $object = new Controller();

//     $object->Update($name, $email, $phone, $info, $id);

//     header("Location:../index.php?alert=ok");

//     } else {
//         header("Location:../index.php?alert=no");
//     }
 
// }
//details

// if (isset($_POST['id']) && isset($_POST['id']) != "") {

//     $id = $_POST['id'];

//     $object = new Controller();

//     echo $object->Details($id);
// }

//delete

if (isset($_GET['uid'])) {
    if ($_GET['uid'] != "") {
        $uid = safe($_GET['uid']);

        $object = new Controller();
        $object->Delete($uid);

        header("Location:../index.php?alert=ok");
    }else {
        header("Location:../index.php?alert=no");
    }
    
    

    }

//search

if (isset($_POST['search'])) {

    $q    =    safe($_POST["search"]);
    if (empty($q)) {
        Header("Location:../index.php");
    } else {

        $object = new Controller();
        $object->search($q);

        header("Location:../search.php");
    }
}