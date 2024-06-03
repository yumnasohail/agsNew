 <?php 
                                            foreach($policy_periods as $key => $value){ ?>s
                                            <option value="<?php echo $value['id'] ?>"><?php echo $value['contract_id'] ." - (".date("d/m/Y", strtotime($value['start_date']))." - ".date("d/m/Y", strtotime($value['end_date'])).")" ?> </option>
                                            <?php  } ?>