<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bonheur+Royale&display=swap" rel="stylesheet">
        <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> style="font-family:dank Mono">
        <header class="header">
                <!-- navbar -->
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="container-fluid">
                                <a class="navbar-brand" href="#">Optimum</a>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                        aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                                                <li class="nav-item">
                                                        <a class="nav-link active" aria-current="page"
                                                                href="/dashboard/www/ecf-6-hne/">Accueil</a>
                                                </li>
                                                <!-- <li class="nav-item">
                                                        <a class="nav-link" href="#">Les cours</a>
                                                </li>
                                                <li class="nav-item">
                                                        <a class="nav-link" href="#">Les offres</a>
                                                </li> -->
                                                <li class="nav-item">
                                                        <a class="nav-link" href="/dashboard/www/ecf-6-hne/contact/">Contact</a>
                                                </li>
                                                <!-- <li class="nav-item">
                                                        <a class="nav-link" href="#">Réservation</a>
                                                </li> -->
                                        </ul>
                                       
                                </div>
                        </div>
                </nav>
                <a href="<?php echo home_url( '/' ); ?>">
                        <img class="img-fluid"
                                src="<?php echo get_template_directory_uri(); ?>/../public/image/xl_lotus-class.jpg"
                                alt="xl_lotus-class">
                </a>
        </header>
        <div class="container">