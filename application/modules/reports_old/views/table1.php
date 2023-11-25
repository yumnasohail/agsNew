<style>
    .btn-export{
        margin-bottom: 2%;
        margin-top: 6%;
    }
</style>
<button class="btn btn-outline-primary btn-export" onclick="export_to_CSV('Assignment Report')">Export to CSV </button>
<table class="data-table data-table-feature table table-bordered border-theme1" id="tblReportData" >
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
                                <?php foreach($result as $key => $value): ?>    
                                <tr class="odd gradeX " >
                                    <td><?php echo $value['date']; ?></td>
                                    <td><?php if($key==0){ echo $value['claims']; } else { echo $tot_claim=$value['claims']+$tot_claim;} ?></td>
                                    <td><?php echo $value['claims']; ?></td>
                                    <td><?php if($key==0){ echo $value['paid']; } else { echo $tot_paid=$value['paid']+$tot_paid;} ?></td>
                                    <td><?php echo $value['paid']; ?></td>
                                    <td><?php if($key==0){ echo $value['reserve']; } else { echo $tot_reserve=$value['reserve']+$tot_reserve;} ?></td>
                                    <td><?php echo $value['reserve']; ?></td>
                                    <td><?php echo $value['paid']+$value['reserve']; ?></td>
                                    <td><?php  if($key==0) echo $value['paid']+$value['reserve']; else  echo ($value['paid']+$value['reserve'])-($result[$key-1]['paid']+$result[$key-1]['reserve']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                    </tbody>
            </table>