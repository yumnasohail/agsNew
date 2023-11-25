  <thead>
                                <tr>
                                    <th>
        								S.No
        							</th>
        							<th>
        								User Name
        							</th>
        							<th>
        								Full Name
        							</th>
        							<th>
        								Email
        							</th>
        							<th>
        								Phone
        							</th>
        							<th>
        								Status
        							</th>
        							<th>
        								Actions
        							</th>
                                </tr>
                            </thead>
                            	<tbody>
        			<?php
                	$i = 0;
                	if (isset($users_rec)) {
                    	foreach ($users_rec as $row):
                        	$i++;
                        	$edit_url = ADMIN_BASE_URL . 'users/create/' . $row['id'];
                       
                    ?>
        			<tr>
        				<td>
        					<?php echo $i;?>
        				</td>
        				<td>
        					<?php echo $row['user_name'];?>
        				</td>
        				<td>
        					<?php echo $row['first_name']." ".$row['last_name'];?>
        				</td>
        				<td>
        					<?php echo $row['email'];?>
        				</td>
        				<td>
        					<?php echo $row['phone'];?>
        				</td>
        				<td>
        					<?php 
        						$status_class = "danger";
        						if(isset($row['status']) && !empty($row['status']))
        							if($row['status'] == 1)
        								$status_class = "info";
        
        					?>
        					<span class="m-badge  m-badge--<?=$status_class?> m-badge--wide">
        						<?php
        							echo ($status_class != 'danger' ? 'Active' : 'Unactive');
        						?>
        					</span>
        				</td>
        				<td >
    						<a  class="action_publish"  rel=<?=$row['id']?> status=<?=$row['status']?>><i class="simple-icon-arrow-<?php echo ($status_class != 'danger' ? 'up' : 'down');?>-circle"></i> </a>
    						<a  class="view_details"  rel="<?=$row['id']?>"><i class="iconsminds-file-clipboard-file---text"></i> </a>
    						<a  class="change_password"  rel="<?=$row['id']?>"><i class="simple-icon-eye"></i> </a>
    						<a  href="<?=$edit_url?>"><i class="iconsminds-file-edit"></i> </a>
    						<a  class="delete_record" rel=<?=$row['id']?>><i class="iconsminds-delete-file"></i> </a>
    						
        				</td>
        			</tr>
        				<?php endforeach;
        			} ?>
        		</tbody>