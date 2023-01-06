<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">
    <meta name="description" content="Site for PSD2CSS">
    <?php wp_head(); ?>
    <?php wp_scripts(); ?>
</head>
<body <?php echo body_class(); ?>>
    <header class="site-header">
        <nav class="site-header--menu container">
            <a href="<?php echo get_home_url(); ?>">
                <img src="<?php echo esc_url( wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' )[0] ); ?>" alt="logo">
            </a>
        </nav>
    </header>