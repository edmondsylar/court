<?php

include_once("inc/head.php");
include_once("connection.php");

if(isset($_POST['update'])){
	$id = $_POST['id'];
	$box = $_POST['box'];
	$boxsn = $_POST['boxsn'];
	$cat = $_POST['cat'];
	$icno = $_POST['icno'];
	$pat = $_POST['pat'];
	$arise = $_POST['arise'];
	$claim = $_POST['claim'];
	$note = $_POST['note'];
	$copies = $_POST['copies'];
		
	
	// checking empty fields
	if(empty($box) || empty($boxsn) || empty($cat)|| empty($icno)|| empty($pat)|| empty($arise)|| empty($claim)|| empty($note)|| empty($copies)) {
					
			if(empty($box)) {
				echo "<font color='red'>Box field is empty.</font><br/>";
			}
			
			if(empty($boxsn)) {
				echo "<font color='red'>file number is empty</font><br/>";
			}
			
			if(empty($cat)) {
				echo "<font color='red'>Category field is empty.</font><br/>";
			}
			if(empty($icno)) {
				echo "<font color='red'>IC N0 field is empty.</font><br/>";
			}
			if(empty($pat)) {
				echo "<font color='red'>Parties to the Dispute field is empty.</font><br/>";
			}
			if(empty($arise)) {
				echo "<font color='red'>Arising from field is empty.</font><br/>";
			}
			if(empty($claim)) {
				echo "<font color='red'>Claim field is empty.</font><br/>";
			}
			if(empty($note)) {
				echo "<font color='red'>Note field is empty.</font><br/>";
			}
			if(empty($copies)) {
				echo "<font color='red'>Number of copies is empty.</font><br/>";
			}
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE products SET bx='$box', boxsn='$boxsn', cat='$cat', icno='$icno', pat='$pat', arise='$arise', claim='$claim', note='$note', copies='$copies' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is view.php
		header("Location: ./");
		//exit(header("Location: view.php"));
		//echo("<script>location.href = 'view.php';</script>");
	}
}

if(isset($_POST['attach'])){
	
	$file_name = $_POST['file'];
	$uuid = uniqid(''. true);
	$id = $_GET['id'];
	$make = mysqli_query($mysqli, "INSERT INTO files( uuid, filename) VALUES('$uuid', '$file_name') ")
		or die( print_r(mysql_error()) );

	// Now you are going to update the record.
	$update = mysqli_query($mysql, "UPDATE products SET file='$uuid' where id=$id") or die( print_r(mysql_error()));
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM products WHERE id=$id");

	while($res = mysqli_fetch_array($result)){
			$box = $res['bx'];
			$boxsn = $res['boxsn'];
			$cat = $res['cat'];
			$icno = $res['icno'];
			$pat = $res['pat'];
			$arise = $res['arise'];
			$claim = $res['claim'];
			$note = $res['note'];
			$copies = $res['copies'];
	}
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
						<li><a href="./">Data</a></li>
						<li class="active">Edit File <?php echo $boxsn ?></li>
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
								<strong class="card-title"><?php echo $boxsn ?></strong>

								<button type="button" class="btn btn-success mb-1 btn-sm" data-toggle="modal" data-target="#largeModal">
									Attach File
								</button>
							</div>
								<div class="card-body">
					
									<form name="form1" method="post">
										<table id="bootstrap-data-table-export" class="table table-striped table-bordered">
											<tr> 
												<td>Box Number</td>
												<td><input type="text" name="box" value="<?php echo $box;?>"></td>
											</tr>
											<tr> 
												<td>File Number</td>
												<td><input type="text" name="boxsn" value="<?php echo $boxsn;?>"></td>
											</tr>
											<tr> 
												<td>Category</td>
												<td><input type="text" name="cat" value="<?php echo $cat;?>"></td>
											</tr>
											<tr> 
												<td>IC N0</td>
												<td><input type="text" name="icno" value="<?php echo $icno;?>"></td>
											</tr>
											<tr> 
												<td>Parties to the Dispute</td>
												<td><input type="text" name="pat" value="<?php echo $pat;?>"></td>
											</tr>
											<tr> 
												<td>Arising from</td>
												<td><input type="text" name="arise" value="<?php echo $arise;?>"></td>
											</tr>
											<tr> 
												<td>Claim</td>
												<td><input type="text" name="claim" value="<?php echo $claim;?>"></td>
											</tr>
											<tr> 
												<td>Note</td>
												<td><input type="text" name="note" value="<?php echo $note;?>"></td>
											</tr>
											<tr> 
												<td>Copies</td>
												<td><input type="text" name="copies" value="<?php echo $copies;?>"></td>
											</tr>
											<tr>
												<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
												<td><input type="submit" class="btn btn-primary btn-sm" name="update" value="Update"></td>
											</tr>
										</table>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="largeModalLabel">Attach File to <code><?php echo $boxsn ?></code></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form name="form2" method="post">
								<p>
									<input type="text" name="file" required class="form-control" placeholder="File">
								</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
								<button type="submit" name="attach" class="btn btn-primary">Confirm</button>
							</div>
						</form>
						
				</div>
			</div>
		</div>
	
<script src="vendors/jquery/dist/jquery.min.js"></script>
<script src="vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>
