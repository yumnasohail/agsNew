<style>
    .btn-export{
        margin-bottom: 2%;
        margin-top: 6%;
    }
</style>
<button class="btn btn-outline-primary btn-export" onclick="export_to_CSV('Assignment Report')">Export to CSV </button>
<table class="  table table-bordered border-theme1 table-responsive " id="tblReportData" >
                                <thead class="bg-th background-theme1">
                                    <tr class="bg-col">
                                        <th>Insurer</th>
                                        <th>Account</th>
                                        <th>UMR</th>
                                        <th>AGS Policy No</th>
                                        <th>Insurance Period From</th>
                                        <th>Insurance Period To</th>
                                        <th>AGS ClaimNo </th>
                                        <th>Date Incident</th>
                                        <th>Claimant name</th>
                                        <th>Club</th>
                                        <th>SportNo</th>
                                        <th>Licence</th>
                                        <th>Paid</th>
                                        <th>Reserve</th>
                                        <th>Total Incurred</th>
                                        <th>Date Received</th>
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
                                    <td><?php echo $value['id']; ?></td>
                                    <td><?php echo $value['report_datetime']; ?></td>
                                    <td><?php echo $value['claimant_name']; ?></td>
                                    <td><?php echo $value['c_name']; ?></td>
                                    <td><?php echo $value['a_sportsno']; ?></td>
                                    <td><?php echo $value['insurance_under']; ?></td>
                                    <td><?php $res=Modules::run('api/get_specific_table_with_pagination_where_groupby',array("claim_id"=>$value['id'],"trans"=>"0","trans_status"=>"transferred"),"claim_id desc","claim_id","transaction","SUM(belop) as belop",1,10000,'','','')->row(); if(empty($res->belop) || $res->belop==0) echo "0.00"; else echo  $res->belop;?></td>
                                    <td><?php $res=Modules::run('api/get_specific_table_with_pagination_where_groupby',array("claim_id"=>$value['id']),"claim_id desc","claim_id","claim_reservations","SUM(amount) as belop",1,10,'','','')->row();  if(empty($res->belop) || $res->belop==0) echo "0.00"; else echo  $res->belop; ?></td>
                                    <td><?php 
                                         $res=Modules::run('api/get_specific_table_with_pagination_where_groupby',array("claim_id"=>$value['id']),"claim_id desc","claim_id","claim_reservations","SUM(amount) as belop",1,10,'','','')->row(); 
                                         $trans=Modules::run('api/get_specific_table_with_pagination_where_groupby',array("claim_id"=>$value['id'],"trans"=>"0","trans_status"=>"transferred"),"claim_id desc","claim_id","transaction","SUM(belop) as belop",1,10000,'','','')->row();
                                         $tot=$res->belop+$trans->belop;
                                         if(empty($tot) || $tot==0) 
                                            echo "0.00";
                                         else
                                            echo $tot;
                                        ?></td>
                                    <td><?php echo $value['claim_datetime']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                    </tbody>
            </table>