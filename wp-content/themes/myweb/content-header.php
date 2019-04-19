<!-- mini resumo page -->
<section class="box-content <?php if(!is_page('blog')){ if(!get_the_content()){ echo 'no-padding-bottom'; }} ?> box-mini-resumo-page">
	<div class="container">

		<div class="row">
		
			<div class="col-12 texto">

				<div class="middle">

					<div class="<?php if(is_page('blog')){ echo 'col-5'; }else{ if(get_field('descricao')){ echo 'col-7'; }else{ echo 'col-12'; }} ?>">
						<h5 class="col-12">
							<a href="<?php echo get_permalink(get_page_by_path('home')); ?>" title="HOME">home</a>

							<?php
								if(is_page('blog')){ ?>
									<i class="fas fa-chevron-right"></i>
									blog
								<?php }
							?>

							<?php
								if(is_single()){ ?>
									<i class="fas fa-chevron-right"></i>
									<a href="<?php echo get_home_url(); ?>/blog" title="BLOG">blog</a>
									<?php
										global $post;
										$categories = get_the_category($post->ID);
									?>
									<i class="fas fa-chevron-right"></i>
									<a href="<?php echo get_term_link($categories[0]->term_id); ?>" title="<?php echo $categories[0]->name; ?>"><?php echo $categories[0]->name; ?></a>

									<?php
										//$term = get_queried_object();
										//var_dump($term);
										//echo $term->cat_name;
										//echo 'Blog';
								}

								if(is_post_type_archive('post')){
									//$term = get_queried_object();
									//var_dump($term);
									//echo $term->cat_name;
									echo 'Blog';
								}
							?>

							<?php 
								if((!is_category('blog')) or (!is_single())){ 
									//the_title(); 
							 } ?>
							
						</h5>
						<h2 class="col-12">
							<?php if(is_single()){
								the_title();
							}else{
								the_field('titulo');
							} ?>
						</h2>
					</div>

					<?php if(get_field('descricao')){ ?>
						<div class="<?php if(is_page('blog')){ echo 'col-7'; }else{ echo 'col-5'; } ?>">
							<div class="resumo-footer">
								<p class="full"><?php the_field('descricao'); ?></p>
							</div>
						</div>
					<?php } ?>

				</div>

			</div>

			<?php /*
				$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ); 
				if($thumbnail){ ?>
					<div class="col-10 mlleft mlright content">
						<img src="<?php echo $thumbnail[0] ?>" class="img-large">
					</div>
				<?php }*/
			?>

		</div>

	</div>
</section>


<?php 
	$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); 
	if($thumbnail){ ?>
		<section class="box-content no-padding-bottom bg-image-page-header" style="background-image: url('<?php echo $thumbnail[0] ?>; ?>');"></section>
	<?php }
?>