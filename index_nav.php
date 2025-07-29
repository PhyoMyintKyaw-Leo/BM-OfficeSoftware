<nav>
	<div class="logo"><img src="./img/Logo.jpg" alt=""></div>
	<ul>
		<li>
			<a class="navbar" href="home.php">
				<?php echo $_SESSION['user_name'] ?>
				<?php if($_SESSION['user_name_jpn'] != "") {?> (
				<?php echo $_SESSION['user_name_jpn']; ?> )
				<?php  } ?>
			</a>
		</li>
		<?php
			if (isset($_SESSION['admin']) == true){
				echo"
				<li>
					<a class='navbar' href='admin/com-list.php'>Senyo Computer</a>
				</li>
				<li>
					<a class='navbar' href='admin/inventory.php'>Inverntory</a>
				</li>
				";
			}
		?>
		<li class="dropdown">
			<a href="#" class="dropdown-toggle">
				<img src="./assets/img/setting.jpg" alt="setting">
			</a>
			<ul class="dropdown-menu">
				<li><a class="navbar" href='u_password_edit.php'>Change Password</a></li>
				<li><a class="navbar" href="login.php">Log Out</a></li>
			</ul>
		</li>
	</ul>
</nav>