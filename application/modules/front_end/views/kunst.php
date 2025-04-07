<section class="" style="margin-top:10%;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-content" style="text-align:center;">
                    <h2 class="breadcrumb__title"><?= $this->lang->line('text_kunst_heading'); ?> </h2>
                    <p><?= $this->lang->line('text_kunst_sub_heading'); ?></p>
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
                        <p><?= $this->lang->line('text_kontakt_oss'); ?></p>
                        <ul class="contact__links">
                            <li>
                                <i class="fa fa-user"></i>
                                Camilla B. Myhre<br><?= $this->lang->line('text_Seniorrådgiver'); ?>
                            </li>
                            <li>
                                <i class="fa fa-phone"></i>
                                <a href="tel:+47 48 40 41 47">+47 48 40 41 47</a>
                            </li>
                            <li>
                                <i class="fa fa-envelope"></i>
                                <a href="mailto: cm@agsforsikring.no"> cm@agsforsikring.no</a>
                            </li>
                        </ul>
                        <br>
                        <p>eller</p>
                        <br>
                        <ul class="contact__links">
                            <li>
                                <i class="fa fa-user"></i>
                                Kerstin Wollan<br><?= $this->lang->line('text_Seniorkonsulent'); ?>
                            </li>
                            <li>
                                <i class="fa fa-phone"></i>
                                <a href="tel:+47 90 59 68 16">+47 90 59 68 16</a>
                            </li>
                            <li>
                                <i class="fa fa-envelope"></i>
                                <a href="mailto:kw@agsforsikring.no"> kw@agsforsikring.no</a>
                            </li>
                        </ul>
                        <h3 class="widget__title"><?= $this->lang->line('text_SKADEMELDING'); ?></h3>
                        <p><?= $this->lang->line('text_Vennligst'); ?></p>
                        <ul class="contact__links">
                            <li>
                                <i class="fa fa-map-marker"></i>
                                Sedgwick Norway AS,
                            </li>
                            <li>
                                <i class="fa fa-phone"></i>
                                <a href="tel:+ 47 64 80 80 72">+ 47 64 80 80 72</a>
                            </li>
                            <li>
                                <i class="fa fa-phone"></i>
                                <a href="tel:+ 47 45 43 21 58">+ 47 45 43 21 58</a>
                            </li>
                            <li>
                                <i class="fa fa-envelope"></i>
                                <a href="mailto:waldemar.rode@no.sedgwick.com"> waldemar.rode@no.sedgwick.com</a>
                            </li>
                        </ul>
                        <br>
                        <p><a href="<?php echo STATIC_FRONT_IMAGE.'Fine Art Claims Form.docx'?>" target="_blank" ><?= $this->lang->line('text_last_ned'); ?></a></p>
                    </div>
                </div><!-- end sidebar -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-8">
                <div class="blog-post-item">
                    <div class="blog-post-img single-case-slider">
                        <div class="single-case-item">
                            <a >
                                <img src="<?php echo STATIC_FRONT_IMAGE.'segment_art.jpg' ?>" alt="blog image" class="blog__img">
                            </a>
                        </div>
                    </div><!-- end blog-post-img -->
                    <div class="blog-post-body">
                        <p class="blog__desc">
                        <?= $this->lang->line('text_kunst_line1'); ?><br>
                        <?= $this->lang->line('text_kunst_line2'); ?></p>
                        
                    </div><!-- end blog-post-body -->
                </div><!-- end blog-post-item -->
            </div><!-- end col-lg-8 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end blog-area -->