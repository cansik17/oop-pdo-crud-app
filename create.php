

<?php
include 'configs/header.php';

?>
<div class="container">
    <div class="col-md-6 mx-auto">
        <div>
            <h3>Create New Data</h3>
            <a class="btn btn-primary float-right" href="index.php">Back</a>
            <br><br>
            <hr>
        </div>

        <form action="configs/action.php" method="POST">

            <div class="form-group">
                <label for="formGroupExampleInput">Name:</label>
                <input type="text" class="form-control" name="name" id="formGroupExampleInput">
            </div>

            <div class="form-group">
                <label for="formGroupExampleInput2">Email:</label>
                <input type="text" class="form-control" name="email" id="formGroupExampleInput2">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Phone:</label>
                <input type="tel" class="form-control" name="phone" id="formGroupExampleInput2">
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">İnfo</label>
                <textarea class="form-control" name="info" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <button type="submit" name="createData" class="btn btn-primary">Create</button>
        </form>
    </div>



</div>

<?php
include 'configs/footer.php';

?>