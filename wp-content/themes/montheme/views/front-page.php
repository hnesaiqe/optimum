f.page
<?php get_header(); ?>
<div class="container">
        <div class="row text-center ">
                <h1 class="m-5">Bienvenue</h1>
                <p class="mb-5">C'est avec joie que j'observe comment la rivière de votre Source grandit de plus en plus fort. Je
                        suis éternellement reconnaissante d'en avoir bu. Je vous souhaite plein de beaux courants
                        espiègles pour les temps à venir. - K.S. 9/1/16</p>
                <hr>
                <div class="col-8 d-flex">
                        <div class="col-12 row">
                                <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
                                <article class="card m-3 p-0 mx-auto col-6" style="width: 18rem;">
                                        <img src="<?php echo get_template_directory_uri(); ?>/../public/image/yoga.jpg"
                                                class="card-img-top" alt="...">
                                        <div class="card-body">
                                                <h5 class="card-title">
                                                        <?php the_title(); ?></h5>
                                                <!-- <p class="card-text"><?php the_post_thumbnail(); ?>
                                                        <small class="card-subtitle mb-2 text-muted">
                                                                <p class="post__meta">
                                                                        Publié le
                                                                        <?php the_time( get_option( 'date_format' ) ); ?>
                                                                        par <?php the_author(); ?> •
                                                                        <?php comments_number(); ?>
                                                                </p>
                                                        </small>
                                                        <?php the_excerpt(); ?>
                                                </p> -->
                                                <p>
                                                        <a href="<?php the_permalink(); ?>" class="post__link">
                                                                Y aller
                                                        </a>
                                                </p>
                                        </div>
                                </article>
                                <?php endwhile; endif; ?>
                        </div>
                </div>
                <div class="slideBar col-4 border-left bg-light my-3">
                        <?php get_sidebar(); ?>
                </div>
        </div>
</div>
<?php get_footer(); ?>