<!-- Alert Wrapper. Contains page content -->
<div class="content-wrapper">
	<section class="content">
		<!-- For Messages -->
   		<?php $this->load->view('admin/includes/_messages.php') ?>
		<div class="card">
			<div class="card-header">
				<div class="d-inline-block">
					<h3 class="card-title"><i class="fa fa-list"></i>&nbsp; category List</h3>
				</div>
				<div class="d-inline-block float-right">
					<a href="<?= base_url('admin/category/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Add New Category</a>
				</div>
			</div>

			<div class="card-body">
				<table id="example1" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th width="50">SN</th>
						
							<th>Category Name</th>
							<th>Category Status</th>
							<th width="100">Action</th>
						</tr>

					</thead>
					<tbody>
						<?php foreach($records as $idx => $record): ?>
							<tr>
								<td><?= $idx + 1 ?></td>
							
			                    <td><?= $record['cat_name']; ?></td>
								 <td><a href="<?php echo site_url("admin/category/category_status/".$record['cat_id'] . "/" . $record['cat_status']);?>" class="badge <?php if($record['cat_status'] == '1'){ echo "badge-success";}else{ echo "badge-info";} ?>"><?php if($record['cat_status'] == '1'){ echo "Active";}else{ echo "Inactive";} ?></a></td>
								<td>
									<a href="<?php echo site_url("admin/category/edit/".$record['cat_id']); ?>" class="btn btn-warning btn-xs mr5" >
											<i class="fa fa-edit"></i>
										</a>
									<a href="<?php echo site_url("admin/category/delete/".$record['cat_id']); ?>" onclick="return confirm('are you sure to delete ? category, subcategory and teamplate data')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				
				</table>
			</div>
		</div>
	</section>
	<!-- /.Alert -->
</div>


