<section class="blog-wrapper blog-grid-page" style="Margin-top:5%;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12" style="text-align:center;Margin-bottom:3%;">
                <div class="sec-heading">
                    <p class="sec__meta"></p>
                    <h2 class="sec__title"><?= $this->lang->line('text_nyheter'); ?></h2>
                </div><!-- end sec-heading -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="blog-grid">
            <?php 
            if(!empty($list)){
                foreach($list as $key=> $value): 
                $slug = $value['url_slug'];
            ?>
            <div class="blog">
                <div class="blog-img-box">
                    <img src="<?php echo UPLOAD_FRONT_NEWS.$value['image']; ?>" alt="Blog">
                    <div class="blog-overlay">
                        <a href="<?php echo BASE_URL.'nyheter/'.$slug; ?>">
                            <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" class="icon" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="blog-content-box">
                    <span class="blog-meta"><?php echo date("d M, Y", strtotime($value['date'])); ?>  By 
                        <a href="<?php echo BASE_URL.'nyheter/'.$slug; ?>"><?php echo $value['author']; ?></a>
                    </span>
                    <a href="<?php echo BASE_URL.'nyheter/'.$slug; ?>">
                        <h2 style="color: #233d63;" class="blog-title"><?php echo $value['title']; ?></h2>
                    </a>
                    <p class="blog-desc" style="color: #677286;"><?php echo $value['short_desc'] ?></p>
                    <div class="blog-footer">
                        <a class="theme-button" href="<?php echo BASE_URL.'nyheter/'.$slug; ?>" style="color: #be1e3c;">Read More 
                            <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" class="icon" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach;
            }else{
                echo $this->lang->line('text_no_news');;
            } ?>
        </div>    
    </div><!-- end container -->
</section><!-- end team-area -->