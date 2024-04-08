<section id="sidebar">
		<a style="text-decoration: none;" class="brand">
            <i class='bx bxs-happy-heart-eyes'></i>
			<span id="username" class="text">
				<?php echo $_SESSION['username'];?>
			</span>
		</a>
		<ul class="side-menu top">
			<li >
				<a style="text-decoration: none;" href="index.php?action=student_index">
                    <i class='bx bxs-home-heart' ></i>
					<span class="text">Home</span>
				</a>
			</li>
            <li>
				<a style="text-decoration: none;" href="index.php?action=student_topic">
                    <i class='bx bxs-book' ></i>
					<span class="text">Topic</span>
				</a>
			</li>
			<li>
				<a style="text-decoration: none;" href="index.php?action=student_contribution">
                    <i class='bx bxs-book-content'></i>
					<span class="text">Contribution</span>
				</a>
			</li>
			<li>
				<a style="text-decoration: none;" href="index.php?action=student_faq">
                    <i class='bx bx-question-mark'></i>
					<span class="text">FAQ</span>
				</a>
			</li>
			<li>
				<a style="text-decoration: none;" href="index.php?action=student_mail">
                    <i class='bx bxs-envelope' ></i>
					<span class="text">Mail</span>
				</a>
			</li>
			<li>
				<a style="text-decoration: none;" href="index.php?action=student_faculty">
					<i class='bx bxs-group' ></i>
					<span class="text">Faculty</span>
				</a>
			</li>
			<li>
				<a style="text-decoration: none;" href="index.php?action=student_profile">
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