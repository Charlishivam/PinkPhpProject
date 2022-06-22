<!-- Alert Wrapper. Contains page content -->
<div class="content-wrapper">
	<section class="content">
		<!-- For Messages -->
   		<?php $this->load->view('admin/includes/_messages.php') ?>
		<div class="card">
			<div class="card-header">
				<div class="d-inline-block">
					<h3 class="card-title"><i class="fa fa-list"></i>&nbsp; Subcriprion Package List</h3>
				</div>
				
			</div>

			<div class="card-body">
				<table id="example1" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th width="50">SN</th>
							<th>Image</th>
							<th>Title</th>
							<th>Amount</th>
							<th>Type</th>
							<th>Status</th>
							<th width="100">Action</th>
						</tr>

					</thead>
					<tbody>
						<?php foreach($records as $idx => $record): ?>
							<tr>
								<td><?= $idx + 1 ?></td>
								<td>
			                        <?php if(empty($record['ci_sp_image'])){ ?>
			                        <img src="<?= base_url('uploads/images/avtar.png' ); ?>" width="100px" height="auto" />
			                        <?php  }else{  ?>
			                        <img src="<?= base_url($record['ci_sp_image'] ); ?>" width="100px" height="auto" />
			                        <?php  }  ?>
			                     </td>
			                    <td><?= $record['ci_sp_title']; ?></td>
			                    <td><?= $record['ci_sp_amount']; ?></td>
			                    <td><?php if($record['ci_sp_type'] == 1) { ?>
                                    <span class="badge badge-pill badge-success mb-1">Month</span> 
                                    <?php } ?>
                                    <?php if($record['ci_sp_type'] == 2) { ?>
                                    <span class="badge badge-pill badge-danger mb-1">Year</span>
                                    <?php } ?>
                                 </td>
			                   
								<td><a href="<?php echo site_url("admin/subscription/subcription_package_status/".$record['ci_sp_id'] . "/" . $record['ci_sp_status']);?>" class="badge <?php if($record['ci_sp_status'] == '1'){ echo "badge-success";}else{ echo "badge-info";} ?>"><?php if($record['ci_sp_status'] == '1'){ echo "Active";}else{ echo "Inactive";} ?></a></td>
								<td>
									<a style="margin-top: 5px;" href="<?php echo site_url("admin/subscription/edit/".$record['ci_sp_id']); ?>" class="btn btn-warning btn-xs mr5" >
										<i class="fa fa-edit"></i>
									</a>
									<a style="margin-top: 5px;" href="<?php echo site_url("admin/subscription/delete/".$record['ci_sp_id']); ?>" onclick="return confirm('are you sure to delete?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
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


