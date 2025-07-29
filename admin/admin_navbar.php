<nav>
	<div class="logo"><img src="../img/Logo.jpg" alt=""></div>
	<ul>
		<li>
			<a class="navbar" href="../home.php">
				<?php echo $_SESSION['user_name'] ?>
				<?php if($_SESSION['user_name_jpn'] != "") {?> (
				<?php echo $_SESSION['user_name_jpn']; ?> )
				<?php  } ?>
			</a>
		</li>
		<li>
			<a class='navbar' href='com_list.php'>Senyo Computer</a>
		</li>
		<li>
			<a class='navbar' href='inventory.php'>Inverntory</a>
		</li>
		<li class="dropdown">
			<a href="#" class="dropdown-toggle">
				<img src="../assets/img/setting.jpg" alt="setting">
			</a>
			<ul class="dropdown-menu">
				<li><a class="droplink" href='../u_password_edit.php'>Change Password</a></li>
				<li><a class="droplink" href="../logout.php">Log Out</a></li>
			</ul>
		</li>
	</ul>
</nav>