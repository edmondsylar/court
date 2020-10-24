<?php include_once('inc/head.php'); ?> 



<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
//including the database connection file
include_once("connection.php");

//fetching data in descending order (lastest entry first)
//UNCOMMENT THE CODE BELOW FOR USERS TO SEE PRODUCTS THEY HAVE UPDATED ONLY
//$result = mysqli_query($mysqli, "SELECT * FROM products WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
$result = mysqli_query($mysqli, "SELECT * FROM products ORDER BY id DESC");
?>

<div class="breadcrumbs">
		<div class="col-sm-4">
			<div class="page-header float-left">
				<div class="page-title">
					<h1>Dashboard</h1>
				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="page-header float-right">
				<div class="page-title">
					<ol class="breadcrumb text-right">
						<li><a href="#">Dashboard</a></li>
						<li><a href="#">Data</a></li>
						<!-- <li class="active">Data table</li> -->
					</ol>
				</div>
			</div>
		</div>
	</div>
	<div class="content mt-3">
	<div class="animated fadeIn">
		<div class="row">

			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<strong class="card-title">Data Table</strong>
					</div>
					<div class="card-body">
						<table id="bootstrap-data-table-export" class="table table-striped table-bordered">
							<thead>
								<tr>
									<td>SN</td>
									<td>Box Number</td>
									<td>File Number</td>
									<td>Catelog</td>
									<td>Ic N0</td>
									<td>Parties</td>
									<td>Arising</td>
									<td>Claim</td>
									<td>Note</td>
									<td>Copies</td>
									<td>Filing</td>
									<td>action</td>
								</tr>
							</thead>
							<tbody>
								<?php
								while($res = mysqli_fetch_array($result)) {		
									echo "<tr>";
									echo "<td>".$res['id']."</td>";
									echo "<td>".$res['bx']."</td>";
									echo "<td>".$res['boxsn']."</td>";
									echo "<td>".$res['cat']."</td>";
									echo "<td>".$res['icno']."</td>";
									echo "<td>".$res['pat']."</td>";
									echo "<td>".$res['arise']."</td>";
									echo "<td>".$res['claim']."</td>";
									echo "<td>".$res['note']."</td>";
									echo "<td>".$res['copies']."</td>";
									echo "<td><a href=\"edit.php?id=$res[id]\">More</a></td>";	
									echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>


		</div>
	</div><!-- .animated -->
</div>

<?php include_once("inc/footer.php") ?>

