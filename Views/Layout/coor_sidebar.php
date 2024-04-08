<section id="sidebar">
		<a style="text-decoration: none;" class="brand">
            <i class='bx bxs-cool'></i>
			<span class="text">
                <?php echo $_SESSION['username'];?>
            </span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a style="text-decoration: none;" href="index.php?action=coordinator_index">
                    <i class='bx bxs-home-heart' ></i>
					<span class="text">Home</span>
				</a>
			</li>
			<li>
				<a style="text-decoration: none;" href="index.php?action=coordinator_student">
                    <i class='bx bxs-graduation' ></i>
					<span class="text">My Student</span>
				</a>
			</li>
			<li>
				<a style="text-decoration: none;" href="index.php?action=coordinator_contribution">
                    <i class='bx bxs-book-content'></i>
					<span class="text">Contribution</span>
				</a>
			</li>
			<li>
				<a style="text-decoration: none;" href="index.php?action=coordinator_mail">
                    <i class='bx bxs-envelope' ></i>
					<span class="text">Mail</span>
				</a>
			</li>
			<li>
				<a style="text-decoration: none;" href="index.php?action=coordinator_profile">
                    <i class='bx bxs-user-circle' ></i>
					<span class="text">Profile</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a style="text-decoration: none;" href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a style="text-decoration: none;" href="./index.php?action=logout" class="logout">
                    <i class='bx bx-arrow-to-left'></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>