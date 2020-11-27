<?php
include 'configs/header.php';
require_once('configs/controller.php');
require_once('configs/function.php');

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
	<?php
	if (isset($_GET['alert'])) {
		
		if ($_GET['alert']=='ok') {

		?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				The operation completed<strong> successfully!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		<?php
		}
		
		else {

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


	<div class="row">
		<div class="col-md-12">
			<h3>Records:</h3>
			<?php
			if (isset($_REQUEST["p"])) {
				$page    =  safe($_REQUEST["p"]);
			} else {
				$page    =  1;
			}

			$btnCount    =  5;
			$recordsPerPage    =  5;
			$totalRecordsQuery        =  DB()->prepare("SELECT * FROM customers");
			$totalRecordsQuery->execute();
			$totalRecordCount            =  $totalRecordsQuery->rowCount();
			$paginationStartPoint    =  ($page * $recordsPerPage) - $recordsPerPage;
			$foundPageCount            =  ceil($totalRecordCount / $recordsPerPage);
			?>
			<div class="">
				<div class="">
					<?php echo "<strong>" . $totalRecordCount . "</strong>"; ?> record found.
				</div>

				<div class="SayfalamaAlaniIciNumaralandirmaAlaniKapsayicisi">
					<?php
					if ($page > 1) {
						echo "<span class='Pasif'><a href='index.php?p=1'><<</a></span>";
						$minusOneForPagination  =  $page - 1;
						echo " <span class='Pasif'><a href='index.php?p=" . $minusOneForPagination . "'><</a></span>";
					}

					for ($pageIndex = $page - $btnCount; $pageIndex <= $page + $btnCount; $pageIndex++) {
						if (($pageIndex > 0) and ($pageIndex <= $foundPageCount)) {
							if ($page == $pageIndex) {
								echo " <span class='Aktif'>" . $pageIndex . "</span>";
							} else {
								echo " <span class='Pasif'><a href='index.php?p=" . $pageIndex . "'>" . $pageIndex . "</a></span>";
							}
						}
					}

					if ($page != $foundPageCount) {
						$plusOneForPagination  =  $page + 1;
						echo " <span class='Pasif'><a href='index.php?p=" . $plusOneForPagination . "'>></a></span>";
						echo " <span class='Pasif'><a href='index.php?p=" . $foundPageCount . "'>>></a></span>";
					}
					?>
				</div>
			</div>
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

				$object = new Controller();
				$customers = $object->fetchAll($paginationStartPoint, $recordsPerPage);


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
								<a href="details.php?id=<?php echo $customer['id']; ?>" class="btn btn-sm btn-primary" target="_blank">Json</button>
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
						<td colspan="6">Records not found!</td>
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