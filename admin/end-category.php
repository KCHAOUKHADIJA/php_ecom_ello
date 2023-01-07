<?php require_once('header.php'); ?>
<section class="content">
	<!-- Categories -->
	<div class="orders">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<strong class="card-title" v-if="headerText">Categories</strong>
						<div class="content-header-right float-right">
							<a href="end-category-add.php" class="btn btn-warning btn-sm">Add New</a>
						</div>
					</div>
					<div class="card-body--">
						<div class="table-stats order-table ov-h">
							<table class="table ">
								<thead>
									<tr>
										<th>ID</th>
										<th>Category Name</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i = 0;
									$statement = $pdo->prepare("SELECT * 
                                    FROM tbl_end_category t1
                                    ORDER BY t1.ecat_id DESC
                                    ");
									$statement->execute();
									$result = $statement->fetchAll(PDO::FETCH_ASSOC);
									foreach ($result as $row) {
										$i++;
									?>
										<tr>
											<td><?php echo $i; ?></td>
											<td><?php echo $row['ecat_name']; ?></td>
											<td>
												<a href="end-category-edit.php?id=<?php echo $row['ecat_id']; ?>" class="btn btn-primary btn-sm">Edit</a>
												<a href="end-category-delete.php?id=<?php echo $row['ecat_id']; ?>" class="btn btn-danger btn-sm">Delete</a>

											</td>
										</tr>
									<?php
									}
									?>

								</tbody>
							</table>
						</div> <!-- /.table-stats -->
					</div>
				</div> <!-- /.card -->
			</div> <!-- /.col-lg-8 -->


		</div>
	</div>
	<!-- /.orders -->



</section>


