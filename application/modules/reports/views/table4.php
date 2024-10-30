<style>
    .btn-export{
        margin-bottom: 2%;
        margin-top: 6%;
    }
</style>
<button class="btn btn-outline-primary btn-export" onclick="exportSheet('Assignment Report')">Export to CSV </button>
<table class=" table table-bordered border-theme1 table-responsive" id="tblReportData" >
                                <thead class="bg-th background-theme1">
                                    <tr class="bg-col">
                                        <th>Insurer</th>
                                        <th>Account</th>
                                        <th>UMR </th>
                                        <th>AGS Policy Number</th>
                                        <th>Insurance Period From</th>
                                        <th>Insurance Period to</th>
                                        <th>Gross Premium</th>
                                        <th>Net Premium </th>
                                            <th>Claim Paid</th>
                                        
                                        <?php if($with_claim_fee==1) {?>

                                        <th>Fees Paid</th>
                                        <?php }?>
                                        <th>Reserve</th>
                                        <th>Total Incurred </th>
                                        <th>GLR</th>
                                        <th>NLR</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $tot_paid=$tot_reserve=0.00;
                                foreach($result as $key => $value): ?>    
                                <tr class="odd gradeX " >
                                    <td><?php echo $value['name']; ?></td>
                                    <td><?php echo $value['fed_name']; ?></td>
                                    <td><?php echo $value['contract_id']; ?></td>
                                    <td><?php echo $value['ags_policy_no']; ?></td>
                                    <td><?php echo $value['start_date']; ?></td>
                                    <td><?php echo $value['end_date']; ?></td>
                                    <td><?php echo number_format(round($value['prem_paid']), 0, ',', '');  ?></td>
                                    <td><?php echo number_format(round($value['total_insurances']), 0, ',', ''); ?></td>
                                    
                                        <td><?php echo number_format(round($value['paid']), 0, ',', '') ?></td>
                                   
                                    <?php if($with_claim_fee==1) {?>
                                    <td><?php echo number_format(round($value['deduct']), 0, ',', ''); ?></td></td>
                                    <?php $total=number_format(round($value['paid']+$value['deduct']+$value['reserve']), 0, ',', '');
                                    if($value['prem_paid']>0)
                                    $glr=(($value['paid']+$value['deduct']+$value['reserve'])/$value['prem_paid'])*100; 
                                    if($value['total_insurances']>0)
                                    $nlr=(($value['paid']+$value['deduct']+$value['reserve'])/$value['total_insurances'])*100;
                                    ?>
                                    
                                     <?php }else{
                                         $total=number_format(round($value['paid']+$value['reserve']), 0, ',', '');
                                         if($value['prem_paid']>0)
                                        $glr=(($value['paid']+$value['reserve'])/$value['prem_paid'])*100;
                                        if($value['total_insurances']>0)
                                        $nlr=(($value['paid']+$value['reserve'])/$value['total_insurances'])*100;
                                         
                                     } ?>
                                    <td><?php echo number_format(round($value['reserve']), 0, ',', ''); ?></td>
                                    <td><?php echo $total; ?></td>
                                    <td><?php if(!empty($value['prem_paid'])){  echo number_format(round($glr), 0, ',', '.') ."%"; } else echo "0.00%";?></td>
                                    <td><?php if(!empty($value['total_insurances'])){  echo number_format(round($nlr), 0, ',', '.')."%"; } else echo "0.00%"; ?></td>
                                </tr>
                            <?php endforeach; ?>
                    </tbody>
            </table>

            <table class=" table table-bordered border-theme1 table-responsive" id="tblAdditionalData" >
                                <thead class="bg-th background-theme1">
                                    <tr class="bg-col">
                                        <th>Insurer</th>
                                        <th>Account</th>
                                        <th>UMR </th>
                                        <th>AGS Policy Number</th>
                                        <th>Insurance Period From</th>
                                        <th>Insurance Period to</th>
                                        <th>Gross Premium</th>
                                        <th>Net Premium </th>
                                            <th>Claim Paid</th>
                                        
                                        <?php if($with_claim_fee==1) {?>

                                        <th>Fees Paid</th>
                                        <?php }?>
                                        <th>Reserve</th>
                                        <th>Total Incurred </th>
                                        <th>GLR</th>
                                        <th>NLR</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $tot_paid=$tot_reserve=0.00;
                                foreach($result as $key => $value): ?>    
                                <tr class="odd gradeX " >
                                    <td><?php echo $value['name']; ?></td>
                                    <td><?php echo $value['fed_name']; ?></td>
                                    <td><?php echo $value['contract_id']; ?></td>
                                    <td><?php echo $value['ags_policy_no']; ?></td>
                                    <td><?php echo $value['start_date']; ?></td>
                                    <td><?php echo $value['end_date']; ?></td>
                                    <td><?php echo number_format(round($value['prem_paid']), 0, ',', '');  ?></td>
                                    <td><?php echo number_format(round($value['total_insurances']), 0, ',', ''); ?></td>
                                    
                                        <td><?php echo number_format(round($value['paid']), 0, ',', '') ?></td>
                                   
                                    <?php if($with_claim_fee==1) {?>
                                    <td><?php echo number_format(round($value['deduct']), 0, ',', ''); ?></td></td>
                                    <?php $total=number_format(round($value['paid']+$value['deduct']+$value['reserve']), 0, ',', '');
                                    if($value['prem_paid']>0)
                                    $glr=(($value['paid']+$value['deduct']+$value['reserve'])/$value['prem_paid'])*100; 
                                    if($value['total_insurances']>0)
                                    $nlr=(($value['paid']+$value['deduct']+$value['reserve'])/$value['total_insurances'])*100;
                                    ?>
                                    
                                     <?php }else{
                                         $total=number_format(round($value['paid']+$value['reserve']), 0, ',', '');
                                         if($value['prem_paid']>0)
                                        $glr=(($value['paid']+$value['reserve'])/$value['prem_paid'])*100;
                                        if($value['total_insurances']>0)
                                        $nlr=(($value['paid']+$value['reserve'])/$value['total_insurances'])*100;
                                         
                                     } ?>
                                    <td><?php echo number_format(round($value['reserve']), 0, ',', ''); ?></td>
                                    <td><?php echo $total; ?></td>
                                    <td><?php if(!empty($value['prem_paid'])){  echo number_format(round($glr), 0, ',', '.') ."%"; } else echo "0.00%";?></td>
                                    <td><?php if(!empty($value['total_insurances'])){  echo number_format(round($nlr), 0, ',', '.')."%"; } else echo "0.00%"; ?></td>
                                </tr>
                            <?php endforeach; ?>
                    </tbody>
            </table>
            <canvas id="myChart" width="400" height="200"></canvas>
