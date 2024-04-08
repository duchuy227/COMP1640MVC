		<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
				</div>
			</div>

			<ul class="box-info">
				<li>
                    <i class='bx bxs-book-bookmark'></i>
					<span class="text">
						<h3>10</h3>
						<p>Topics</p>
					</span>
				</li>
				<li>
                    <i class='bx bxs-book-content'></i>
					<span class="text">
						<h3>50</h3>
						<p>Contribution</p>
					</span>
				</li>
				<li>
                    <i class='bx bxs-group' ></i>
					<span class="text">
						<h3>20</h3>
						<p>Total Student</p>
					</span>
				</li>
			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Recent Contribution</h3>
					</div>
					<table>
						<thead>
							<tr>
								<th>Contribution</th>
								<th>Student's Name</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach($contribution as $contribution): ?>
							<tr>
								<td>
									<p><?php echo $contribution['Con_Name'] ?></p>
								</td>
								<td><?php echo $contribution['Stu_FullName'] ?></td>
								<td><span><?php echo $contribution['Con_Status'] ?></span></td>
							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<div class="todo">
					<div class="head">
						<h3>My Student</h3>
					</div>
					<ul class="todo-list">
					
						<?php foreach ($students as $student): ?>
						<li class="completed">
							<p><?php echo $student['Stu_FullName']; ?></p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<?php endforeach; ?>
					
					</ul>
				</div>
			</div>