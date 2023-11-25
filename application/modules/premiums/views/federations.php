 <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1 class="color-theme-1">Forsikringspremie - Federasjoner</h1>
                    <div class="separator mb-5"></div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                                        <p>Beløp mottatt fra Federation : <strong><?php if(!empty($totals['paid'])) echo  round($totals['paid']); else echo "0"; ?> Nok</strong></p>
            <p>Beløp betalt til AGS : <strong><?php if(!empty($totals['recieved'])) echo   round($totals['recieved']);  else echo "0";  ?> Nok</strong></p>
            <p>Beløp betalt til forsikringsselskapet : <strong><?php if(!empty($totals['total_insurances'])) echo  round($totals['total_insurances']); else echo "0"; ?> Nok</strong></p>
                            <table class="data-table data-table-feature table table-bordered border-theme1">
                                <thead class="bg-th background-theme1">
                                <tr class="bg-col">
                                <th class="sr">Ref.</th>
                                <th>Navn</th>
                                <th>kort tittel</th>
                                <th class="" style="width:300px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Handling</th>
                                </tr>
                                </thead>
                                <tbody>
                                        <?php
                                        $i = 0;
                                        if (isset($news)) {
                                            foreach ($news->result() as
                                                    $new) {
                                                $i++;
                                                $edit_url = ADMIN_BASE_URL . 'premiums/policy_periods/'. $new->id ;
                                                ?>
                                                <tr id="Row_<?=$new->id?>" class="odd gradeX " >
                                                <td width='2%'><?php echo $i;?></td>
                                                <td><?php echo $new->name;  ?></td>
                                                <td><?php echo $new->title; ?></td>
                                                <td class="table_action">
                                                <?php
                                              

                                                echo anchor($edit_url, '<i class="iconsminds-arrow-turn-right"></i>', array('class' => 'action_edit  blue c-btn','title' => 'Next'));

                                                ?>
                                                </td>
                                            </tr>
                                            <?php } ?>    
                                        <?php } ?>
                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

