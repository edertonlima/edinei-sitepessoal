<?php get_header(); ?>

<section class="box-content box-mini-resumo-page">
	<div class="container">

		<div class="row">
		
			<div class="col-12 texto">

				<div class="middle">

					<div class="col-5">
						<h5 class="col-12">blog</h5>
						<h2 class="col-12"><?php the_field('titulo_blog','option') ?></h2>
					</div>

					<div class="col-7">
						<div class="resumo-footer">
							<p class=""><?php the_field('texto_blog','option') ?></p>
							<p class=""><a class="button mini" href="<?php echo get_category_link(get_cat_ID('blog')); ?>" title="VER MAIS">ver mais</a></p>
						</div>
					</div>

				</div>

			</div>

		</div>

	</div>
</section>

	<?php

        if(count($wp_query->posts) > 0){

        	$qtd_post = count($wp_query->posts);
        	$count_post = 0;

			while ( have_posts() ) : the_post();
				$count_post = $count_post+1;

				if($count_post == 1){
					get_template_part( 'content-blog-destaque' );
				}else{ ?>

					<?php if($count_post == 2){ ?>
						<section class="box-content blog">
							<div class="container">

								<div class="row">
									
									<ul class="blog-list">
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