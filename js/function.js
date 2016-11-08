$('#editar_perfil').on('click',function(e){
	e.preventDefault();
	var nome = $('#nome').val();
	var email = $('#email').val();
	var idade = $('#idade').val();
	var estado = $('#estado').val();
	var telefone = $('#telefone').val();
	var endereco = $('#endereco').val();
	var senha = $('#senha').val();
	var acao = $(this).attr('id');

	if(nome == '' || email == '' || idade == '' || estado == '' || telefone == '' || endereco == '' || senha == ''){
		$('.retorno_cadastro').html('<div class="aviso yellow">Preencha todos os campos</div>');
		hidemessage('.retorno_cadastro');		
	}else{
		$.ajax({
			method: 'POST',
			url: 'sys/cadastro.php',
			data: {acao: acao, nome:nome, email:email, idade:idade, estado:estado, telefone:telefone, endereco:endereco, senha:senha}
			success:function(retorno){
				if(retorno == 'email'){
					
				}
			}

		});
	}
});