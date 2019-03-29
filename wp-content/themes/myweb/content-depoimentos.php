<?php
    $getPosts = array(
        'posts_per_page' => 20,
        'post_type'   => 'depoimentos',
        'post_status' => 'any'/*,
		'tax_query' => array(
		    array(
		        'taxonomy' => 'categoria_produto',
		        'terms' => $category->term_id,
		        'include_children' => false,
		        'operator' => 'IN'
		    )
		),*/
    );
    $posts = new WP_Query( $getPosts );
    if(count($posts->posts) > 0){ 
    	$slide = 0; ?>

		<section class="box-content no-padding box-depoimentos">
			<div class="row">
				
				<div class="col-12 imagem" style="background-image: url('<?php the_field('imagem_depoimentos','option'); ?>');">
					<div class="container">
						<div class="texto">

							<div class="middle">
								<h5 class="col-12">depoimentos</h5>
								<h2 class="col-12"><?php the_field('titulo_depoimentos','option'); ?></h2>

								<div class="carousel slide depoimentos-slide" data-ride="carousel" data-interval="50000" id="depoimentos-slide">
									<div class="carousel-inner" role="listbox">

										<?php while($posts->have_posts()) : $posts->the_post(); 
											$slide = $slide+1;
											$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>

											<div class="item resumo-footer <?php if($slide == 1){ echo 'active'; } ?>">
												<div class="depoimentos">
													<?php the_content(); ?>
												</div>

												<?php if($imagem[0]){ ?>
													<img src="<?php echo $imagem[0]; ?>" alt="<?php the_title(); ?>" class="avatar">
												<?php } ?>

												<span class="nome"><?php the_title(); ?></span>
												<span class="funcao"><?php echo get_the_excerpt(); ?></span>
											</div>

										<?php endwhile; ?>

									</div>

									<a class="carousel-control-prev" href="#depoimentos-slide" role="button" data-slide="prev">
										<i class="fas fa-chevron-left"></i>
									</a>
									<a class="carousel-control-next" href="#depoimentos-slide" role="button" data-slide="next">
										<i class="fas fa-chevron-right"></i>
									</a>  
								</div>

							</div>

						</div>
					</div>

				</div>

			</div>
		</section>

	<?php }
?>