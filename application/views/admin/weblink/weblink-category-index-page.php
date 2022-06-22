<div class="content-wrapper">
	<section class="content">
   		<?php $this->load->view('admin/includes/_messages.php') ?>
		<div class="card">
			<div class="card-header">
				<div class="d-inline-block">
					<h3 class="card-title"><i class="fa fa-list"></i> Weblink Category List</h3>
				</div>
				<div class="d-inline-block float-right">
					<a href="<?= base_url('admin/weblinkcategory/create'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Add New Category</a>
				</div>
			</div>
			<div class="card-body">
				<table class="table table-separate table-head-custom table-checkable" id="kt_datatable_2">
					<thead>
						<tr>
							<th width="50">SN</th>
							<th>Category Image</th>
							<th>Category Name</th>
							<th>Category Status</th>
							<th width="100">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($records as $idx => $record): ?>
						<?php $images = empty($record['cat_image']) ? base_url('uploads/images/avtar.png' ) :  base_url('uploads/category/'.$record['cat_image'] ); ?>
							<tr>
								<td><?= $idx + 1 ?></td>
								<td>
								    <div class="symbol symbol-60 symbol-2by3 flex-shrink-0">
                                        <div class="symbol-label" style="background-image: url('<?= $images ?>')"></div>
                                    </div>
			                     </td>
			                    <td><?= $record['cat_name']; ?></td>
								 <td><a href="<?php echo site_url("admin/weblinkcategory/status/".$record['cat_id'] . "/" . $record['cat_status']);?>" class="label font-weight-bold label-lg  label-inline <?php if($record['cat_status'] == '1'){ echo "label-light-success";}else{ echo "label-light-danger";} ?>"><?php if($record['cat_status'] == '1'){ echo "Active";}else{ echo "Inactive";} ?></a></td>
								<td>
								    <a href="<?= site_url('admin/weblinkcategory/update/'.$record['cat_id']) ?>" class="label font-weight-bold label-lg label-light-success label-inline"><i class="flaticon2-edit"></i></a>
						            <a href="<?= site_url('admin/weblinkcategory/remove/'.$record['cat_id']) ?>" class="label font-weight-bold label-lg label-light-danger label-inline" onclick="return confirm('Are you sure want to delete this category ?'); "><i class="flaticon2-trash"></i></a>
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
<script> var HOST_URL = '<?= base_url() ?>';</script>
<script src="<?= base_url() ?>assets/js/pages/crud/datatables/basic/basic.js?v=7.2.8"></script>
<script src="<?= base_url() ?>assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js?v=7.2.8"></script>


