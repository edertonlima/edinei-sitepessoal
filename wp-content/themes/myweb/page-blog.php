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

	<?php

		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$args = array( 'post_type' => 'post', 'paged' => $paged );

	    /*$getPosts = array(
	        'posts_per_page' => 2,
	        'paged' => $paged,
	        'post_type'   => 'post',
	        'post_status' => 'any'
	    );*/

	    $wp_query = new WP_Query($args);

        if(count($wp_query->posts) > 0){

        	$qtd_post = count($wp_query->posts);
        	$count_post = 0;

			while ( have_posts() ) : the_post();
				$count_post = $count_post+1;

				if($count_post == 1){
					get_template_part( 'content-blog-destaque' );
				}else{ ?>

					<?php if($count_post == 2){ ?>
						<section class="box-content blog no-padding-bottom">
							<div class="container">

								<div class="row">
									
									<ul class="blog-list list-categoria">
					<?php } ?>

										<?php get_template_part( 'content-blog' ); ?>

					<?php if($qtd_post == $count_post){ ?>
									</ul>

								</div>

							</div>
						</section>
					<?php } ?>

				<?php }

			endwhile;

			paginacao();

		}
	?>	

<?php /*

<section class="box-content sombra">

	<div class="container">
		<div class="row">

			<?php 
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$args = array( 'post_type' => 'post', 'posts_per_page' => 1, 'paged' => $paged );
			$wp_query = new WP_Query($args);

			while ( have_posts() ) : the_post();

				get_template_part( 'content-list-blog', get_post_format() );

			endwhile; ?>

		</div>
	</div>

</section>

<?php  ?>
*/ ?>






<?php get_footer(); ?>