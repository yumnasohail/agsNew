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
        <th>Claims Paid </th>
        <th>Reserve</th>
        <th>Total Incurred</th>
        <th>LR</th>
        <th>%PC in Slip</th>
        <th>Collect from Insurer? </th>
        <th>Estimated PC to Client </th>
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
            <td><?php $res=Modules::run('api/_get_specific_table_with_pagination',array("period_id"=>$value['period_id']),'id desc',"premiums","SUM(paid) as ttl",'','')->row_array(); echo number_format(round($res['ttl']), 0, ',', ''); ?></td>
            <td><?php echo number_format(round($value['paid']), 0, ',', ''); ?></td>
            <td><?php echo number_format(round($value['reserve']), 0, ',', ''); ?></td>
            <td><?php $ttl=$value['reserve']+$value['paid']; echo number_format(round($ttl), 0, ',', ''); ?></td>
            <td><?php if($ttl>0 && $res['ttl']>0 ) { $lr=round((round($ttl)/round($res['ttl']))*100);  echo $lr.'%'; }?></td>
            <td><?php echo $value['profit_comission']; ?></td>
            <td><?php if($lr>=50) echo "NO"; else echo "YES"; ?></td>
            <td><?php if($lr>=50){ echo  "0"; }else { echo number_format(round(round($res['ttl'])*(floatval(str_replace("%",'',$value['profit_comission']))/100)), 0, ',', '');  }?></td>
        <?php endforeach; ?>
        </tr>
    </tbody>
</table>