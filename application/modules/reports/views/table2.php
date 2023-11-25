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
                                        <th>Date</th>
                                        <th>Number of Claims</th>
                                        <th>New Claims </th>
                                        <th>Paid</th>
                                        <th>New Payments</th>
                                        <th>Reserved</th>
                                        <th>New Reservations</th>
                                        <th>Paid Projection </th>
                                        <th>Change Projection</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $tot_paid=$tot_reserve=0.00;
                                foreach($result as $key => $value): ?>    
                                <tr class="odd gradeX " >
                                    <td><?php echo $value['date']; ?></td>
                                    <td><?php if($key==0){ echo $value['claims']; } else { echo $tot_claim=abs($value['claims']+$tot_claim);} ?></td>
                                    <td><?php if(empty($value['claims'])) echo "0"; else   echo $value['claims']; ?></td>
                                    <td><?php if($key==0){ if(empty($value['paid']) || $value['paid']==0) echo "0.00"; else echo $value['paid']; } else {  $tot_paid=abs($value['paid']+$tot_paid);  if($tot_paid>0) echo $tot_paid; else echo "0.00"; } ?></td>
                                    <td><?php if(empty($value['paid']) || $value['paid']==0) echo "0.00"; else echo $value['paid']; ?></td>
                                    <td><?php if($key==0){ if(empty($value['reserve']) || $value['reserve']==0) echo "0.00"; else echo $value['reserve']; } else {  $tot_reserve=abs($value['reserve']+$tot_reserve); if($tot_reserve>0) echo $tot_reserve; else echo "0.00"; } ?></td>
                                    <td><?php if(empty($value['reserve']) || $value['reserve']==0) echo "0.00"; else echo $value['reserve']; ?></td>
                                    <td><?php if(($tot_paid+$tot_reserve)>0) echo $tot_paid+$tot_reserve; else echo "0.00"; ?></td>
                                    <td><?php  if(($value['paid']+$value['reserve'])>0) echo abs($value['paid']+$value['reserve']); else  echo "0.00"; ?></td>
                                </tr>
                            <?php endforeach; ?>
                    </tbody>
            </table>