	<?php get_template_part( 'content-contato' ); ?>

	<footer class="footer">
		<div class="container">
			
			<p class="copy"><i class="fa fa-copyright"></i> <?php echo date('Y'); ?>. Todos os direitos reservados.</p>

			<ul class="menu-footer">
					<li class="<?php if(is_front_page()){ echo 'active'; } ?>"><a href="<?php echo get_permalink(get_page_by_path('home')); ?>" title="home">home</a></li>
					<li class="<?php if(is_page('sobre')){ echo 'active'; } ?>"><a href="<?php echo get_permalink(get_page_by_path('sobre')); ?>" title="">sobre</a></li>
					<li class="<?php if(is_page('metodologia')){ echo 'active'; } ?>"><a href="<?php echo get_permalink(get_page_by_path('metodologia')); ?>" title="">metodologia</a></li>
					<li class="<?php if(is_page('recomendacoes')){ echo 'active'; } ?>"><a href="<?php echo get_permalink(get_page_by_path('recomendacoes')); ?>" title="">recomendações</a></li>
					<li class="<?php if((is_category('blog')) or (is_single())){ echo 'active'; } ?>"><a href="<?php echo get_category_link(get_cat_ID('blog')); ?>" title="">blog</a></li>
					<li class="<?php if(is_page('contato')){ echo 'active'; } ?>"><a href="<?php echo get_permalink(get_page_by_path('contato')); ?>" title="">contato</a></li>
			</ul>
		</div>
	</footer>

	<?php wp_footer(); ?>

</body>
</html>