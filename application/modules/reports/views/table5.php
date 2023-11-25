<style>
    .btn-export{
        margin-bottom: 2%;
        margin-top: 6%;
    }
</style>
<button class="btn btn-outline-primary btn-export" onclick="export_to_CSV('Assignment Report')">Export to CSV </button>
<table class="  table table-bordered border-theme1 table-responsive" id="tblReportData" >
                                <thead class="bg-th background-theme1">
                                    <tr class="bg-col">
                                        <th>Coverholder Name</th>
                                        <th>UMR</th>
                                        <th>YoA</th>
                                        <th>Binder Contract Inception</th>
                                        <th>Binder Contract Expiry</th>
                                        <th>Reporting Period (End Date)</th>
                                        <th>Original Currency</th>
                                        <th>Certificate Reference</th>
                                        <th>Claim Reference / Number </th>
                                        <th>Insured Full Name or Company Name</th>
                                        <th>Claimant name</th>
                                        <th>Insured Country</th>
                                        <th>Location of loss Country</th>
                                        <th>Date Claim First Advised/Date Claim Made</th>
                                        <th>Claim Status</th>
                                        <th>Refer to Underwriters</th>
                                        <th>Denial</th>
                                        <th>Paid this month - Indemnity</th>
                                        <th>Paid this month - Fees</th>
                                        <th>Previously Paid - Indemnity</th>
                                        <th>Previously Paid - Fees</th>
                                        <th>Reserve - Indemnity</th>
                                        <th>Reserve - Fees</th>
                                        <th>Total Incurred - Indemnity</th>
                                        <th>Total Incurred - Fees</th>
                                        <th>Date Claim Opened</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $tot_paid=$tot_reserve=0.00;
                                foreach($result as $key => $value):
                                $prev_indem=$month_indem=0.00;?>    
                                <tr class="odd gradeX " >
                                    <td>AGS Forsikring AS</td>
                                    <td><?php echo $value['contract_id']; ?></td>
                                    <td><?php echo date("Y",strtotime($value['start_date']));?></td>
                                    <td><?php echo $value['start_date']; ?></td>
                                    <td><?php echo $value['end_date']; ?></td>
                                    <td><?php echo date("Y-m-t", strtotime($end_date)); ?></td>
                                    <td><?php echo $value['currency']; ?></td>
                                    <td><?php echo $value['ags_policy_no']; ?></td>
                                    <td><?php echo $value['id']; ?></td>
                                    <td><?php echo $value['fed_name']; ?></td>
                                    <td><?php echo $value['claimant_name']; ?></td>
                                    <td><?php if($value['currency']=="NOK") echo "NO"; else if($value['currency']=="SEK") echo "SE"; else echo "NO"; ?></td>
                                    <td><?php if($value['currency']=="NOK") echo "NO"; else if($value['currency']=="SEK") echo "SE"; else echo "NO"; ?></td>
                                    <td><?php echo $value['claim_datetime']; ?></td>
                                    <td><?php if($value['stat_name']=="Avvist") {echo "Rejected"; }else if($value['stat_name']=="Avsluttet"){ echo "Closed";} else{ echo "Open"; }?></td>
                                    <td><?php if($value['underwriter']==0) echo "N"; else  echo "Y"; ?></td>
                                    <td><?php if($value['claim_stat']=="Avslått") echo "Y"; else echo "N";  ?></td>
                                    <td><?php $res=Modules::run('api/get_specific_table_with_pagination_where_groupby',array("claim_id"=>$value['id'],"dato<="=>$end_date,"dato>="=>date('Y-m-d', strtotime($end_date.'-1 months')),"trans"=>"0","trans_status"=>"transferred"),"claim_id desc","claim_id","transaction","SUM(belop) as belop",1,10000,'','','')->row();   if(empty($res->belop) || $res->belop==0) echo "0.00"; else echo  $month_indem=$res->belop; ?></td>
                                    <td><?php $res=Modules::run('api/get_specific_table_with_pagination_where_groupby',array("claim_id"=>$value['id'],"process_datetime<="=>$end_date,"process_datetime>="=>date('Y-m-d', strtotime($end_date.'-1 months'))),"claim_id desc","claim_id","process_claim","SUM(claim_fee) as belop",1,10000,'','','')->row();   if(empty($res->belop) || $res->belop==0) echo "0.00"; else echo  $res->belop; ?> </td>
                                    <td><?php $res=Modules::run('api/get_specific_table_with_pagination_where_groupby',array("claim_id"=>$value['id'],"dato<="=>date('Y-m-d', strtotime($end_date.'-1 months')),"trans"=>"0","trans_status"=>"transferred"),"claim_id desc","claim_id","transaction","SUM(belop) as belop",1,10000,'','','')->row(); if(empty($res->belop) || $res->belop==0) echo "0.00"; else echo  $prev_indem=$res->belop; ?></td>
                                    <td><?php $res=Modules::run('api/get_specific_table_with_pagination_where_groupby',array("claim_id"=>$value['id'],"process_datetime<="=>date('Y-m-d', strtotime($end_date.'-1 months'))),"claim_id desc","claim_id","process_claim","SUM(claim_fee) as belop",1,10000,'','','')->row();   if(empty($res->belop) || $res->belop==0) echo "0.00"; else echo  $res->belop; ?> </td></td>
                                    <td><?php
                                    if($value['process_stat']==2)
                                    {
                                        $prev="0.00"; echo $prev;
                                    }else{
                                        $res=Modules::run('api/get_specific_table_with_pagination_where_groupby',array("claim_id"=>$value['id']),"claim_id asc","claim_id","claim_reservations","SUM(amount) as belop",1,10,'','','')->row(); 
                                        if($res->belop>0)
                                            echo $res->belop;
                                        else
                                            echo "0.00";
                                   // $res=Modules::run('api/get_specific_table_with_pagination_where_groupby',array("claim_id"=>$value['id'],"trans"=>"1","dato<="=>$end_date),"claim_id desc","claim_id","transaction","SUM(belop) as belop",1,10000,'','','')->row(); $month=$prev=0; if(empty($res->belop) || $res->belop<=0) echo "0.00"; else {  if($month_indem>0)  {$month=abs($month_indem-$res->belop);}else {$month=$res->belop;}  if($prev_indem>0){  $prev=abs($prev_indem-$month);}else { $prev=$month;} echo $prev;  }
                                    }
                                    ?></td>
                                    <td>0.00</td>
                                    <td><?php 
                                         $res=Modules::run('api/get_specific_table_with_pagination_where_groupby',array("claim_id"=>$value['id']),"claim_id asc","claim_id","claim_reservations","SUM(amount) as belop",1,10,'','','')->row(); 
                                         $trans=Modules::run('api/get_specific_table_with_pagination_where_groupby',array("claim_id"=>$value['id'],"trans"=>"0","trans_status"=>"transferred","dato<="=>$end_date),"claim_id desc","claim_id","transaction","SUM(belop) as belop",1,10000,'','','')->row();
                                         $tot=$res->belop+$trans->belop;
                                         if(empty($tot) || $tot<=0) 
                                            echo "0.00";
                                         else
                                            echo $tot;
                                        ?>
                                    </td>
                                    <td><?php
                                    $res=Modules::run('api/get_specific_table_with_pagination_where_groupby',array("claim_id"=>$value['id'],"process_datetime<="=>date('Y-m-d'),"process_datetime>="=>date('Y-m-d', strtotime('-1 months'))),"claim_id desc","claim_id","process_claim","SUM(claim_fee) as belop",1,10000,'','','')->row(); 
                                    $p_res=Modules::run('api/get_specific_table_with_pagination_where_groupby',array("claim_id"=>$value['id'],"process_datetime<="=>date('Y-m-d', strtotime('-1 months'))),"claim_id desc","claim_id","process_claim","SUM(claim_fee) as belop",1,10000,'','','')->row();
                                    $tot=$res->belop+$p_res->belop;
                                         if(empty($tot) || $tot<=0) 
                                            echo "0.00";
                                         else
                                            echo $tot;
                                    ?></td>
                                    <td><?php echo $value['process_datetime']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                    </tbody>
            </table>