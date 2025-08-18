<section class="blog-details-wrapper" style="Margin-top:5%;">
    <div class="container">
        <div class="blog-details-grid d-grid">
            <div class="blog-details-left">
                <div class="blog-details-img-box">
                    <img src="<?php echo UPLOAD_FRONT_NEWS.$news['image']; ?>" alt="Blog Details">
                </div>
                <div class="blog-details-contents">
                    <span class="blog-details-meta d-flex"><?php echo date("d M, Y", strtotime($news['date'])); ?> by 
                        <a><?php echo $news['author']; ?></a>
                    </span>
                    <h2><?php echo $news['title']; ?></h2>
                    <blockquote class="block-quote"><p><?php echo $news['short_desc']; ?></p>
            
                    </blockquote>
                    <p style="color: #677286;"><?php echo $news['long_desc']; ?></p>
                </div>
            </div>
        </div>
    </div>
</section>






















