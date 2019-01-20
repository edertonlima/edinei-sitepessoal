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
		
		<h5>somos o que você procura</h5>
		<h2>Grandes Ideias Pequenos Custos</h2>
		<p class="sub-h2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean scelerisque pulvinar turpis, sit amet maximus dolor ullamcorper eu. Nullam mattis leo neque</p>

		<ul class="item-ico row">
			<li class="col-4">
				<h4><i class="fas fa-comments"></i> Lorem ipsum dolor</h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean scelerisque pulvinar turpis, sit amet maximus dolor ullamcorper eu.</p>
			</li>

			<li class="col-4">
				<h4><i class="fas fa-wifi"></i> Lorem ipsum dolor</h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean scelerisque pulvinar turpis, sit amet maximus dolor ullamcorper eu.</p>
			</li>

			<li class="col-4">
				<h4><i class="fas fa-search"></i> Lorem ipsum dolor</h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean scelerisque pulvinar turpis, sit amet maximus dolor ullamcorper eu.</p>
			</li>

			<li class="col-4">
				<h4><i class="fas fa-comments"></i> Lorem ipsum dolor</h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean scelerisque pulvinar turpis, sit amet maximus dolor ullamcorper eu.</p>
			</li>

			<li class="col-4">
				<h4><i class="fas fa-wifi"></i> Lorem ipsum dolor</h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean scelerisque pulvinar turpis, sit amet maximus dolor ullamcorper eu.</p>
			</li>

			<li class="col-4">
				<h4><i class="fas fa-search"></i> Lorem ipsum dolor</h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean scelerisque pulvinar turpis, sit amet maximus dolor ullamcorper eu.</p>
			</li>	
		</ul>

	</div> 
</section>


<!-- resumo page -->
<section class="box-content no-padding-top box-resumo-page">
	<div class="container">

		<div class="row">
			
			<div class="col-6 imagem" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/quem-somos.jpg');"></div>
			<div class="col-6 texto">

				<div class="middle">
					<h5 class="col-12">sobre nós</h5>
					<h2 class="col-12">Lorem ipsum dolor sit amet consectetur</h2>

					<div class="reumo-footer">
						<p class="">Our CoWorking Space provides amazing office space to all out of the box thinkers.</p>
						<p class=""><a class="button mini" href="<?php echo get_permalink(get_page_by_path('sobre')); ?>" title="CONHEÇA-NOS">CONHEÇA-NOS</a></p>
					</div>
				</div>

			</div>

		</div>

	</div>
</section>


<!-- destaque -->
<section class="box-content no-padding box-destaque">
	<div class="row">
		
		<div class="col-12 imagem" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/home-destaque.jpg');">
			<div class="container">
				<div class="texto">

					<div class="middle">
						<h2 class="col-12">Seja Visto!<br>PRoduza conteúdo relevante</h2>

						<div class="reumo-footer">
							<p class="">Our CoWorking Space provides amazing office.</p>
							<p class=""><a class="button" href="#<?php //echo get_permalink(get_page_by_path('sobre')); ?>" title="CONHEÇA-NOS">quero contratar</a></p>
						</div>
					</div>

				</div>
			</div>

		</div>

	</div>
</section>

<!-- BLOG -->
<!-- mini resumo page -->
<section class="box-content box-mini-resumo-page">
	<div class="container">

		<div class="row">
		
			<div class="col-12 texto">

				<div class="middle">

					<div class="col-5">
						<h5 class="col-12">blog</h5>
						<h2 class="col-12">Entre, descubra e suba de nível</h2>
					</div>

					<div class="col-7">
						<div class="reumo-footer">
							<p class="">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod magna aliqua. Ut enim ad minim veniam, quis notrud exercitation ullamco aliquip ex ea comodo consequat. Duis aute irure dolor in reprehenderit.</p>
							<p class=""><a class="button mini" href="<?php echo get_permalink(get_page_by_path('sobre')); ?>" title="CONHEÇA-NOS">ver mais</a></p>
						</div>
					</div>

				</div>

			</div>

		</div>

	</div>
</section>

<!-- resumo page -->
<section class="box-content no-padding blog box-resumo-page">
	
	<div class="row">
		
		<div class="col-6 imagem" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/quem-somos.jpg');"></div>
		<div class="col-4 texto">

			<div class="middle">
				<h5 class="col-12">destaque</h5>
				<h2 class="col-12">Lorem ipsum dolor sit amet consectetur</h2>

				<div class="reumo-footer">
					<p class="">Our CoWorking Space provides amazing office space to all out of the box thinkers.</p>
					<p class=""><a class="button mini" href="<?php echo get_permalink(get_page_by_path('sobre')); ?>" title="leia mais">leia mais</a></p>
				</div>
			</div>

		</div>

	</div>

</section>

<section class="box-content blog">
	<div class="container">

		<div class="row">
			
			<ul class="blog-list">
				<li class="col-4">
					<a href="#">						
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery-1.jpg" alt="">						
						<div class="cont">
							<span class="title">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean scelerisque pulvinar turpis.</span>
							<span class="data">05 de dezembro, 2018</span>
						</div>
					</a>
				</li>

				<li class="col-4">
					<a href="#">						
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery-2.jpg" alt="">						
						<div class="cont">
							<span class="title">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean scelerisque pulvinar turpis.</span>
							<span class="data">03 de dezembro, 2018</span>
						</div>
					</a>
				</li>

				<li class="col-4">
					<a href="#">						
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery-3.jpg" alt="">						
						<div class="cont">
							<span class="title">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean scelerisque pulvinar turpis.</span>
							<span class="data">28 de novembro, 2018</span>
						</div>
					</a>
				</li>
			</ul>

		</div>

	</div>
</section>


<?php //get_template_part( 'content-quem-somos' ); ?>


<?php get_footer(); ?>