<article>
    <div>
        <span>
            <?php the_date(); ?>
        </span>
        <?php the_tags(
            '<span class="tag"><i></i>',
            '</span><span class="tag"><i></i>',
            '</span>'
        ); ?>

        <?php comments_number(); ?>
    </div>
    <?php

    the_content();

    ?>

    <?php comments_template(); ?>
</article>