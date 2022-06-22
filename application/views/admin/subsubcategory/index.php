<!-- Alert Wrapper. Contains page content -->
<div class="content-wrapper">
	<section class="content">
		<!-- For Messages -->
   		<?php $this->load->view('admin/includes/_messages.php') ?>
		<div class="card">
			<div class="card-header">
				<div class="d-inline-block">
					<h3 class="card-title"><i class="fa fa-list"></i>&nbsp; Teamplates List</h3>
				</div>
				<div class="d-inline-block float-right">
					<a href="<?= base_url('admin/subsubcategory/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Add New Teamplates</a>
				</div>
			</div>

			<div class="card-body">
				<table id="example1" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th width="50">SN</th>
							<th>Image</th>
							<th>Category</th>
							<th>Subcategory</th>
							<th>Tag Name</th>
							<th>Status</th>
							<th width="100">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($records as $idx => $record): ?>
							<tr>
								<td><?= $idx + 1 ?></td>
								<td>
			                        <?php if(empty($record['greeting_image'])){ ?>
			                        <img src="<?= base_url('uploads/images/avtar.png' ); ?>" width="100px" height="auto" />
			                        <?php  }else{  ?>
			                        <img src="<?= base_url('uploads/greeting/'.$record['greeting_image'] ); ?>" width="100px" height="auto" />
			                        <?php  }  ?>
			                     </td>
			                     <td><?= $record['cat_name']; ?></td>
			                     <?php $cat_name  = $this->Subcategory_model->get_all_cat_name($record['greeting_sub_cat_id']); ?>
			                      <td><?= $cat_name['cat_name']; ?></td>
			                     <td>
			                         
			                          <?php $tag_id = json_decode($record['greeting_tag_id']); 
			                          
			                          if(!empty($tag_id)):
			                          
			                          ?>
			                          
			                          <?php foreach($tag_id as $tag_key => $tag_value): ?>
    			                          <?php $tag_name  = $this->Subcategory_model->get_tags_name($tag_value); ?>
    			                     
            			                     <div class="d-flex align-items-center justify-content-between mb-2">
                                               <span class="badge bg-success"><?= $tag_name; ?></span>
                                            </div>
			                           <?php endforeach; ?>
			                           
			                          <?php 
			                             endif;
			                          ?>
			                       
			                     </td>
			                     
			                     
			                    
			                   
								 <td><a href="<?php echo site_url("admin/subsubcategory/subsubcategory_status/".$record['greeting_id'] . "/" . $record['greeting_status']);?>" class="badge <?php if($record['greeting_status'] == '1'){ echo "badge-success";}else{ echo "badge-info";} ?>"><?php if($record['greeting_status'] == '1'){ echo "Active";}else{ echo "Inactive";} ?></a></td>
								<td>
									<a href="<?php echo site_url("admin/subsubcategory/edit/".$record['greeting_id']); ?>" class="btn btn-warning btn-xs mr5">
											<i class="fa fa-edit"></i>
									</a>
									<a href="<?php echo site_url("admin/subsubcategory/delete/".$record['greeting_id']); ?>" onclick="return confirm('are you sure to delete?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
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


