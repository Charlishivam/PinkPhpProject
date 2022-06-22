<!-- Alert Wrapper. Contains page content -->
<div class="content-wrapper">
	<section class="content">
		<!-- For Messages -->
   		<?php $this->load->view('admin/includes/_messages.php') ?>
		<div class="card">
			<div class="card-header">
				<div class="d-inline-block">
					<h3 class="card-title"><i class="fa fa-list"></i>&nbsp; Contactus List</h3>
				</div>
			</div>
			<div class="card-body">
				<table id="example1" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th width="50">SN</th>
							<th>Name</th>
							<th>Mobile Number</th>
							<th>Email</th>
							<th>Short Message</th>
							<th>Long Message</th>
						</tr>

					</thead>
					<tbody>
                  <?php foreach($records as $idx => $record): ?>
                  <tr>
                     <td><?= $idx + 1 ?></td>
                     <td><?= $record['contact_us_name']; ?></td>
                     <td><?= $record['contact_us_phone']; ?></td>
                     <td><?= $record['contact_us_email']; ?></td>
                     <td><?= $record['contact_us_subject']; ?></td>
                     <td><?= $record['contact_us_message']; ?></td>
                  </tr>
                  <?php endforeach; ?>
               </tbody>
				</table>
			</div>
		</div>
	</section>
	<!-- /.Alert -->
</div>