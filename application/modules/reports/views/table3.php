<style>
    .btn-export{
        margin-bottom: 2%;
        margin-top: 6%;
    }
</style>
<button class="btn btn-outline-primary btn-export" onclick="export_to_CSV('Assignment Report')">Export to CSV </button>
<table class=" table table-bordered border-theme1 table-responsive" id="tblReportData" >
                                <thead class="bg-th background-theme1">
                                    <tr class="bg-col">
                                        <th>Table 1: Paid/Reserved pr Dicipline/Coverage Type</th>
                                        <th colspan="16"></th>
                                    </tr>
                                </thead>
                                  <col>
                                  <colgroup span="2"></colgroup>
                                  <colgroup span="2"></colgroup>
                                  <colgroup span="12"></colgroup>
                                  <tr>
                                    <td rowspan="2"></td>
                                    <th colspan="2" scope="colgroup">Standard</th>
                                    <th colspan="2" scope="colgroup">Extended</th>
                                    <th colspan="2" scope="colgroup">Training</th>
                                    <th colspan="2" scope="colgroup">Single License</th>
                                    <th colspan="8" scope="colgroup"></th>
                                  </tr>
                                  <tr>
                                    <th scope="col">Paid</th>
                                    <th scope="col">Reserved</th>
                                    <th scope="col">Paid</th>
                                    <th scope="col">Reserved</th>
                                    <th scope="col">Paid</th>
                                    <th scope="col">Reserved</th>
                                    <th scope="col">Paid</th>
                                    <th scope="col">Reserved</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                  </tr>
                                  <tr>
                                    <th scope="row">Amerikansk fotball</th>
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
                                  <tr>
                                    <th scope="row">Cheerleading</th>
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
                                  <tr>
                                    <th scope="row">Frisbee</th>
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
                                  <tr>
                                    <th scope="row">Lacrosse</th>
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
                                  
                                  <thead class="bg-th background-theme1">
                                    <tr class="bg-col">
                                        <th >Table 2: Estimates pr Dicipline/Injury Type</th>
                                        <th colspan="16"></th>
                                    </tr>
                                </thead>
                                  <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Knee</th>
                                    <th scope="col">Ankle</th>
                                    <th scope="col">Back</th>
                                    <th scope="col">Shoulder</th>
                                    <th scope="col">Neck</th>
                                    <th scope="col">Foot</th>
                                    <th scope="col">Clavicle</th>
                                    <th scope="col">Dental</th>
                                    <th scope="col">Fingers</th>
                                    <th scope="col">Leg</th>
                                    <th scope="col">Biceps</th>
                                    <th scope="col">Thumb</th>
                                    <th scope="col">Achilles</th>
                                    <th scope="col">Hip</th>
                                    <th scope="col">Deltoids</th>
                                    <th scope="col">Other</th>
                                  </tr>
                                  <tr>
                                    <th scope="row">Amerikansk fotball</th>
                                    <td><?php echo $af['knee']; ?></td>
                                    <td><?php echo $af['Ankle']; ?></td>
                                    <td><?php echo $af['Back']; ?></td>
                                    <td><?php echo $af['Shoulder']; ?></td>
                                    <td><?php echo $af['Neck']; ?></td>
                                    <td><?php echo $af['Foot']; ?></td>
                                    <td><?php echo $af['Clavicle']; ?></td>
                                    <td><?php echo $af['Dental']; ?></td>
                                    <td><?php echo $af['Fingers']; ?></td>
                                    <td><?php echo $af['Leg']; ?></td>
                                    <td><?php echo $af['Biceps']; ?></td>
                                    <td><?php echo $af['Thumb']; ?></td>
                                    <td><?php echo $af['Achilles']; ?></td>
                                    <td><?php echo $af['Hip']; ?></td>
                                    <td><?php echo $af['Deltoids']; ?></td>
                                    <td><?php echo $af['Other']; ?></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Cheerleading</th>
                                    <td><?php echo $af['knee']; ?></td>
                                    <td><?php echo $af['Ankle']; ?></td>
                                    <td><?php echo $af['Back']; ?></td>
                                    <td><?php echo $af['Shoulder']; ?></td>
                                    <td><?php echo $af['Neck']; ?></td>
                                    <td><?php echo $af['Foot']; ?></td>
                                    <td><?php echo $af['Clavicle']; ?></td>
                                    <td><?php echo $af['Dental']; ?></td>
                                    <td><?php echo $af['Fingers']; ?></td>
                                    <td><?php echo $af['Leg']; ?></td>
                                    <td><?php echo $af['Biceps']; ?></td>
                                    <td><?php echo $af['Thumb']; ?></td>
                                    <td><?php echo $af['Achilles']; ?></td>
                                    <td><?php echo $af['Hip']; ?></td>
                                    <td><?php echo $af['Deltoids']; ?></td>
                                    <td><?php echo $af['Other']; ?></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Frisbee</th>
                                    <td><?php echo $af['knee']; ?></td>
                                    <td><?php echo $af['Ankle']; ?></td>
                                    <td><?php echo $af['Back']; ?></td>
                                    <td><?php echo $af['Shoulder']; ?></td>
                                    <td><?php echo $af['Neck']; ?></td>
                                    <td><?php echo $af['Foot']; ?></td>
                                    <td><?php echo $af['Clavicle']; ?></td>
                                    <td><?php echo $af['Dental']; ?></td>
                                    <td><?php echo $af['Fingers']; ?></td>
                                    <td><?php echo $af['Leg']; ?></td>
                                    <td><?php echo $af['Biceps']; ?></td>
                                    <td><?php echo $af['Thumb']; ?></td>
                                    <td><?php echo $af['Achilles']; ?></td>
                                    <td><?php echo $af['Hip']; ?></td>
                                    <td><?php echo $af['Deltoids']; ?></td>
                                    <td><?php echo $af['Other']; ?></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Lacrosse</th>
                                    <td><?php echo $af['knee']; ?></td>
                                    <td><?php echo $af['Ankle']; ?></td>
                                    <td><?php echo $af['Back']; ?></td>
                                    <td><?php echo $af['Shoulder']; ?></td>
                                    <td><?php echo $af['Neck']; ?></td>
                                    <td><?php echo $af['Foot']; ?></td>
                                    <td><?php echo $af['Clavicle']; ?></td>
                                    <td><?php echo $af['Dental']; ?></td>
                                    <td><?php echo $af['Fingers']; ?></td>
                                    <td><?php echo $af['Leg']; ?></td>
                                    <td><?php echo $af['Biceps']; ?></td>
                                    <td><?php echo $af['Thumb']; ?></td>
                                    <td><?php echo $af['Achilles']; ?></td>
                                    <td><?php echo $af['Hip']; ?></td>
                                    <td><?php echo $af['Deltoids']; ?></td>
                                    <td><?php echo $af['Other']; ?></td>
                                  </tr>
                                 
                                   <thead class="bg-th background-theme1">
                                    <tr class="bg-col">
                                        <th> Table 3: Number of Claims pr Dicipline/Injury Type</th>
                                        <th colspan="16"></th>
                                    </tr>
                                </thead>
                                  <tr>
                                      <th></th>
                                    <th scope="col">Knee</th>
                                    <th scope="col">Ankle</th>
                                    <th scope="col">Back</th>
                                    <th scope="col">Shoulder</th>
                                    <th scope="col">Neck</th>
                                    <th scope="col">Foot</th>
                                    <th scope="col">Clavicle</th>
                                    <th scope="col">Dental</th>
                                    <th scope="col">Fingers</th>
                                    <th scope="col">Leg</th>
                                    <th scope="col">Biceps</th>
                                    <th scope="col">Thumb</th>
                                    <th scope="col">Achilles</th>
                                    <th scope="col">Hip</th>
                                    <th scope="col">Deltoids</th>
                                    <th scope="col">Other</th>
                                  </tr>
                                  <tr>
                                    <th scope="row">Amerikansk fotball</th>
                                    <td><?php echo $af['knee_amt']; ?></td>
                                    <td><?php echo $af['Ankle_amt']; ?></td>
                                    <td><?php echo $af['Back_amt']; ?></td>
                                    <td><?php echo $af['Shoulder_amt']; ?></td>
                                    <td><?php echo $af['Neck_amt']; ?></td>
                                    <td><?php echo $af['Foot_amt']; ?></td>
                                    <td><?php echo $af['Clavicle_amt']; ?></td>
                                    <td><?php echo $af['Dental_amt']; ?></td>
                                    <td><?php echo $af['Fingers_amt']; ?></td>
                                    <td><?php echo $af['Leg_amt']; ?></td>
                                    <td><?php echo $af['Biceps_amt']; ?></td>
                                    <td><?php echo $af['Thumb_amt']; ?></td>
                                    <td><?php echo $af['Achilles_amt']; ?></td>
                                    <td><?php echo $af['Hip_amt']; ?></td>
                                    <td><?php echo $af['Deltoids_amt']; ?></td>
                                    <td><?php echo $af['Other_amt']; ?></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Cheerleading</th>
                                    <td><?php echo $cl['knee_amt']; ?></td>
                                    <td><?php echo $cl['Ankle_amt']; ?></td>
                                    <td><?php echo $cl['Back_amt']; ?></td>
                                    <td><?php echo $cl['Shoulder_amt']; ?></td>
                                    <td><?php echo $cl['Neck_amt']; ?></td>
                                    <td><?php echo $cl['Foot_amt']; ?></td>
                                    <td><?php echo $cl['Clavicle_amt']; ?></td>
                                    <td><?php echo $cl['Dental_amt']; ?></td>
                                    <td><?php echo $cl['Fingers_amt']; ?></td>
                                    <td><?php echo $cl['Leg_amt']; ?></td>
                                    <td><?php echo $cl['Biceps_amt']; ?></td>
                                    <td><?php echo $cl['Thumb_amt']; ?></td>
                                    <td><?php echo $cl['Achilles_amt']; ?></td>
                                    <td><?php echo $cl['Hip_amt']; ?></td>
                                    <td><?php echo $cl['Deltoids_amt']; ?></td>
                                    <td><?php echo $cl['Other_amt']; ?></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Frisbee</th>
                                    <td><?php echo $f['knee_amt']; ?></td>
                                    <td><?php echo $f['Ankle_amt']; ?></td>
                                    <td><?php echo $f['Back_amt']; ?></td>
                                    <td><?php echo $f['Shoulder_amt']; ?></td>
                                    <td><?php echo $f['Neck_amt']; ?></td>
                                    <td><?php echo $f['Foot_amt']; ?></td>
                                    <td><?php echo $f['Clavicle_amt']; ?></td>
                                    <td><?php echo $f['Dental_amt']; ?></td>
                                    <td><?php echo $f['Fingers_amt']; ?></td>
                                    <td><?php echo $f['Leg_amt']; ?></td>
                                    <td><?php echo $f['Biceps_amt']; ?></td>
                                    <td><?php echo $f['Thumb_amt']; ?></td>
                                    <td><?php echo $f['Achilles_amt']; ?></td>
                                    <td><?php echo $f['Hip_amt']; ?></td>
                                    <td><?php echo $f['Deltoids_amt']; ?></td>
                                    <td><?php echo $f['Other_amt']; ?></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Lacrosse</th>
                                    <td><?php echo $l['knee_amt']; ?></td>
                                    <td><?php echo $l['Ankle_amt']; ?></td>
                                    <td><?php echo $l['Back_amt']; ?></td>
                                    <td><?php echo $l['Shoulder_amt']; ?></td>
                                    <td><?php echo $l['Neck_amt']; ?></td>
                                    <td><?php echo $l['Foot_amt']; ?></td>
                                    <td><?php echo $l['Clavicle_amt']; ?></td>
                                    <td><?php echo $l['Dental_amt']; ?></td>
                                    <td><?php echo $l['Fingers_amt']; ?></td>
                                    <td><?php echo $l['Leg_amt']; ?></td>
                                    <td><?php echo $l['Biceps_amt']; ?></td>
                                    <td><?php echo $l['Thumb_amt']; ?></td>
                                    <td><?php echo $l['Achilles_amt']; ?></td>
                                    <td><?php echo $l['Hip_amt']; ?></td>
                                    <td><?php echo $l['Deltoids_amt']; ?></td>
                                    <td><?php echo $l['Other_amt']; ?></td>
                                  </tr>
            </table>