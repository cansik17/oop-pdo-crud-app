<?php
include 'configs/header.php';
require_once('configs/controller.php');

$q    =    $_POST["search"];

$object = new Controller();
$customers = $object->search($q);
$recordCount = count($customers);
?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>PHP OOP PDO CRUD simple crm app</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="float-left">
				<a class="btn btn-success" href="index.php">Homepage</a>
			</div>
			<div class="float-right">
				<a class="btn btn-success" href="create.php">Add New Record</a>
			</div>
		</div>
	</div>
	<form action="search.php" method="post">
		<div class="input-group mb-3 mt-3">
			<input type="text" class="form-control" name="search" placeholder="Search data..." aria-label="Recipient's username" aria-describedby="button-addon2">
			<div class="input-group-append">
				<button class="btn btn-outline-primary" type="submit" id="button-addon2">Search</button>
			</div>
		</div>
	</form>
	<div class="row">
		<div class="col-md-12">

			<h3>Records:</h3>
			<p><strong><?php echo $recordCount; ?></strong> record found</p>

			<table class="table table-bordered table-striped">

				<tr>
					<th>Id.</th>
					<th>Name</th>
					<th>Email Address</th>
					<th>Phone</th>
					<th>İnfo</th>
					<th>Details</th>
					<th>Update</th>
					<th>Delete</th>
				</tr>
				<?php


				if (count($customers) > 0) {

					foreach ($customers as $customer) {
				?>
						<tr>
							<td><?php echo $customer['id']; ?> </td>
							<td><?php echo $customer['name']; ?> </td>
							<td><?php echo $customer['email']; ?></td>
							<td><?php echo $customer['phone']; ?></td>
							<td><?php echo $customer['info']; ?></td>
							<td>
								<a href="details.php?id=<?php echo $customer['id']; ?>" class="btn btn-sm btn-primary">Json</button>
							</td>
							<td>
								<a href="update.php?id=<?php echo $customer['id']; ?>" class="btn btn-warning">Update</button>
							</td>
							<td>
								<a href="configs/action.php?uid=<?php echo $customer['id']; ?>" class="btn btn-danger">Delete</button>
							</td>
						</tr>
					<?php

					}
				} else {
					?>
					<tr>
						<td colspan="6">No data! Search Again!</td>
					</tr>
				<?php
				}
				?>

			</table>
		</div>

	</div>
</div>
<?php
include 'configs/footer.php';

?>