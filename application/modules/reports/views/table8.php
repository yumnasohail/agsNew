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
                                        <th>CR0001</th>
                                        <th>CR0002</th>
                                        <th>CR0005</th>
                                        <th>CR0010</th>
                                        <th>CR0013</th>
                                        <th>CR0016</th>
                                        <th>CR0017</th>
                                        <th>CR0019</th>
                                        <th>CR0020</th>
                                        <th>CR0021</th>
                                        <th>CR0022</th>
                                        <th>CR0029</th>
                                        <th>CR0030</th>
                                        <th>CR0031</th>
                                        <th>CR0035</th>
                                        <th>CR0041</th>
                                        <th>CR0050</th>
                                        <th>CR0051</th>
                                        <th>CR0052</th>
                                        <th>CR0053</th>
                                        <th>CR0054</th>
                                        <th>CR0055</th>
                                        <th>CR0056</th>
                                        <th>CR0057</th>
                                        <th>CR0058</th>
                                        <th>CR0059</th>
                                        <th>CR0061</th>
                                        <th>CR0062</th>
                                        <th>CR0065</th>
                                        <th>CR0066</th>
                                    </tr>
                                    <tr class="bg-col">
                                        <th>Reporting Periode Start Date</th>
                                        <th>Reporting Period (End Date)</th>
                                        <th>UMR</th>
                                        <th>Year of Account</th>
                                        <th>Coverholder Name</th>
                                        <th>Risk Code</th>
                                        <th>Class of Business</th>
                                        <th>Type of Insurance (direct or Type or Reins) </th>
                                        <th>Original Currency</th>
                                        <th>Total Gross Written Premium</th>
                                        <th>Risk, Transaction Type</th>
                                        <th>Risk Reference</th>
                                        <th>Risk Interception Date</th>
                                        <th>Risk Expiry Date</th>
                                        <th>Insured Name</th>
                                        <th>Insured Country</th>
                                        <th>Location of Risk - Country</th>
                                        <th>Sum Insured Currency</th>
                                        <th>Sum Insured Amount</th>
                                        <th>Deductible or Excess Currency (see Code list)</th>
                                        <th>Deductible or Excess Amount</th>
                                        <th>Deductible or Excess Basis</th>
                                        <th>Transaction Type - Original Premium etc</th>
                                        <th>Effective Date of Transaction</th>
                                        <th>Expiry Date of Transaction</th>
                                        <th>Gross Premium Paid This time</th>
                                        <th>Commission  %</th>
                                        <th>AGS Commission Amount</th>
                                        <th>Net Premium to London in original Currency</th>
                                        <th>Settlement Currency</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $tot_paid=$tot_reserve=0.00;
                                foreach($result as $key => $value): 
                                 if($value['c_paid']>0){      ?>    
                                <tr class="odd gradeX " >
                                        <td><?php echo date("d-F-y", strtotime($start_date)); ?></td>
                                        <td><?php echo $end_date; ?></td>
                                        <td><?php echo $value['contract_id']?></td>
                                        <td><?php echo $year; ?></td>
                                        <td>AGS Forsikring AS</td>
                                        <td>KG</td>
                                        <td>Commercial</td>
                                        <td>Direct </td>
                                        <td><?php echo $value['currency'] ?></td>
                                        <td><?php if($value['paid']>0) echo $value['paid']; else echo "Nil"; ?></td>
                                        <td>
                                            <?php $res=Modules::run('reports/_get_specific_table_with_pagination_bdx_check',array("f_id"=>$value['f_id'],'end_date <= '=>$value['start_date']),'policy_period.id desc',"policy_period","policy_period.id",'','')->num_rows();
                                            if($res>0) echo "Renewal"; else echo "New"; ?></td>
                                        <td><?php echo $value['ags_policy_no'] ?></td>
                                        <td><?php echo date("d/m/y", strtotime($value['start_date'])) ?></td>
                                        <td><?php echo date("d/m/y", strtotime($value['end_date'])) ?></td>
                                        <td><?php echo $value['f_name'] .' - '.$value['p_name']; ?></td>
                                        <td><?php if($value['currency']=="SEK" || $value['currency']=="sek") echo "SE"; else echo "NO"; ?></td>
                                        <td><?php if($value['currency']=="SEK" || $value['currency']=="sek") echo "SE"; else echo "NO"; ?></td>
                                        <td><?php echo $value['currency'] ?></td>
                                        <td><?php if($value['insured_amt']>0) echo  $value['insured_amt']; else echo "Nil";  ?></td>
                                        <td><?php echo $value['currency'] ?></td>
                                        <td><?php echo $value['deductible'] ?></td>
                                        <td>Any one accident or occurrence</td>
                                        <td><?php if($res>0) echo "Original Premium"; else echo "Additional Premium"; ?></td>
                                        <td></td>
                                        <td></td>
                                        <td><?php  if($value['c_paid']>0) echo $value['c_paid']; else echo "Nil"; ?></td>
                                        <td><?php echo $value['comission'].'%' ?></td>
                                        <td><?php if($value['recieved']>0) echo $rec=($value['c_paid']/100*$value['comission']); else echo "Nil"; ?></td>
                                        <td><?php if($value['total_insurances']>0) echo $rec=$value['c_paid']-($value['c_paid']/100*$value['comission']); else echo "Nil"; ?></td>
                                        <td><?php echo $value['currency'] ?></td>
                                    </tr>
                            <?php } endforeach; ?>
                    </tbody>
            </table>