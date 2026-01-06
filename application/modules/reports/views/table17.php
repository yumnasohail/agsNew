<style>
    .btn-export{
        margin-bottom: 2%;
        margin-top: 6%;
    }
</style>
<button class="btn btn-outline-primary btn-export" onclick="export_to_CSV('PC calc in Paid Bdx format')">Export to CSV </button>
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
                                        <th>CR0006</th>
                                        <th>CR0007</th>
                                        <th>CR0011</th>
                                        <th>CR0014</th>
                                        <th>CR0026</th>
                                        <th>CR0027</th>
                                        <th>CR0028</th>
                                        <th>CR0032</th>
                                        <th>CR0033</th>
                                        <th>CR0034</th>
                                        <th>CR0036</th>
                                        <th>CR0038</th>
                                        <th>CR0039</th>
                                        <th>CR0040</th>
                                        <th>CR0046</th>
                                        <th>CR0047</th>
                                        <th>CR0048</th>
                                        <th>CR0049</th>
                                        <th>CR0060</th>
                                        <th>CR0063</th>
                                        <th>CR0064</th>
                                        <th>CR0067</th>
                                        <th>CR0068</th>
                                        <th>CR0069</th>
                                        <th>CR0070</th>
                                        <th>CR0071</th>
                                        <th>CR0072</th>
                                        <th>CR0073</th>
                                        <th>CR0074</th>
                                        <th>CR0075</th>
                                        <th>CR0076</th>
                                        <th>CR0077</th>
                                        <th>CR0077</th>
                                        <th>CR0077</th>
                                        <th>CR0077</th>
                                        <th>CR0077</th>
                                        <th>CR0078</th>
                                        <th>CR0078</th>
                                        <th>CR0078</th>
                                        <th>CR0078</th>
                                        <th>CR0078</th>
                                        <th>CR0079</th>
                                        <th>CR0079</th>
                                        <th>CR0079</th>
                                        <th>CR0079</th>
                                        <th>CR0079</th>
                                        <th>CR0080</th>
                                        <th>CR0080</th>
                                        <th>CR0080</th>
                                        <th>CR0080</th>
                                        <th>CR0080</th>
                                        <th>CR0081</th>
                                        <th>CR0081</th>
                                        <th>CR0081</th>
                                        <th>CR0081</th>
                                        <th>CR0081</th>
                                        <th>CR0082</th>
                                        <th>CR0082</th>
                                        <th>CR0082</th>
                                        <th>CR0082</th>
                                        <th>CR0082</th>
                                        <th>CR0083</th>
                                        <th>CR0083</th>
                                        <th>CR0083</th>
                                        <th>CR0083</th>
                                        <th>CR0083</th>
                                        <th>CR0084</th>
                                        <th>CR0084</th>
                                        <th>CR0084</th>
                                        <th>CR0084</th>
                                        <th>CR0084</th>
                                        <th>CR0085</th>
                                        <th>CR0085</th>
                                        <th>CR0085</th>
                                        <th>CR0085</th>
                                        <th>CR0085</th>
                                        <th>CR0086</th>
                                        <th>CR0087</th>
                                        <th>CR0089</th>
                                        <th>CR0089</th>
                                        <th>CR0090</th>
                                        <th>CR0090</th>
                                        <th>CR0091</th>
                                        <th>CR0091</th>
                                        <th>CR0092</th>
                                        <th>CR0092</th>
                                        <th>CR0093</th>
                                        <th>CR0093</th>
                                        <th>CR0094</th>
                                        <th>CR0094</th>
                                        <th>CR0095</th>
                                        <th>CR0095</th>
                                        <th>CR0169</th>
                                        <th>CR0225</th>
                                        <th>CR0226</th>
                                        <th>CR0227</th>
                                        <th>CR0230</th>
                                        <th>CR0235</th>
                                        <th>CR0278</th>
                                        <th>CR0279</th>
                                        <th>CR0280</th>
                                        <th>CR0288</th>
                                        <th>CR0289</th>
                                        <th>CR0299</th>
                                        <th>CR0315</th>
                                        <th>CR1256</th>
                                        <th>CR1297</th>
                                        <th>CR1298</th>
                                        <th>CR1299</th>
                                        
                                        
                                        
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
                                        <th>Agreement No </th>
                                        <th>Section No</th>
                                        <th>London Broker Reference</th>
                                        <th>Coverholder PIN</th>
                                        <th>Policy or Group Ref</th>
                                        <th>RiskNumber of Policies (Spain)</th>
                                        <th>Number of Vehicles (Spain)</th>
                                        <th>Period of Cover - Narrative</th>
                                        <th>Name or Registration No of Aircraft Vehicle, Vessel etc. </th>
                                        <th>Insured First Name</th>
                                        <th>Fiscal Code (codice fiscale) (Italy)</th>
                                        <th>Insured Address </th>
                                        <th>Insured Country Sub-division: State, Province, Territory, Canton etc.</th>
                                        <th>Insured Postcode, Zip Code or Similar</th>
                                        <th>Location of Risk, Address</th>
                                        <th>Location of Risk, County</th>
                                        <th>Location of Risk - Country Sub-division: State, Province, Territory, Canton etc.</th>
                                        <th>Location of Risk, Postcode, zip code or similar</th>
                                        <th>Terrorism premium</th>
                                        <th>Accessori (Italy)</th>
                                        <th>Total Taxes and Levies</th>
                                        <th>Rate of Exchange</th>
                                        <th>Net Premium to London in Settlement Currency</th>
                                        <th>Brokerage % of gross premium</th>
                                        <th>Brokerage Amount (Original Currency)</th>
                                        <th>Final Net Premium (Original Currency)</th>
                                        <th>Final Net Premium Settlement Currency (see code list)</th>
                                        <th>Final Net Premium Rate of Exchange</th>
                                        <th>Brokerage Amount (Settlement Currency)</th>
                                        <th>Final Net Premium (Settlement Currency)</th>
                                        <th>% for Lloyd's</th>
                                        <th>Tax 1 - Jurisdiction: Country, State, Province, Territory</th>
                                        <th>Tax 2 - Jurisdiction: Country, State, Province, Territory</th>
                                        <th>Tax 3 - Jurisdiction: Country, State, Province, Territory</th>
                                        <th>Tax 4 - Jurisdiction: Country, State, Province, Territory</th>
                                        <th>Tax 5 - Jurisdiction: Country, State, Province, Territory</th>
                                        <th>Tax 1 - Tax Type</th>
                                        <th>Tax 2 - Tax Type</th>
                                        <th>Tax 3 - Tax Type</th>
                                        <th>Tax 4 - Tax Type</th>
                                        <th>Tax 5 - Tax Type</th>
                                        <th>Tax 1 - Amount of Taxable Premium</th>
                                        <th>Tax 2 - Amount of Taxable Premiumeference</th>
                                        <th>Tax 3 - Amount of Taxable Premium</th>
                                        <th>Tax 4 - Amount of Taxable Premium</th>
                                        <th>Tax 5 - Amount of Taxable Premium</th>
                                        <th>Tax 1 - %</th>
                                        <th>Tax 2 - %</th>
                                        <th>Tax 3 - %</th>
                                        <th>Tax 4 - %</th>
                                        <th>Tax 5 - %</th>
                                        <th>Tax 1 - Fixed Rate </th>
                                        <th>Tax 2 - Fixed Rate</th>
                                        <th>Tax 3 - Fixed Rate</th>
                                        <th>Tax 4 - Fixed Rate</th>
                                        <th>Tax 5 - Fixed Rate</th>
                                        <th>Tax 1 - Multiplier</th>
                                        <th>Tax 2 - Multiplier</th>
                                        <th>Tax 3 - Multiplier</th>
                                        <th>Tax 4 - Multiplier</th>
                                        <th>Tax 5 - Multiplier</th>
                                        <th>Tax 1 - Amount</th>
                                        <th>Tax 2 - Amount</th>
                                        <th>Tax 3 - Amount</th>
                                        <th>Tax 4 - Amount</th>
                                        <th>Tax 5 - Amount</th>
                                        <th>Tax 1 - Administered By</th>
                                        <th>Tax 2 - Administered By</th>
                                        <th>Tax 3 - Administered By</th>
                                        <th>Tax 4 - Administered By</th>
                                        <th>Tax 5 - Administered By</th>
                                        <th>Tax 1 - Payable By</th>
                                        <th>Tax 2 - Payable By</th>
                                        <th>Tax 3 - Payable By</th>
                                        <th>Tax 4 - Payable By</th>
                                        <th>Tax 5 - Payable By</th>
                                        <th>Other Fees or Deductions Description</th>
                                        <th>Other Fees or Deductions Amount</th>
                                        <th>Intermediary 1 - Role</th>
                                        <th>Intermediary 2 - Role</th>
                                        <th>Intermediary 1 - Name</th>
                                        <th>Intermediary 2 - Name</th>
                                        <th>Intermediary 1 - Reference No etc./th>
                                        <th>Intermediary 2 - Reference No etc.</th>
                                        <th>Intermediary 1 - Address</th>
                                        <th>Intermediary 2 - Address</th>
                                        <th>Intermediary 1 - Country Sub-division: State, Province, Territory, Canton etc.</th>
                                        <th>Intermediary 2 - Country Sub-division: State, Province, Territory, Canton etc.</th>
                                        <th>Intermediary 1 - Postcode, zip or similar</th>
                                        <th>Intermediary 2 - Postcode, zip or similar</th>
                                        <th>Intermediary 1 - Country (see code list)</th>
                                        <th>Intermediary 2 - Country (see code list)</th>
                                        <th>Notes</th>
                                        <th>IMO Ship Identification Number (Germany)</th>
                                        <th>Country of Registration</th>
                                        <th>Referred to London</th>
                                        <th>Transaction number</th>
                                        <th>Coverholder commission amount for whole risk/written premium</th>
                                        <th>Insured - Policyholder Type</th>
                                        <th>Insured - Total Number of Employees</th>
                                        <th>Insured - Revenue or Turnover </th>
                                        <th>Number of Instalments</th>
                                        <th>Instalment Basis</th>
                                        <th>Reason for Cancellation</th>
                                        <th>Policy issuance date</th>
                                        <th>Spanish tax identification number</th>
                                        <th>Lloyd’s Platform</th>
                                        <th>Industrial sector of the insured</th>
                                        <th>Reinsurance basis</th>
                                        
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                foreach($result as $key => $value):
                                 ?>    
                                <tr class="odd gradeX " >
                                        <td><?php echo date("d-F-y", strtotime($value['start_date'])); ?></td>
                                        <td><?php echo $value['end_date']; ?></td>
                                        <td><?php echo $value['contract_id']?></td>
                                        <td><?php echo date("Y", strtotime($value['start_date'])); ?></td>
                                        <td>AGS Forsikring AS</td>
                                        <td>KG</td>
                                        <td>Commercial</td>
                                        <td>Direct </td>
                                        <td><?php echo $value['currency'] ?></td>
                                        <td><?php if($value['paid']>0) echo round($value['paid']); else echo "Nil"; ?></td>
                                        <td>
                                            <?php $res=Modules::run('reports/_get_specific_table_with_pagination_bdx_check',array("f_id"=>$value['f_id'],'end_date <= '=>$value['start_date']),'policy_period.id desc',"policy_period","policy_period.id",'','')->num_rows();
                                            if($res>0) echo "Renewal"; else echo "New"; ?></td>
                                        <td><?php echo $value['ags_policy_no'] ?></td>
                                        <td><?php echo date("d/m/y", strtotime($value['start_date'])) ?></td>
                                        <td><?php echo date("d/m/y", strtotime($value['end_date'])) ?></td>
                                        <td><?php echo $value['fed_name'] .' - '.$value['p_name']; ?></td>
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
                                        <?php $pre=Modules::run('api/_get_specific_table_with_pagination',array("period_id"=>$value['period_id']),'id desc',"premiums","SUM(paid) as ttl, SUM(recieved) as ttl_recieved,total_insurances",'','')->row_array(); ?>
                                        <td><?php if($pre['ttl']>0) { echo  "-".number_format(round($pre['ttl']), 0, ',', ''); } ?></td>
                                        <td><?php if($pre['ttl']>0){ echo  number_format(round($pre['ttl_recieved']/$pre['ttl']*100), 0, ',', '').'%';}else{ echo "0%";} ?></td>
                                        <td><?php if($pre['ttl_recieved']>0) { echo  "-".number_format(round($pre['ttl_recieved']), 0, ',', ''); } ?></td>
                                        <td><?php if($pre['total_insurances']>0) { echo  "-".number_format(round($pre['total_insurances']), 0, ',', ''); } ?></td>
                                        <td><?php echo $value['currency'] ?></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        
                                        
                                        
                                    </tr>
                            <?php  endforeach; ?>
                    </tbody>
            </table>