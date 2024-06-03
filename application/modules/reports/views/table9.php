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
        <th># of Open Claims</th>
        <th>Open Claims Total Incurred</th>
        <th>Collect from Insurer? </th>
        <th>Estimated PC to Client </th>
        <th>AGS Comission in amount </th>
        <th>AGS Comission in %</th>
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
            <td><?php $res=Modules::run('api/_get_specific_table_with_pagination',array("period_id"=>$value['period_id']),'id desc',"premiums","SUM(paid) as ttl, SUM(recieved) as ttl_recieved",'','')->row_array(); echo  number_format(round($res['ttl']), 0, ',', ''); ?>
             <!--echo "<br>".$value['period_id']."<br> ags receive = ".ceil($res['ttl_recieved'])."<br> claim fee = ".ceil($value['sum_claim_fee'])."<br> 10% = ".ceil($res['ttl']/100*10)."<br> reserve = ".ceil($value['reserve']); -->
            </td>
            
            <td><?php echo number_format(round($value['paid']), 0, ',', ''); ?></td>
            <td><?php echo number_format(round($value['reserve']), 0, ',', ''); ?></td>
            <td><?php $ttl=$value['reserve']+$value['paid']; echo number_format(round($ttl), 0, ',', ''); ?></td>
            <td><?php if($ttl>0 && $res['ttl']>0 ) { $lr=round((round($ttl)/round($res['ttl']))*100);  echo $lr.'%'; }?></td>
            <td><?php echo $value['profit_comission']; ?></td>
            <td><?php echo $value['open_claims']; ?></td>
            <td><?php $open_ttl=$value['open_reserve']+$value['open_paid']; echo number_format(round($open_ttl), 0, ',', ''); ?></td>
            <td><?php if($lr>=50) echo "NO"; else echo "YES"; ?></td>
            <?php
            
            $total_sumout=ceil($res['ttl_recieved'])+ceil($value['sum_claim_fee'])+ceil($res['ttl']/100*10)+ceil($value['paid'])+ceil($value['reserve']);
            $PC_basis=round($res['ttl'])-round($total_sumout);
            $pc_per_client=0;
            if($PC_basis>0){
                if($lr<50){
                    $pc_per_client=round($PC_basis/100*5);
                }
            }
            ?>
            <td><?php if($lr>=50){ echo  "0"; }else { echo number_format($pc_per_client, 0, ',', '');}     ?></td>
            <td><?php $pre=Modules::run('api/_get_specific_table_with_pagination',array("period_id"=>$value['period_id']),'id desc',"premiums","SUM(paid) as ttl, SUM(recieved) as ttl_recieved",'','')->row_array(); echo  number_format(round($pre['ttl_recieved']), 0, ',', ''); ?></td>
            <td><?php    if($pre['ttl']>0){ echo number_format(round($pre['ttl_recieved']/$pre['ttl']*100), 0, ',', '').'%';}else{ echo "0%";} ?></td>
        <?php endforeach; ?>
        </tr>
    </tbody>
</table>