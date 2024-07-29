<style>
    .btn-export{
        margin-bottom: 2%;
        margin-top: 6%;
    }
</style>
<button class="btn btn-outline-primary btn-export" onclick="export_to_CSV('Assignment Report')">Export to CSV </button>
<table class="table table-bordered border-theme1" id="tblReportData" >
                                <thead class="bg-th background-theme1">
                                    <tr class="bg-col">
                                        <?php if((isset($columns['Date']) && isset($columns['selective_col'])) || $columns['selective_col']=="off" ){?>
                                        <th>Date</th>
                                        <?php } if((isset($columns['Number_of_Claims']) && isset($columns['selective_col'])) || $columns['selective_col']=="off" ){?>
                                        <th>Number of Claims</th>
                                        <?php }if((isset($columns['New_Claims']) && isset($columns['selective_col'])) || $columns['selective_col']=="off" ){?>
                                        <th>New Claims </th>
                                        <?php }if((isset($columns['Paid']) && isset($columns['selective_col'])) || $columns['selective_col']=="off" ){?>
                                        <th>Paid</th>
                                        <?php }if((isset($columns['New_Payments']) && isset($columns['selective_col'])) || $columns['selective_col']=="off" ){?>
                                        <th>New Payments</th>
                                        <?php }if((isset($columns['Reserved']) && isset($columns['selective_col'])) || $columns['selective_col']=="off" ){?>
                                        <th>Reserved</th>
                                        <?php }if((isset($columns['New_Reservations']) && isset($columns['selective_col'])) || $columns['selective_col']=="off" ){?>
                                        <th>New Reservations</th>
                                        <?php }if((isset($columns['Paid_Projection']) && isset($columns['selective_col'])) || $columns['selective_col']=="off" ){?>
                                        <th>Paid Projection </th> 
                                        <?php }if((isset($columns['Change_Projection']) && isset($columns['selective_col'])) || $columns['selective_col']=="off" ){?>
                                        <th>Change Projection</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $tot_paid=$tot_reserve=0.00;
                                foreach($result as $key => $value): ?>    
                                <tr class="odd gradeX " >
                                <?php if((isset($columns['Date']) && isset($columns['selective_col'])) || $columns['selective_col']=="off" ){?>
                                    <td><?php echo $value['date']; ?></td>
                                <?php } if((isset($columns['Number_of_Claims']) && isset($columns['selective_col'])) || $columns['selective_col']=="off" ){?>
                                    <td><?php if($key==0){ echo $value['claims']; } else { echo $tot_claim=abs($value['claims']+$tot_claim);} ?></td>
                                <?php }if((isset($columns['New_Claims']) && isset($columns['selective_col'])) || $columns['selective_col']=="off" ){?>
                                    <td><?php if(empty($value['claims'])) echo "0"; else   echo $value['claims']; ?></td>
                                <?php }if((isset($columns['Paid']) && isset($columns['selective_col'])) || $columns['selective_col']=="off" ){?> 
                                    <td><?php if($key==0){ if(empty($value['paid']) || $value['paid']==0) echo "0.00"; else echo $value['paid']; } else {  $tot_paid=abs($value['paid']+$tot_paid);  if($tot_paid>0) echo $tot_paid; else echo "0.00"; } ?></td>
                                <?php }if((isset($columns['New_Payments']) && isset($columns['selective_col'])) || $columns['selective_col']=="off" ){?> 
                                    <td><?php if(empty($value['paid']) || $value['paid']==0) echo "0.00"; else echo $value['paid']; ?></td>
                                <?php }if((isset($columns['Reserved']) && isset($columns['selective_col'])) || $columns['selective_col']=="off" ){?> 
                                    <td><?php if($key==0){ if(empty($value['reserve']) || $value['reserve']==0) echo "0.00"; else echo $value['reserve']; } else {  $tot_reserve=abs($value['reserve']+$tot_reserve); if($tot_reserve>0) echo $tot_reserve; else echo "0.00"; } ?></td>
                                <?php }if((isset($columns['New_Reservations']) && isset($columns['selective_col'])) || $columns['selective_col']=="off" ){?> 
                                    <td><?php if(empty($value['reserve']) || $value['reserve']==0) echo "0.00"; else echo $value['reserve']; ?></td>
                                <?php }if((isset($columns['Paid_Projection']) && isset($columns['selective_col'])) || $columns['selective_col']=="off" ){?> 
                                    <td><?php if(($tot_paid+$tot_reserve)>0) echo $tot_paid+$tot_reserve; else echo "0.00"; ?></td>
                                <?php }if((isset($columns['Change_Projection']) && isset($columns['selective_col'])) || $columns['selective_col']=="off" ){?>
                                    <td><?php  if(($value['paid']+$value['reserve'])>0) echo abs($value['paid']+$value['reserve']); else  echo "0.00"; ?></td>
                                <?php } ?>
                                </tr>
                            <?php endforeach; ?>
                    </tbody>
            </table>