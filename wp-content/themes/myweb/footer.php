	<?php //get_template_part( 'content-contato' ); ?>

	<footer class="footer">
		<div class="container">
			
			<p class="copy"><i class="fa fa-copyright"></i> <?php echo date('Y'); ?>. Todos os direitos reservados.</p>

			<ul class="menu-footer">
				<li class="<?php if(is_front_page()){ echo 'active'; } ?>"><a href="<?php echo get_permalink(get_page_by_path('home')); ?>" title="home">home</a></li>
				<li><a class="<?php if(is_page('sobre')){ echo 'active'; } ?>" href="<?php echo get_permalink(get_page_by_path('sobre')); ?>" title="">sobre</a></li>
				<li><a href="javascript:" title="">mentoria</a></li>
				<li><a href="javascript:" title="">recomendações</a></li>
				<li><a href="javascript:" title="">blog</a></li>
				<li><a href="javascript:" title="">contato</a></li>
			</ul>
		</div>
	</footer>

	<?php wp_footer(); ?>

</body>
</html>