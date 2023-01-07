<?php require_once('header.php'); ?>
<section class="content">
	<!-- Categories -->
	<div class="orders">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<strong class="card-title" v-if="headerText">Products</strong>
						<div class="content-header-right float-right">
							<a href="product-add.php" class="btn btn-warning btn-sm">Add New</a>
						</div>
					</div>
					<div class="card-body--">
						<div class="table-stats order-table ov-h">
							<table class="table ">
								<thead>
									<tr>
										<th>ID</th>
										<th>Photo</th>
										<th>Product Name</th>
										<th>Price</th>
										<th>Quantity</th>
										<th>Category</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i = 0;
									$statement = $pdo->prepare("SELECT
														
														t1.p_id,
														t1.p_name,
														t1.p_current_price,
														t1.p_qty,
														t1.p_featured_photo,
														t1.ecat_id,
														t2.ecat_id,
														t2.ecat_name
							                           	FROM tbl_product t1
														JOIN tbl_end_category t2
														ON t1.ecat_id = t2.ecat_id
														ORDER BY t1.p_id DESC");
									$statement->execute();
									$result = $statement->fetchAll(PDO::FETCH_ASSOC);
									foreach ($result as $row) {
										$i++;
									?>
										<tr>
											<td><?php echo $i; ?></td>
											<td style="width:100px;"><img src="../assets/uploads/<?php echo $row['p_featured_photo']; ?>" alt="<?php echo $row['p_name']; ?>" style="width:80px;"></td>
											<td><?php echo $row['p_name']; ?></td>
											<td><?php echo $row['p_current_price']; ?> <span style="font-size:10px;font-weight:normal;">TND</span></td>
											<td><?php echo $row['p_qty']; ?></td>

											<td><?php echo $row['ecat_name']; ?></td>
											<td>
										<a href="product-edit.php?id=<?php echo $row['p_id']; ?>" class="btn btn-primary btn-sm">Edit</a>
										<a href="product-delete.php?id=<?php echo $row['p_id']; ?>" class="btn btn-danger btn-sm">Delete</a>

									</td>
										</tr>
									<?php
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
</section>



<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel">Delete Confirmation</h5>
                            
                        </div>
                        <div class="modal-body">
                            <p>
							Are you sure to delete this category?
						</p>
						<p style="color:red;">Be careful ! All products under this category will be deleted.</p>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-danger">Confirm</button>
                        </div>
                    </div>
                </div>
            </div>

	<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="assets/js/main.js"></script>
