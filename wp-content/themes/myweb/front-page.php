<?php get_header(); ?>


<!-- slide -->
<section class="box-content no-padding">
	<div class="slide">
		<div class="carousel slide" data-ride="carousel" data-interval="6000" id="slide">

			<div class="carousel-inner" role="listbox">

				<?php if( have_rows('slide') ):
					$slide = 0;
					while ( have_rows('slide') ) : the_row();
						$slide = $slide+1;

						if(get_sub_field('video')){ ?>

							<div class="item video <?php if($slide == 1){ echo 'active'; } ?>">
								<video autoplay="true" loop="true" muted="true">
									<source src="<?php the_sub_field('video'); ?>" type="video/mp4">
								</video>
							</div>

						<?php }else{

							if(get_sub_field('imagem')){ ?>

								<div class="item <?php if($slide == 1){ echo 'active'; } ?>" style="background-image: url('<?php the_sub_field('imagem'); ?>');">

									<?php if(get_sub_field('texto')){ ?>
										<div class="box-height">
											<div class="box-texto">
												
												<p class="texto"><?php the_sub_field('texto'); ?></p>

												<?php if(get_sub_field('sub_texto')){ ?>
													<p class="sub-texto"><?php the_sub_field('sub_texto'); ?></p>
												<?php } ?>

												<?php if(get_sub_field('links')){ 
													$link = get_sub_field('links'); ?>

													<p><a href="<?php echo get_permalink($link[0]); ?>" class="button" title="">
														
														<?php if(get_sub_field('texto_do_botao')){ ?>
															<?php the_sub_field('texto_do_botao'); ?>
														<?php }else{ ?>
															Saiba Mais
														<?php } ?>

													</a></p>
												<?php } ?>

											</div>
										</div>
									<?php } ?>
									
								</div>

							<?php }

						}
					endwhile;
				endif; ?>

			</div>

			<ol class="carousel-indicators">
				<?php if($slide > 1){ ?>

					<?php for($i=0; $i<$slide; $i++){ ?>
						<li data-target="#slide" data-slide-to="<?php echo $i; ?>" class="<?php if($i == 0){ echo 'active'; } ?>"></li>
					<?php } ?>
				<?php } ?>
			</ol>

		</div>
	</div>
</section>


<!-- item ícone -->
<section class="box-content">
	<div class="container">
		
		<h5><?php the_field('subtitulo_home_sobre',get_page_by_path('sobre')); ?></h5>
		<h2><?php the_field('titulo_home_sobre',get_page_by_path('sobre')); ?></h2>
		<p class="sub-h2"><?php the_field('descricao_home_sobre',get_page_by_path('sobre')); ?></p>

		<ul class="item-ico row">

			<?php if( have_rows('blocos_home_sobre',get_page_by_path('sobre')) ):
				while ( have_rows('blocos_home_sobre',get_page_by_path('sobre')) ) : the_row(); ?>

					<li class="col-4">
						<h4><?php the_sub_field('icone_blocos_home_sobre'); ?> <?php the_sub_field('titulo_blocos_home_sobre'); ?></h4>
						<p><?php the_sub_field('descricao_blocos_home_sobre'); ?></p>
					</li>

				<?php endwhile;
			endif; ?>

		</ul>

	</div> 
</section>


<!-- resumo page -->
<section class="box-content no-padding-top box-resumo-page">
	<div class="container">

		<div class="row">
			
			<?php
				$imagem = wp_get_attachment_image_src( get_post_thumbnail_id(get_page_by_path('sobre')), 'large' ); 

				if($imagem[0]){ ?>
					<div class="col-6 imagem" style="background-image: url('<?php echo $imagem[0]; ?>');"></div>
				<?php }
			?>
			
			<div class="col-<?php if(!$imagem[0]){ echo '12'; }else{ echo '6'; } ?> texto">

				<div class="middle">
					<h5 class="col-12"><?php echo get_the_title(get_page_by_path('sobre')); ?></h5>
					<h2 class="col-12"><?php the_field('titulo',get_page_by_path('sobre')); ?></h2>

					<div class="resumo-footer">
						<p class=""><?php the_field('descricao',get_page_by_path('sobre')); ?></p>
						<p class=""><a class="button mini" href="<?php echo get_permalink(get_page_by_path('sobre')); ?>" title="CONHEÇA-NOS">CONHEÇA-NOS</a></p>
					</div>
				</div>

			</div>

		</div>

	</div>
</section>


<!-- destaque -->
<?php if(get_field('imagem_destaque')){ ?>
	<section class="box-content no-padding box-destaque">
		<div class="row">
			
			<div class="col-12 imagem" style="background-image: url('<?php the_field('imagem_destaque'); ?>');">
				<div class="container">
					<div class="texto">

						<div class="middle">
							<h2 class="col-12"><?php the_field('titulo_destaque'); ?></h2>

							<div class="resumo-footer">
								<p class=""><?php the_field('subtitulo_destaque'); ?></p>

								<?php if(get_field('link_destaque')){ 
										if(get_field('texto_link_destaque')){
											$txt_link =  get_field('texto_link_destaque');
										}else{
											$txt_link = 'SAIBA MAIS';
										}
									?>
									
										<a class="button" href="<?php the_field('link_destaque'); ?>" title="<?php echo $txt_link; ?>">
											<?php echo $txt_link; ?>
										</a>
									
								<?php } ?>
							</div>
						</div>

					</div>
				</div>

			</div>

		</div>
	</section>
<?php } ?>

<!-- BLOG -->
<!-- mini resumo page -->
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
	    $getPosts = array(
	        'posts_per_page' => 4,
	        'post_type'   => 'post',
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

        	$qtd_post = count($posts->posts);
        	$count_post = 0;
			while($posts->have_posts()) : $posts->the_post();
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

		}
	?>

<?php get_template_part( 'content-depoimentos' ); ?>

<?php get_footer(); ?>