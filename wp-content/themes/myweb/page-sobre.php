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

	<?php endwhile; ?>

	<?php get_template_part( 'content-depoimentos' ); ?>

<?php get_footer(); ?>