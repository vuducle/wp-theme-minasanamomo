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
                <h1>Seite nicht gefunden</h1>

                <?php get_search_form(); ?>
            </div>
        </div>
    </main>


    <?php get_footer(); ?>