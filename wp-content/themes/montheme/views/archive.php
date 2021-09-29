archive
<?php get_header(); ?>
<div class="container">
        <div class="row text-center">
                <div class="col-8">
                        <h1 class="text-dark"><?php the_category(); ?></h1>

                        <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

                        <article class="post">
                                <h2><?php the_title(); ?></h2>

                                <?php the_post_thumbnail(); ?>

                                <p class="post__meta">
                                        Publié le <?php the_time( get_option( 'date_format' ) ); ?>
                                        par <?php the_author(); ?> • <?php comments_number(); ?>
                                </p>

                                <?php the_excerpt(); ?>

                                <p>
                                        <a href="<?php the_permalink(); ?>" class="post__link">Lire la suite</a>
                                </p>
                        </article>

                        <?php endwhile; endif; ?>
                </div>
                <div class="slideBar col-4 border-left bg-light my-3">
                        <?php get_sidebar(); ?>
                </div>
        </div>
</div>
<?php get_footer(); ?>