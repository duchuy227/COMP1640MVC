    <section id="sidebar">
		<a style="text-decoration: none;" href="#" class="brand"><i class='bx bxs-smile icon'></i><?php echo $ManagerProfile['Ma_Username']; ?></a>
		<ul class="side-menu">
			<li><a style="text-decoration: none;" href="index.php?action=manager_index" class="active"><i class='bx bxs-dashboard icon' ></i> Dashboard</a></li>
			<li class="divider" data-text="main">Main</li>
			<li>
				<a style="text-decoration: none;" href="#"><i class='bx bxs-inbox icon' ></i> Faculty <i class='bx bx-chevron-right icon-right' ></i></a>
				
				<ul class="side-dropdown">
					<li><a style="text-decoration: none;" href="index.php?action=manager_view_faculty&fa=1">IT</a></li>
					<li><a style="text-decoration: none;" href="index.php?action=manager_view_faculty&fa=2">Business</a></li>
					<li><a style="text-decoration: none;" href="index.php?action=manager_view_faculty&fa=3">Design</a></li>
					<li><a style="text-decoration: none;" href="index.php?action=manager_view_faculty&fa=4">Marketing</a></li>
				</ul>

				
			</li>
			<li><a style="text-decoration: none;" href="index.php?action=manager_statistics"><i class='bx bxs-chart icon' ></i> Statistics</a></li>
			<li><a style="text-decoration: none;" href="index.php?action=manager_topic"><i class="bi bi-book-fill icon"></i> Topic</a></li>
			<li class="divider" data-text="Manage"></li>
			<li>
				<a style="text-decoration: none;" href="#"><i class='bx bxs-notepad icon' ></i> Contribution <i class='bx bx-chevron-right icon-right' ></i></a>
				<ul class="side-dropdown">
					<li><a style="text-decoration: none;" href="index.php?action=manager_view_contribution&id=1">List Contribution</a></li>
					<li><a style="text-decoration: none;" href="index.php?action=manager_view_contribution&id=2">Select Contribution</a></li>
				</ul>
			</li>
			<li><a style="text-decoration: none;" href="index.php?action=manager_profile"><i class='bx bxs-user-circle icon' ></i> Profile</a></li>
			<li><a style="text-decoration: none;" href="#"><i class='bx bxs-cog icon' ></i> Settings</a></li>
			<li><a style="text-decoration: none;" href="./index.php?action=logout"><i class='bx bxs-log-out-circle icon' ></i> Logout</a></li>
            
		</ul>
		<!-- <div class="ads">
			<div class="wrapper">
				<a href="#" class="btn-upgrade">Upgrade</a>
				<p>Become a <span>PRO</span> member and enjoy <span>All Features</span></p>
			</div>
		</div> -->
	</section>


