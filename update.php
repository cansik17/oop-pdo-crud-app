<?php
include 'configs/header.php';

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
        require_once('configs/controller.php');
        $id = $_GET['id'];

        $object = new Controller();
        $customer = $object->fetch($id);

        ?>
        <form action="configs/action.php?id=<?php echo $customer['id']; ?>" method="POST">
            <input type="hidden" name="id" value="<?php echo $customer['id']; ?>">
            <div class="form-group">
                <label for="formGroupExampleInput">Name:</label>
                <input type="text" class="form-control" value="<?php echo $customer['name']; ?>" name="name" id="formGroupExampleInput">
            </div>

            <div class="form-group">
                <label for="formGroupExampleInput2">Email:</label>
                <input type="tel" class="form-control" value="<?php echo $customer['email']; ?>" name="email" id="formGroupExampleInput2">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Phone:</label>
                <input type="text" class="form-control" value="<?php echo $customer['phone']; ?>" name="phone" id="formGroupExampleInput2">
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">İnfo</label>
                <textarea class="form-control" name="info" id="exampleFormControlTextarea1" rows="3"><?php echo $customer['info']; ?></textarea>
            </div>
            <button type="submit" name="updateData" class="btn btn-primary">Update</button>
        </form>
    </div>



</div>

<?php
include 'configs/footer.php';

?>