<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
?><!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Updraft</title>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/styles/header.css">
    <script src="<?php echo get_template_directory_uri(); ?>/scripts/script.js" defer></script>
    <?php wp_head(); ?>
</head>
<body>
    <header>
        <div class="wrapper">
            <a href="#" class="wrapper-logo" aria-label="Home">
                <!-- Optionally add a logo image here -->
                <span style="font-weight:700;font-size:1.5rem;color:#222;letter-spacing:1px;">Updraft</span>
            </a>
            <nav>
                <a href="#">Home</a>
                <a href="#">Foto</a>
                <a href="#">Práce</a>
            </nav>
            <button class="wrapper-hamburger" aria-label="Menu" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </header>
    <?php wp_footer(); ?>
</body>
    <main class="site-main">
