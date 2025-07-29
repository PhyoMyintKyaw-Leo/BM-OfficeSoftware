<?php
include("check_auth.php");
// =================================== //
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
	 <head>
		 <meta charset="utf-8">
		 <link rel="stylesheet" href="../assets/css/bootstrap.css">
		 <link rel="stylesheet" href="../assets/css/custom.css">
		 <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">
		 <title>PC List | Admin | Computer List</title>
	 </head>
	 <body>
		 <div class="container">
			 <?php include("navbar.php"); ?>

			 <a class="btn btn-primary mt-1" href="com-new.php">Create Computer</a>
			 <h1>LIST OF COMPUTERS</h1>
			 <div class="half">
				 <?php
					 include("confs/config.php");
					 $result = mysqli_query($conn, "SELECT * FROM computer ORDER BY name ASC");
					?>

					<ul class="list-group">
						<?php
							$count = 0;
							while ($row = mysqli_fetch_assoc($result)) {
								$count = $count + 1;
								$uic = "list-group-item-info";
								if (($count % 2) == 0) {
									$uic = "list-group-item-danger";
								}
								?>

								<li class="list-group-item <?php echo $uic ?>">
									<?php
										echo $count.". ";
										echo $row['name'];
									?>

									<div class="tableDiv">
										<a class="btn btn-info btn-sm" href="com-edit.php?id=<?php echo $row['id'] ?>">edit</a>
										<a class="btn btn-danger btn-sm" href="com-del.php?id=<?php echo $row['id'] ?>">del</a>
									</div>
								</li>
						<?php } ?>
					</ul>
			 </div>

		 </div>

	 </body>
 </html>
