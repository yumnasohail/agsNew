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
        <th>Insurer</th>
        <th>Account</th>
        <th>UMR </th>
        <th>Insurance Period From</th> 
        <th>Insurance Period To</th>
        <th>CCY</th>
        <th>AGS Gross Premium</th>
        <th>RIB to client </th>
    </tr>
    </thead>
    <tbody>
        <?php foreach($result as $key => $value): ?>
        <tr class="odd gradeX " >
            <td><?php echo $value['name']; ?></td>
            <td><?php echo $value['fed_name']; ?></td>
            <td><?php echo $value['contract_id']; ?></td>
            <td><?php echo date('Y-m-d',strtotime($value['start_date'])); ?></td>
            <td><?php echo date('Y-m-d',strtotime($value['end_date'])); ?></td>
            <td><?php echo $value['currency']; ?></td>
            <td><?php $res=Modules::run('api/_get_specific_table_with_pagination',array("period_id"=>$value['period_id']),'id desc',"premiums","SUM(paid) as ttl",'','')->row_array(); echo round($res['ttl']); ?></td>
            <td><?php echo round(round($res['ttl'])*(str_replace("%",'',$value['rib'])/100)); ?></td>
        <?php endforeach; ?>
        </tr>
    </tbody>
</table>