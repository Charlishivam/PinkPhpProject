<!-- Alert Wrapper. Contains page content -->
<div class="content-wrapper">
	<section class="content">
		<!-- For Messages -->
   		<?php $this->load->view('admin/includes/_messages.php') ?>
		<div class="card">
			<div class="card-header">
				<div class="d-inline-block">
					<h3 class="card-title"><i class="fa fa-list"></i>&nbsp; Slider List</h3>
				</div>
				<div class="d-inline-block float-right">
					<a href="<?= base_url('admin/slider/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Add New Slider</a>
				</div>
			</div>

			<div class="card-body">
				<table id="example1" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th width="50">SN</th>
							<th>Slider Image</th>
							<th>Slider Type</th>
							<th>Slider Position</th>
							<th>Slider Status</th>
							<th width="100">Action</th>
						</tr>

					</thead>
										<tbody>
						<?php foreach($records as $idx => $record): ?>
							<tr>
								<td><?= $idx + 1 ?></td>
								<td>
			                        <?php if(empty($record['slider_image'])){ ?>
			                        <img src="<?= base_url('uploads/images/avtar.png' ); ?>" width="100px" height="auto" />
			                        <?php  }else{  ?>
			                        <img src="<?= base_url('uploads/slider/'.$record['slider_image'] ); ?>" width="100px" height="auto" />
			                        <?php  }  ?>
			                     </td>
								<td>
			                        <?php if($record['slider_type'] == '1' ){ ?>
			                          <a href="#" class="badge badge-success" >
			                              Slider
			                           </a>     
			                        <?php } ?>

			                        <?php if($record['slider_type'] == '2' ){ ?>
			                          <a href="#" class="badge badge-info" >
			                              Banner
			                           </a>     
			                        <?php } ?>
			                    </td>
			                    <td><?= $record['slider_position']; ?></td>
								 <td><a href="<?php echo site_url("admin/slider/status/".$record['slider_id'] . "/" . $record['status']);?>" class="badge <?php if($record['status'] == '1'){ echo "badge-success";}else{ echo "badge-info";} ?>"><?php if($record['status'] == '1'){ echo "Active";}else{ echo "Inactive";} ?></a></td>
								<td>
									<a href="<?php echo site_url("admin/slider/edit/".$record['slider_id']); ?>" class="btn btn-warning btn-xs mr5" >
											<i class="fa fa-edit"></i>
										</a>
									<a href="<?php echo site_url("admin/slider/delete/".$record['slider_id']); ?>" onclick="return confirm('are you sure to delete?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
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


