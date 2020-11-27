<?php
include 'configs/header.php';
require_once('configs/controller.php');
require_once('configs/function.php');
require('configs/validator.php');

$errors = [];

if (isset($_POST['createData'])) {
    // validate entries
    $validation = new Validator($_POST);
    $errors = $validation->validateForm();

    // if errors is empty --> save data to db
    if (empty($errors)) {
        $name = safe($_POST['name']);
        $email = safe($_POST['email']);
        $phone = safe($_POST['phone']);
        $info = safe($_POST['info']);

        $object = new Controller();

        $object->Create($name, $email, $phone, $info);

        header("Location:index.php?alert=ok");

    }
}
//create

?>
<div class="container">
    <div class="col-md-6 mx-auto">
        <div>
            <h3>Create New Data</h3>
            <a class="btn btn-primary float-right" href="index.php">Back</a>
            <br><br>
            <?php
            if (isset($_GET['alert'])) {

                if ($_GET['alert'] == 'ok') {

            ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        The operation completed<strong> successfully!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php
                } else {

                ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        sorry, there was an <strong> error!</strong> Please try again.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
            <?php
                }
            }
            ?>
            <br>
            <hr>
        </div>

        <form action="create.php" method="POST">

            <div class="form-group">
                <label for="formGroupExampleInput">Name:</label>
                <input type="text" class="form-control" name="name" value="<?php echo $_POST['name'] ?? '' ?> " id="formGroupExampleInput">
            <div class="font-italic text-danger">
                    <?php echo $errors['name'] ?? '' ?>
            </div>            
            </div>

            <div class="form-group">
                <label for="formGroupExampleInput2">Email:</label>
                <input type="text" class="form-control" value="<?php echo $_POST['email'] ?? '' ?>" name="email" id="formGroupExampleInput2">
            <div class="font-italic text-danger">
                    <?php echo $errors['email'] ?? '' ?>
            </div>            
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Phone:</label>
                <input type="tel" class="form-control" name="phone" value="<?php echo $_POST['phone'] ?? '' ?>" id="formGroupExampleInput2">
            <div class="font-italic text-danger">
                    <?php echo $errors['phone'] ?? '' ?>
            </div>            
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">İnfo</label>
                <textarea class="form-control" name="info" id="exampleFormControlTextarea1" rows="3"><?php echo $_POST['info'] ?? '' ?></textarea>
            <div class="font-italic text-danger">
                    <?php echo $errors['info'] ?? '' ?>
            </div>            
            </div>
            <button type="submit" name="createData" class="btn btn-primary">Create</button>
        </form>
    </div>



</div>

<?php
include 'configs/footer.php';

?>