<?php // print_r($post['title']); exit(); ?>

<h4 ><b>Title:&nbsp;&nbsp;</b></h4><?php echo $post['title']; ?>
<h4 ><b>Category:&nbsp;&nbsp;</b></h4><?php echo $post['cat_name']; ?>

<div class="page-content-wrapper">
<?php // print_r($post['title']);exit; ?>
        <!-- END PAGE HEADER-->
       
        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box blue">
                    <div class="portlet-title">

                       
                    </div>
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                       
                            <div class="form-body">                               

                                    <h4 class="form-section">Date</h4>
                           
                                    <div class="row">
                                        <div class="col-sm-12">
                                                <?php echo format_date($post['post_date']); ?>
                                            </span>
                                        </div>
                                    </div>

                                <h4 class="form-section">Status</h4>
                           
                                    <div class="row">
                                        <div class="col-sm-12">
                                                <?php echo ($post['post_date']==1)? 'Active': 'Inactive'; ?>
                                            </span>
                                        </div>
                                    </div>


                                <h4 class="form-section">Short Description</h4>
                           
                                <div class="row">
                                    <div class="col-sm-8">
                                            <?php if(isset($post['short_desc']) && $post['short_desc'])
                                                echo $post['short_desc'];
                                            else
                                                echo "Nill";
                                            ?>
                                    </div>

                                    <div class="col-sm-4">
                                    <h4 class="form-section">Image</h4>
                                            <?php
                                            $item_img = base_url() . "static/admin/theme1/image/no_item_image_small.jpg";
                                            if (!empty($post['image']) && file_exists(FCPATH . SMALL_POST_IMAGE_PATH . $post['image']))

                                                $item_img = IMAGE_BASE_URL . 'post/small_images/' . $post['image'];
                                            ?>
                                            <img src="<?= $item_img ?>"/>
                                           
                                    </div>

                                </div>


                                  <h4 class="form-section">Full Description</h4>
                                    <!--/span-->
                                    <div class="row">
                                            <div class="col-md-12">
                                                    <?php if(isset($post['long_desc']) && !empty($post['long_desc']))
                                                        echo $post['long_desc'];
                                                    else
                                                        echo "Nill";
                                                    ?>
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


