<div class="page-content-wrapper">
<?php ?>
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box blue">
                    <div class="portlet-title">

                       
                    </div>
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                       
                            <div class="form-body">                               

                                    <h4 class="form-section">Name</h4>
                           
                                    <div class="row">
                                        <div class="col-sm-12">
                                                <?php echo format_date($post['title']); ?>
                                            </span>
                                        </div>
                                    </div>

                                <h4 class="form-section">Short Title</h4>
                           
                                    <div class="row">
                                        <div class="col-sm-12">
                                                <?php echo ($post['name']==1)? 'Active': 'Inactive'; ?>
                                            </span>
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


