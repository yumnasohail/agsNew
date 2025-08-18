<section class="" style="margin-top:10%;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-content" style="text-align:center;">
                    <h2 class="breadcrumb__title"><?= $this->lang->line('text_corporate_title'); ?></h2>
                    <p><?= $this->lang->line('text_corporate_sub_heading'); ?></p>
                </div><!-- end breadcrumb-content -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end breadcrumb-area -->
<section class="blog-area case-area case-area2 single-case" >
    <div class="container">
        <div class="row blog-post-wrapper">
            <div class="col-lg-4">
                
                <div class="sidebar mt-0">
                    <div class="sidebar-widget contact-widget">
                        <h3 class="widget__title"><?= $this->lang->line('text_interest'); ?></h3>
                        <p><?= $this->lang->line('text_informasjon'); ?></p>
                        <ul class="contact__links">
                            <li>
                                <i class="fa fa-user"></i>
                                Lars-Petter Myklebost
                            </li>
                            <li>
                                <i class="fa fa-phone"></i>
                                <a href="tel:484 04 100">484 04 100</a>
                            </li>
                            <li>
                                <i class="fa fa-envelope"></i>
                                <a href="mailto: lpm@agsforsikring.no"> lpm@agsforsikring.no</a>
                            </li>
                        </ul>
                    </div>
                </div><!-- end sidebar -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-8">
                <div class="blog-post-item">
                    <div class="blog-post-img single-case-slider">
                        <div class="single-case-item">
                            <a >
                                <img src="<?php echo STATIC_FRONT_IMAGE.'corporate.jpeg' ?>" alt="blog image" class="blog__img">
                            </a>
                        </div>
                    </div><!-- end blog-post-img -->
                    <div class="blog-post-body">
<p class="blog__desc">
<?= $this->lang->line('text_corporate_line1'); ?>  </p>                      
                    </div><!-- end blog-post-body -->
                </div><!-- end blog-post-item -->
            </div><!-- end col-lg-8 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end blog-area -->