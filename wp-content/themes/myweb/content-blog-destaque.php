<!-- resumo page -->
<section class="box-content no-padding blog box-resumo-page">
	
	<div class="row">

		<?php
			$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); 
		?>

		<div class="col-6 imagem" style="background-image: url('<?php if($imagem[0]){ echo $imagem[0]; } ?>');"></div>
		
		<div class="col-4 texto">

			<div class="middle">
				<h5 class="col-12">destaque</h5>
				<h2 class="col-12"><?php the_title(); ?></h2>

				<div class="resumo-footer">
					<?php the_excerpt(); ?>
					<p class=""><a class="button mini" href="<?php the_permalink(); ?>" title="leia mais">leia mais</a></p>
				</div>
			</div>

		</div>

	</div>

</section>