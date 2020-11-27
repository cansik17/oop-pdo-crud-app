<?php
include 'configs/header.php';
require_once('configs/function.php');
require_once('configs/controller.php');
require('configs/validator.php');

$errors = [];

if (isset($_POST['updateData'])) {
    // validate entries
    $validation = new Validator($_POST);
    $errors = $validation->validateForm();

    // if errors is empty --> save data to db
    if (empty($errors)) {
        $id = safe($_POST['id']);
        $name = safe($_POST['name']);
        $email = safe($_POST['email']);
        $phone = safe($_POST['phone']);
        $info = safe($_POST['info']);

        $object = new Controller();

        $object->Update($name, $email, $phone, $info, $id);

        header("Location:index.php?alert=ok");
    }
}
?>

<div class="container">
    <div class="col-md-6 mx-auto">
        <div>
            <h3>Edit Data</h3>
            <a class="btn btn-primary float-right" href="index.php">Back</a>
            <br><br>
            <hr>
        </div>
        <?php
        $id = safe($_GET['id']);

        $object = new Controller();
        $customer = $object->fetch($id);

        ?>
        <form action="update.php?id=<?php echo $customer['id']; ?>" method="POST">
            <input type="hidden" name="id" value="<?php echo $customer['id']; ?>">
            <div class="form-group">
                <label for="formGroupExampleInput">Name:</label>
                <input type="text" class="form-control" value="<?php echo $customer['name']; ?>" name="name" id="formGroupExampleInput">
            <div class="font-italic text-danger">
                    <?php echo $errors['name'] ?? '' ?>
            </div>  
            </div>

            <div class="form-group">
                <label for="formGroupExampleInput2">Email:</label>
                <input type="tel" class="form-control" value="<?php echo $customer['email']; ?>" name="email" id="formGroupExampleInput2">
            <div class="font-italic text-danger">
                    <?php echo $errors['email'] ?? '' ?>
            </div>  
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Phone:</label>
                <input type="text" class="form-control" value="<?php echo $customer['phone']; ?>" name="phone" id="formGroupExampleInput2">
            <div class="font-italic text-danger">
                    <?php echo $errors['phone'] ?? '' ?>
            </div>  
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">İnfo</label>
                <textarea class="form-control" name="info" id="exampleFormControlTextarea1" rows="3"><?php echo $customer['info']; ?></textarea>
            <div class="font-italic text-danger">
                    <?php echo $errors['info'] ?? '' ?>
            </div>  
            </div>
            <button type="submit" name="updateData" class="btn btn-primary">Update</button>
        </form>
    </div>



</div>

<?php
include 'configs/footer.php';

?>