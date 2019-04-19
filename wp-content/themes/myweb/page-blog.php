<?php get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content-header' ); ?>

	<?php endwhile; ?>

	<?php

		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		if($paged == 1){ $posts_per_page = 19; }else{ $posts_per_page = 21; }
		$args = array( 'post_type' => 'post', 'orderby' => 'post_date', 'order' => 'DESC', 'posts_per_page' => $posts_per_page, 'paged' => $paged );

					if($paged != 1){ ?>
						<section class="box-content blog no-padding">
							<div class="container">

								<div class="row">
									
									<ul class="blog-list list-categoria">
					<?php }

	    $wp_query = new WP_Query($args);

        if(count($wp_query->posts) > 0){

        	$qtd_post = count($wp_query->posts);
        	$count_post = 0;

			while ( have_posts() ) : the_post();
				$count_post = $count_post+1;

				if(($count_post == 1) and ($paged == 1)){
					get_template_part( 'content-blog-destaque' );
				}else{ ?>

					<?php if(($paged == 1) and $count_post == 2){ ?>
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

<?php get_footer(); ?>