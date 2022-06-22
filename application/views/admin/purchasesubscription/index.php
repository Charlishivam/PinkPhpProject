<!-- Alert Wrapper. Contains page content -->
<div class="content-wrapper">
	<section class="content">
		<!-- For Messages -->
   		<?php $this->load->view('admin/includes/_messages.php') ?>
		<div class="card">
			<div class="card-header">
				<div class="d-inline-block">
					<h3 class="card-title"><i class="fa fa-list"></i>&nbsp; Subcriprion Purcahse List</h3>
				</div>
				
			</div>

			<div class="card-body">
				<table id="example1" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th width="50">SN</th>
                             <th>Transection Id</th>
                             <th>Plan Name</th>
                             <th>User Name</th>
                             <th>Amount</th>
                             <th>Membership From</th>
                             <th>Membership To</th>
						</tr>

					</thead>
					<tbody>
						<?php foreach($records as $idx => $record): ?>
							<tr>
								<td><?= $idx + 1 ?></td>
			                    <td><?= $record['tpm_transection_id']; ?></td>
			                    <td><?= $record['ci_sp_title']; ?></td>
			                    <td><?= $record['customer_name']; ?></td>
			                    <td><?= $record['tpm_amount']; ?></td>
			                    <td><?= date('d-m-Y',$record['tpm_timestamp_from']); ?> </td>
			                    <td><?= date('d-m-Y',$record['tpm_timestamp_to']); ?> </td>
							</tr>
						<?php endforeach; ?>
					</tbody>
					
				
				</table>
			</div>
		</div>
	</section>
	<!-- /.Alert -->
</div>


