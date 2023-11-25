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
        <th>UMR</th>
        <th>Year of Account</th>
        <th>Risk Reference </th>
        <th>Risk Interception Date</th>
        <th>Risk expiry date</th>
        <th>Insured Name</th>
        <th>Original Currency</th>
        <th>AGS commission</th>
        <th>Net Premium Aegis</th>
        <th>Total paid premium</th>
        <?php foreach($month as $key => $value): ?>
            <th><?php echo $value; ?></th>
        <?php endforeach; ?>
    </tr>
    </thead>
    <tbody>
        <?php foreach($result as $key => $value): ?>
        <tr class="odd gradeX " >
            <td><?php echo $value['contract_id'] ?></td> 
            <td><?php echo date("Y", strtotime($value['start_date'])); ?></td> 
            <td><?php echo $value['ags_policy_no'] ?></td> 
            <td><?php echo date("m/d/Y", strtotime($value['start_date'])); ?></td> 
            <td><?php echo date("m/d/Y", strtotime($value['end_date'])); ?></td> 
            <td><?php echo $value['policy_title']; ?></td> 
            <td><?php echo $value['currency'];?></td> 
            <td><?php echo $value['ags_comission'];?></td> 
            <td><?php echo $value['total_insurance'];?></td> 
            <td><?php echo $value['paid'];?></td> 
                <?php foreach($value['amount'] as $keys => $values): ?>
                    <td><?php echo $values; ?></td>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </tr>
    </tbody>
</table>