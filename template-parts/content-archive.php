<article>

    <div class="container">
        <div class="post mb-5">

            <img class="mr-3 img-fluid post-thumb" src="<?php the_post_thumbnail_url(); ?>" alt="Test">
            <!-- <img class="mr-3 img-fluid post-thumb" src="/wp-content/themes/minhle/images/mina-myoi.jpeg" alt="Test"> -->
        </div>
        <div class="media-body">
            <h3 class="title mb-1">
                <?php the_title(); ?>
            </h3>
            <div class="neta mb-1">
                <span class="date">
                    <?php the_date(); ?>
                </span>
                <span class="comment">
                    <?php comments_number(); ?>
                </span>

                <div class="intro">
                    <?php the_excerpt(); ?>
                </div>
                <a class="btn btn-primary" href="<?php the_permalink(); ?>" title="Read more">Read more</a>
            </div>
        </div>
    </div>

</article>