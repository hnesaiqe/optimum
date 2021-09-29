single
<?php get_header(); ?>
	<div class="container mt-3">
		<div class="row">
			<div class="col-8">
				<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

				<article class="post">
					<?php the_post_thumbnail(); ?>

					<h1 class="text-dark text-center"><?php the_title(); ?></h1>

					<div class="post__content">
                                                <?php the_content(); ?>
					</div>
                                        <div class="post__meta">
                                                <?php echo get_avatar( get_the_author_meta( 'ID' ), 40 ); ?>
                                                <p>
                                                        Publié le <?php the_date(); ?>
                                                        par <?php the_author(); ?>
                                                </p>
                                        </div>
				</article>
				<?php endwhile; endif; ?>
			</div>
			<div class="slideBar col-4 border-left bg-light">    
				<?php get_sidebar(); ?>	
			</div>
		</div>
	</div>  
  <?php get_footer();?>