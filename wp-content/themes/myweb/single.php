<?php get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content-header' ); ?>

		<?php if(get_the_content()){ ?>
			<section class="box-content cinza">
				<div class="container">
					
					<div class="row">
						<div class="col-10 mlleft mlright content">
							<?php the_content(); ?>
						</div>
					</div>

				</div>
			</section>
		<?php } ?>

	<?php endwhile; ?>

	<?php //get_template_part( 'content-depoimentos' ); ?>

<?php get_footer(); ?>