<!-- contato -->
<section class="box-content box-contato <?php if(is_page('blog')){ echo 'cinza'; } ?>">
	<div class="container">
		<div class="row">

			<div class="col-6">
				<?php if(!is_page('contato')){ ?>
					<h5 class="">Contato</h5>
					<h2 class="">Fale Conosco</h2>
				<?php } ?>

				<p>
					Blumenau, SC<br>
					<span>+55 47 98856-5685</span><br>
					<a href="mailto:contato@edtar.com.br">contato@edtar.com.br</a>				
				</p>

				<div class="redes">
					<a target="_blank" href="https://www.facebook.com/edtarconsultoria/"><i class="fab fa-facebook-f"></i></a>
					<a target="_blank" href="https://www.flickr.com/people/edtarconsultoria/"><i class="fab fa-flickr"></i></a>
					<a target="_blank" href="https://twitter.com/Edtarconsultor1"><i class="fab fa-twitter"></i></a>
					<a target="_blank" href="https://br.pinterest.com/edtarconsultoria/"><i class="fab fa-pinterest"></i></a>
					<a target="_blank" href="https://www.instagram.com/edtarconsultoria/"><i class="fab fa-instagram"></i></a>
					<a target="_blank" href="https://www.linkedin.com/in/edineicunha"><i class="fab fa-linkedin-in"></i></a>

				</div>
			</div>

			<div class="col-6">
				<h5 class="">tem uma pergunta?</h5>
				<h2 class="">Envie sua mensagem</h2>

				<form class="form-contato">
					<fieldset>
						<input type="text" id="nome" name="nome" placeholder="Nome *">
					</fieldset>

					<fieldset>
						<input type="text" id="email" name="email" placeholder="E-mail *">
					</fieldset>

					<fieldset>
						<textarea id="mensagem" name="mensagem" placeholder="Mensagem"></textarea>
					</fieldset>

					<fieldset>
						<label class="checkbox">
							<input type="checkbox" id="confirmacao" value="true" name="confirmacao">
							Concordo que meus dados enviados estão sendo coletados e armazenados.
						</label>
					</fieldset>

					<a href="javascript:" class="button enviar">ENVIAR</a>
					<p class="msg-form"></p>

				</form>
			</div>

		</div>
	</div>
</section>


<script type="text/javascript">
	jQuery(document).ready(function(){	  

		// FORM
		jQuery(".enviar").click(function(){
			jQuery('.enviar').html('Enviando').prop( "disabled", true );
			jQuery('.msg-form').removeClass('erro ok').html('');
			var nome = jQuery('#nome').val();
			var email = jQuery('#email').val();
			var mensagem = jQuery('#mensagem').val();

			var para = '<?php the_field('email', 'option'); ?>';
			var nome_site = '<?php bloginfo('name'); ?>';

			if(nome == ''){
				jQuery('#nome').parent().addClass('erro');
			}

			if(email == ''){
				jQuery('#email').parent().addClass('erro');
			}

			if(confirmacao == ''){
				jQuery('#email').parent().addClass('erro');
			}

			if(jQuery("#confirmacao").is(':checked')){
				var confirmacao = true;
			}else{
				var confirmacao = false;
				jQuery('#confirmacao').parent().addClass('erro');
			}

			if((nome == '') || (email == '') || (confirmacao)){
				jQuery('.msg-form').html('Campos obrigatórios não podem estar vazios.').addClass('erro');
				jQuery('.enviar').html('Enviar').prop( "disabled", false );
			}else{
				jQuery.getJSON("<?php echo get_template_directory_uri(); ?>/mail.php", { nome:nome, email:email, mensagem:mensagem, para:para, nome_site:nome_site }, function(result){		
					if(result=='ok'){
						resultado = 'Enviado com sucesso! Obrigado.';
						classe = 'ok';
					}else{
						resultado = result;
						classe = 'erro';
					}
					jQuery('.msg-form').addClass(classe).html(resultado);
					jQuery('.form-contato').trigger("reset");
					jQuery('.enviar').html('Enviar').prop( "disabled", false );
				});
			}
		});

		jQuery('input').change(function(){
			if(jQuery(this).parent().hasClass('erro')){
				jQuery(this).parent().removeClass('erro');
			}
		});

		jQuery('textarea').change(function(){
			if(jQuery(this).parent().hasClass('erro')){
				jQuery(this).parent().removeClass('erro');
			}
		});
		
	});

</script>