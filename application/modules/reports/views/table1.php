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
                                    <th>AGS ClaimNo</th>
                                    <th>UMR</th>
                                    <th>AGS Policy No </th>
                                    <th>Date Incident</th>
                                    <th>Date Recieved</th>
                                    <th>Date Processed</th>
                                    <th>Days I->R</th>
                                    <th>Days R->P </th>
                                    <th>Name</th>
                                    <th>Age Incident</th>
                                    <th>District</th>
                                    <th>Club</th>
                                    <th>SportNo </th>
                                    <th>Licence </th>
                                    <th>Area</th>
                                    <th>Side</th>
                                    <th>Type</th>
                                    <th>sport</th>
                                    <th>Location</th>
                                    <th>Time of Year</th>
                                    <th>Status </th>
                                    <th>Date Closed</th>
                                    <th>Date Denied</th>
                                    <th>Reserve</th>
                                    <th>Paid</th>
                                    <th>Paid Projection</th>
                                    <th>Last Activity</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($result as $key => $value): ?>
                                <tr class="odd gradeX " >
                                <td><?php echo $value['id']; ?></td>
                                <td><?php echo $value['contract_id']; ?></td>
                                <td><?php echo $value['ags_policy_no']; ?></td>
                                <td><?php echo date('Y-m-d H:i:s',strtotime($value['report_datetime'])); ?></td>
                                <td><?php echo date('Y-m-d H:i:s',strtotime($value['claim_datetime'])); ?></td>
                                <td><?php echo date('Y-m-d H:i:s',strtotime($value['process_datetime'])); ?></td>
                                <td><?php 
                                    $diffs = [
                                        'years' => 'y',
                                        'months' => 'm',
                                        'days' => 'd',
                                        'hours' => 'h',
                                        'minutes' => 'i'
                                    ];
                                    $datetime1 = new DateTime($value['report_datetime']);
                                    $datetime2 = new DateTime($value['claim_datetime']);
                                    $interval = $datetime1->diff($datetime2);
                                    $diffArr = [];
                                    foreach ($diffs as $k => $v) {
                                        $d = $interval->format('%' . $v);
                                        if ($d > 0) {
                                            $diffArr[] = $d . ' ' . $k;
                                        }
                                    }    
                                    $diffStr = implode(', ', $diffArr);
                                    echo ($diffStr == '' ? '0' : $diffStr) . PHP_EOL; ?>
                                </td>
                                <td><?php 
                                     $datetime1 = new DateTime($value['claim_datetime']);
                                     $datetime2 = new DateTime($value['process_datetime']);
                                    $interval = $datetime1->diff($datetime2);
                                    $diffArr = [];
                                    foreach ($diffs as $k => $v) {
                                        $d = $interval->format('%' . $v);
                                        if ($d > 0) {
                                            $diffArr[] = $d . ' ' . $k;
                                        }
                                    }    
                                    $diffStr = implode(', ', $diffArr);
                                    echo ($diffStr == '' ? '0' : $diffStr) . PHP_EOL;?>
                                </td>
                                <td><?php echo $value['claimant_name']; ?></td>
                                <td><?php echo $value['a_birth']; ?></td>
                                <td><?php echo $value['district']; ?></td>
                                <td><?php echo $value['c_name']; ?></td>
                                <td><?php echo $value['a_sportsno']; ?></td>
                                <td><?php echo $value['insurance_under']; ?></td>
                                <td><?php echo $value['body_part']; ?></td>
                                <td><?php echo $value['side']; ?></td>
                                <td><?php echo $value['damage_type']; ?></td>
                                <td><?php echo $value['sport']; ?></td>
                                <td><?php echo $value['place_of_damage']; ?></td>
                                <td><?php echo $value['season']; ?></td>
                                <td><?php echo $value['stat_name']; ?></td>
                                <td><?php if($value['stat_name']=="Avsluttet") echo $value['closing_date']; ?></td>
                                <td><?php if($value['stat_name']=="Avvist") echo $value['date_denied']; ?></td>
                                <td><?php  $res=Modules::run('api/_get_specific_table_with_pagination',array("claim_reservations.claim_id"=>$value['id']), "id desc","claim_reservations","SUM(claim_reservations.amount) as reserve_amount",1,0)->row_array();
                                 if(empty($res['reserve_amount']))
                                 $res['reserve_amount']="0.00";
                                echo $res['reserve_amount']; ?></td>
                                <td><?php  $res1=Modules::run('api/_get_specific_table_with_pagination',array("transaction.trans_status"=>"transferred","transaction.claim_id"=>$value['id']), "id desc","transaction","SUM(transaction.belop) as paid_amount",1,0)->row_array();
                                if(empty($res1['paid_amount']))
                                 $res1['paid_amount']="0.00";
                                echo $res1['paid_amount']; ?>
                                </td>
                                <td><?php echo $res['reserve_amount']+$res1['paid_amount']; ?></td>
                                <td>
                                    <?php  $res=Modules::run('api/_get_specific_table_with_pagination',array("claim_id"=>$value['id']), "id desc","logs","date_time",1,0)->row_array(); 
                                    echo date('Y-m-d H:i:s',strtotime($res['date_time']));
                                    ?>
                                </td>
                                <?php endforeach; ?>
                            </tr>
                    </tbody>
            </table>