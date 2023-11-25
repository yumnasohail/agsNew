<style>
fieldset
{
    padding: 4%;
}
.detail_row
{
    border-bottom: 1px solid #d6cece;
    padding-top: 10px;
}
</style>
<div class="page-content-wrapper">
<?php // print_r($post['title']);exit; ?>
        <!-- END PAGE HEADER-->
       
        <!-- BEGIN PAGE CONTENT-->
        <div class="row  detail_row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box blue">
                    <div class="portlet-title">

                       
                    </div>
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                       
                            <div class="form-body">                               
                             
                            <legend>Oppføring</legend>
                           
                                    <div class="row  detail_row">
                                        <div class="col-sm-6">
                                            <div class="form-section">Skjema</div>
                                        </div>
                                        <div class="col-sm-6">
                                                <?php echo $post['name']; ?>
                                            </span>
                                        </div>
                                    </div>

                           
                                <div class="row  detail_row">
                                    
                                    <div class="col-sm-6">
                                        <div class="form-section">Sakref</div>
                                    </div>
                                    <div class="col-sm-6">
                                            <?php echo $post['claim_id']; ?>
                                    </div>
                                </div>


                                    <!--/span-->
                                    <div class="row  detail_row">
                                            <div class="col-sm-6">
                                                <div class="form-section">Transacksjon-ID</div>
                                            </div>
                                            <div class="col-md-6">
                                                    <?php echo $post['id'];?>
                                            </div>
                                    </div>

                                    <!--/span-->
                                    <div class="row  detail_row">
                                            <div class="col-sm-6">
                                                <div class="form-section">Opprettet dato</div>
                                            </div>
                                            <div class="col-md-6">
                                                    <?php 
                                                        echo $post['dato'].' '.$post['time'];
                                                    ?>
                                            </div>
                                    </div>

                                    <!--/span-->
                                    <div class="row  detail_row">
                                            <div class="col-sm-6">
                                                <div class="form-section">Opprettet av bruker</div>
                                            </div>
                                            <div class="col-md-6">
                                                    <?php  
                                                    $res=Modules::run('api/_get_specific_table_with_pagination',array('id'=>$post['user']), "id desc","users","first_name","","")->row_array();
                                                     echo $res['first_name'];
                                                    ?>
                                            </div>
                                    </div>

                                    <!--/span-->
                                    <div class="row  detail_row">
                                            <div class="col-sm-6">
                                                <div class="form-section">Egenandel som er fratrukket</div>
                                            </div>
                                            <div class="col-md-6">
                                                    <?php if(empty($post['deduct'])) echo "0.00"; else echo $post['deduct']; ?>
                                            </div>
                                    </div>

                                    <!--/span-->
                                    <div class="row  detail_row">
                                            <div class="col-sm-6">
                                                <div class="form-section">Kategori</div>
                                            </div>
                                            <div class="col-md-6">
                                                    <?php 
                                                     $res=Modules::run('api/_get_specific_table_with_pagination',array('id'=>$post['coverage_cat']), "id desc","coverage_category","name","","")->row_array();
                                                    echo $res['name'];?>
                                            </div>
                                    </div>

                                    <!--/span-->
                                    <div class="row  detail_row">
                                            <div class="col-sm-6">
                                                <div class="form-section">Mottagerkategori</div>
                                            </div>
                                            <div class="col-md-6">
                                            <?php 
                                                     $res=Modules::run('api/_get_specific_table_with_pagination',array('id'=>$post['recepient']), "id desc","recepient_category","name","","")->row_array();
                                                    echo $res['name'];?>
                                            </div>
                                    </div>

                                    <!--/span-->
                                    <div class="row  detail_row">
                                            <div class="col-sm-6">
                                                <div class="form-section">Beskrivelse</div>
                                            </div>
                                            <div class="col-md-6">
                                                    <?php  echo $post['description'];?>
                                            </div>
                                    </div>


                                    <!--/span-->
                                    <div class="row  detail_row">
                                            <div class="col-sm-6">
                                                <div class="form-section">Send e-post til skadelidt</div>
                                            </div>
                                            <div class="col-md-6">
                                                    <?php if($post['send']=="1")
                                                        echo "Ja";
                                                    else
                                                        echo "Nei";
                                                    ?>
                                            </div>
                                    </div>
                                     





                                     
                                    <legend>Delbeløp</legend>


                                    <?php
                                    $res=Modules::run('api/_get_specific_table_with_pagination',array('t_id'=>$post['id']), "id desc","sub_amounts","*","","")->result_array(); 
                                    foreach($res as $key => $value): ?>
                           
                                    <div class="row  detail_row">
                                            <div class="col-sm-6">
                                                <div class="form-section">Dato</div>
                                            </div>
                                            <div class="col-md-6">
                                                <?php echo $value['dato'].' '.$value['time']; ?>
                                            </span>
                                        </div>
                                    </div>

                         
                                    <div class="row  detail_row">
                                            <div class="col-sm-6">
                                                <div class="form-section">Dekningskategori</div>
                                            </div>
                                            <div class="col-md-6">
                                                <?php 
                                                     $cat=Modules::run('api/_get_specific_table_with_pagination',array('id'=>$value['coverage_category']), "id desc","coverage_cat","title","","")->row_array();
                                                    echo $cat['title'];?>
                                            </span>
                                        </div>
                                    </div>


                           
                                <div class="row  detail_row">
                                            <div class="col-sm-6">
                                                <div class="form-section">Betalt til</div>
                                            </div>
                                            <div class="col-md-6">
                                        <?php echo $value['paidto']; ?>
                                    </div>
                                </div>


                                    <!--/span-->
                                    <div class="row  detail_row">
                                            <div class="col-sm-6">
                                                <div class="form-section">Beløp</div>
                                            </div>
                                            <div class="col-md-6">
                                            <?php echo $value['belop']; ?>
                                    </div>
                                    </div>
                                    <?php endforeach; ?>
                                   
                                     
                                     
                                    <legend>Betalingsinformasjon</legend>
                              
                           
                                                    <div class="row  detail_row">
                                                    <div class="col-sm-6">
                                                            <div class="form-section">Navn</div>
                                                        </div>
                                                        <div class="col-md-6">
                                                        <?php echo $post['a_name']; ?>
                                                            </span>
                                                        </div>
                                                    </div>

                                            
                                                    <div class="row  detail_row">
                                                    <div class="col-sm-6">
                                                <div class="form-section">Adresse</div>
                                            </div>
                                            <div class="col-md-6">
                                                        <?php echo $post['a_address']; ?>
                                                            </span>
                                                        </div>
                                                    </div>


                                            
                                                <div class="row  detail_row">
                                                <div class="col-sm-6">
                                                <div class="form-section">Postnr</div>
                                            </div>
                                            <div class="col-md-6">
                                                    <?php echo $post['a_postalcode']; ?>
                                                    </div>
                                                </div>


                                                    <!--/span-->
                                                    <div class="row  detail_row">
                                                    <div class="col-sm-6">
                                                <div class="form-section">Sted</div>
                                            </div>
                                            <div class="col-md-6">
                                                            <?php echo $post['a_place']; ?>
                                                            </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="row  detail_row">
                                                    <div class="col-sm-6">
                                                <div class="form-section">Kontonr.</div>
                                            </div>
                                            <div class="col-md-6">
                                                            <?php echo $post['a_account']; ?>
                                                            </div>
                                                    </div>
                                    <!--/span-->
                                    <div class="row  detail_row">
                                    <div class="col-sm-6">
                                                <div class="form-section">Beløp</div>
                                            </div>
                                            <div class="col-md-6">
                                            <?php echo $post['belop']; ?>
                                            </div>
                                    </div>
                                    <!--/span-->
                                    <div class="row  detail_row">
                                    <div class="col-sm-6">
                                                <div class="form-section">Melding</div>
                                            </div>
                                            <div class="col-md-6">
                                            <?php echo $post['message']; ?>
                                            </div>
                                    </div>
                                    <!--/span-->
                                    <div class="row  detail_row">
                                    <div class="col-sm-6">
                                                <div class="form-section">Forfalldato</div>
                                            </div>
                                            <div class="col-md-6">
                                            <?php echo $post['due_date']; ?>
                                            </div>
                                    </div>
                                    <!--/span-->
                                    <div class="row  detail_row">
                                    <div class="col-sm-6">
                                                <div class="form-section">KID</div>
                                            </div>
                                            <div class="col-md-6">
                                            <?php echo $post['kid']; ?>
                                            </div>
                                    </div>

                                   
                                     


                                    



                                </div>
                           
                        
                            </div>
                        
                        <!-- END FORM-->
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
        <!-- END PAGE CONTENT-->
<!--    </div>-->
</div>
</div>


