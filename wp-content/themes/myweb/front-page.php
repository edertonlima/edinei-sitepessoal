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


<?php //get_template_part( 'content-quem-somos' ); ?>


<?php get_footer(); ?>