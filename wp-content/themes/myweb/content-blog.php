<li class="col-4">
	<a href="<?php the_permalink(); ?>">

		<?php
			$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail' ); 

			if($imagem[0]){ ?>
				<img src="<?php echo $imagem[0]; ?>" alt="<?php the_title(); ?>">
			<?php }
		?>

		<div class="cont">
			<span class="title"><?php the_title(); ?></span>
			<span class="data"><?php the_date(); ?></span>
		</div>
	</a>
</li>