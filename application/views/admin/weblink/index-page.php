<?php $this->load->view('admin/includes/_messages'); ?>
<div class="card card-custom">
	<div class="card-header">
		<div class="card-title">
			<span class="card-icon">
				<i class="flaticon2-supermarket text-primary"></i>
			</span>
			<h3 class="card-label">Weblink Record</h3>
		</div>
		<div class="card-toolbar">
			<!--begin::Dropdown-->
			<!-- <div class="dropdown dropdown-inline mr-2">
				<button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<span class="svg-icon svg-icon-md">
				</span>Export</button>
				<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
					<ul class="navi flex-column navi-hover py-2">
						<li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">Choose an option:</li>
						<li class="navi-item">
							<a href="#" class="navi-link">
								<span class="navi-icon">
									<i class="la la-print"></i>
								</span>
								<span class="navi-text">Print</span>
							</a>
						</li>
						<li class="navi-item">
							<a href="#" class="navi-link">
								<span class="navi-icon">
									<i class="la la-copy"></i>
								</span>
								<span class="navi-text">Copy</span>
							</a>
						</li>
						<li class="navi-item">
							<a href="#" class="navi-link">
								<span class="navi-icon">
									<i class="la la-file-excel-o"></i>
								</span>
								<span class="navi-text">Excel</span>
							</a>
						</li>
						<li class="navi-item">
							<a href="#" class="navi-link">
								<span class="navi-icon">
									<i class="la la-file-text-o"></i>
								</span>
								<span class="navi-text">CSV</span>
							</a>
						</li>
						<li class="navi-item">
							<a href="#" class="navi-link">
								<span class="navi-icon">
									<i class="la la-file-pdf-o"></i>
								</span>
								<span class="navi-text">PDF</span>
							</a>
						</li>
					</ul>
				</div>
			</div> -->
			<!--end::Dropdown-->
			<!--begin::Button-->
			<a href="<?= site_url('admin/weblink/create') ?>" class="btn btn-primary font-weight-bolder">
			<span class="svg-icon svg-icon-md">
				<i class="flaticon2-plus"></i>
			</span>New Record</a>
			<!--end::Button-->
		</div>
	</div>
	<div class="card-body">
		<!--begin: Search Form-->
		<!--begin::Search Form-->
		<!-- <div class="mb-12">
			<div class="row align-items-center">
				<div class="col-lg-12 col-xl-12">
					<div class="row align-items-center">
						<div class="col-md-2 my-2 my-md-0">
							<div class="input-icon">
								<input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query" />
								<span>
									<i class="flaticon2-search-1 text-muted"></i>
								</span>
							</div>
						</div>
						<div class="col-md-3 my-2 my-md-0">
							<div class="input-daterange input-group" id="kt_datepicker_5">
								<input type="text" class="form-control" name="start" />
								<div class="input-group-append">
									<span class="input-group-text">
										<i class="la la-ellipsis-h"></i>
									</span>
								</div>
								<input type="text" class="form-control" name="end" />
							</div>
						</div>
						<div class="col-md-3 my-2 my-md-0">
							<div class="d-flex align-items-center">
								<label class="mr-3 mb-0 d-none d-md-block">Status:</label>
								<select class="form-control" id="kt_datatable_search_status">
									<option value="">All</option>
									<option value="1">Pending</option>
									<option value="2">Delivered</option>
									<option value="3">Canceled</option>
									<option value="4">Success</option>
									<option value="5">Info</option>
									<option value="6">Danger</option>
								</select>
							</div>
						</div>
						<div class="col-md-3 my-2 my-md-0">
							<div class="d-flex align-items-center">
								<label class="mr-3 mb-0 d-none d-md-block">Type:</label>
								<select class="form-control" id="kt_datatable_search_type">
									<option value="">All</option>
									<option value="1">Online</option>
									<option value="2">Retail</option>
									<option value="3">Direct</option>
								</select>
							</div>
						</div>
						<div class="col-md-1 my-2 my-md-0">
							<a href="#" class="btn btn-light-primary px-6 font-weight-bold">Search</a>
						</div>
					</div>
				</div>
			</div>
		</div> -->
		<!--end::Search Form-->
		<!--end: Search Form-->
		<!--begin: Datatable-->
		<table class="table table-separate table-head-custom table-checkable" id="kt_datatable_2">
			<thead>
				<tr>
					<th>Record ID</th>
					<th>Weblink ID</th>
					<th>Weblink Title</th>
					<th>Weblink User</th>
					<th>Weblink Category</th>
					<th>Weblink Template</th>
					<th>Weblink Create</th>
					<th>Weblink Update</th>
					<th>Weblink Status</th>
					<th>Weblink Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($records->result() as $key => $data){ ?>
				<?php 
					if($data->weblink_status == 1){
						$status = '<span style="width: 137px;"><span class="label font-weight-bold label-lg label-light-info label-inline">Lerning</span></span>';
					}else if($data->weblink_status == 2){
						$status = '<span style="width: 137px;"><span class="label font-weight-bold label-lg label-light-success label-inline">Publish</span></span>';
					}else if($data->weblink_status == 3){
						$status = '<span style="width: 137px;"><span class="label font-weight-bold label-lg label-light-danger label-inline">Rejected</span></span>';
					}else{
						$status = '<span style="width: 137px;"><span class="label font-weight-bold label-lg label-light-dark label-inline">Review</span></span>';
					}
				?>
				<tr>
					<td><?= $key + 1 ?></td>
					<td><?= $data->weblink_uniq_no ?></td>
					<td><?= $data->weblink_title ?></td>
					<td><?= $data->customer_name ?></td>
					<td><?= $data->cat_name ?></td>
					<td><?= $data->weblink_template_id ?></td>
					<td><?= $data->weblink_create_at ?></td>
					<td><?= $data->weblink_update_at ?></td>
					<td><?= $status ?></td>
					<td>
						<div class="dropdown dropdown-inline">
						   <a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-dark" data-toggle="dropdown" aria-expanded="false">
						   	<i class="la la-cog"></i>
						   </a>			
						   <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right" style="display: none;">
						      <ul class="nav nav-hoverable flex-column">
						         <li class="nav-item"><a class="nav-link" href="<?= site_url('admin/weblink/status/'.$data->weblink_id) ?>/0"><span class="nav-text">Lerning</span></a></li>
						         <li class="nav-item"><a class="nav-link" href="<?= site_url('admin/weblink/status/'.$data->weblink_id) ?>/1"><span class="nav-text">Review</span></a></li>
						         <li class="nav-item"><a class="nav-link" href="<?= site_url('admin/weblink/status/'.$data->weblink_id) ?>/2"><span class="nav-text">Publish</span></a></li>
						         <li class="nav-item"><a class="nav-link" href="<?= site_url('admin/weblink/status/'.$data->weblink_id) ?>/3"><span class="nav-text">Rejected</span></a></li>
						      </ul>
						   </div>
						</div>
						<a href="<?= site_url('/weblink/view/'.base64_encode($data->weblink_uniq_no)) ?>" target="_btank" class="btn btn-sm btn-clean btn-icon btn-success"><i class="flaticon-eye"></i></a>
						<a href="<?= site_url('admin/weblink/update/'.$data->weblink_id) ?>" class="btn btn-sm btn-clean btn-icon btn-primary"><i class="flaticon2-edit"></i></a>
						<!-- <a href="<?= site_url('admin/weblink/remove/'.$data->weblink_id) ?>" class="label font-weight-bold label-lg label-light-danger label-inline" onclick="return confirm('Are you sure want to delete this weblink ?'); "><i class="flaticon2-trash"></i></a> -->
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<!--end: Datatable-->
	</div>
	<!--end::Card-->
</div>
<script> var HOST_URL = '<?= base_url() ?>';</script>
<script src="<?= base_url() ?>assets/js/pages/crud/datatables/basic/basic.js?v=7.2.8"></script>
<script src="<?= base_url() ?>assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js?v=7.2.8"></script>
