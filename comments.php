<section id="abdullah-yildirim">
    <?php
        if (have_comments()) {
            get_comments_number() . " Kommentare";
        } else {
            echo "Hinterlassen Sie bitte eine Nachricht!";
        }
    ?>
</section>

<section>
    <?php 
        wp_list_comments(
            array(
                "avatar_size" => 60,
                "style" => "div"
            )
        );
    ?>
</section>

<div>
    <?php if ( comments_open() ) {
        comment_form(
            array(
                "class_form" => "",
                "title_reply_before" => "<span>",
                "title_reply_after" => "</span>"

            )
        );
    } ?>
</div>