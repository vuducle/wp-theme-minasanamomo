<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php get_header(); ?>

    <main>
        <div class="container">
            <div class="col">
                <h1>
                    <?php the_title(); ?>
                </h1>
            </div>
            <div class="col">
                <?php
                if (have_posts()) {
                    while (have_posts()) {
                        the_post();

                        get_template_part("template-parts/content", "archive");
                    }
                }
                ?>

                <?php the_posts_pagination(); ?>
            </div>
        </div>
    </main>


    <?php get_footer(); ?>