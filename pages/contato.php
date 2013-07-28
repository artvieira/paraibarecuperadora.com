<?php	
	
	if (!empty($_POST)) {
		$msg = '';
		
		if (empty($_POST['nome'])) {
			$msg .= 'nome vazio<br>';
		}
		
		if (empty($_POST['email'])) {
			$msg .= 'email vazio<br>';
		}
		
		if (empty($_POST['assunto'])) {
			$msg .= 'assunto vazio<br>';
		}
		
		if (empty($_POST['msg'])) {
			$msg .= 'msg vazio<br>';
		}
		
		if (empty($msg)) {
			$to          = $_POST['email'];
			$subject   = $_POST['assunto'].', de '.$_POST['nome'];
			$message = $_POST['msg'];
			$headers  = 'From: webmaster@example.com' . "\r\n" .
				'Reply-To: webmaster@example.com' . "\r\n" .
				'X-Mailer: PHP/' . phpversion();

			if (mail($to, $subject, $message, $headers)) {
				$_POST['nome'] 		= null;
				$_POST['email'] 		= null;
				$_POST['assunto'] 	= null;
				$_POST['msg'] 		= null;
			
				$GLOBALS['msgEmail'] = "Email enviado com sucesso!!!";
			} else { 
				$GLOBALS['msgEmail'] = "Falha no envio do email, favor tentar mais tarde!!!";
				
				// implementar sistema de aviso quando sistema falhar!!!!
			}
		} else {
			 $GLOBALS['msgEmail'] = $msg;
		}
	}
?>

<style>
h1 {
margin:0;
}

</style>

<section class="contato" style="width:100%;">
    <article style="width:50%; float:left;">
        <h1>Endereço</h1>
        
		<label for="telefones" style="font-weight:700;">Telefones:</label>
		<p id="telefones" style="font-size:1.5em;">(034)9147-4479 (TIM) / 8872-8160 (OI)</p>
		<br>

		<label for="endereco" style="font-weight:700;">Endereço:</label>
		<p id="endereco" style="font-size:1.5em;">Av. José de Castro Bispo 129 - Residencial Gramado - Uberlândia(MG)</p>
		<br>
		<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?source=s_q&amp;hl=pt-BR&amp;geocode=&amp;q=Av.+Jos%C3%A9+de+Castro+Bispo+129&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=62.99906,49.482422&amp;t=h&amp;ie=UTF8&amp;hq=Av.+Jos%C3%A9+de+Castro+Bispo+129&amp;hnear=Residencial+Gramado,+Uberl%C3%A2ndia+-+Minas+Gerais,+Rep%C3%BAblica+Federativa+do+Brasil&amp;ll=-18.86824,-48.282337&amp;spn=0.014213,0.018239&amp;z=15&amp;iwloc=A&amp;output=embed"></iframe><br /><a href="https://maps.google.com/maps?source=embed&amp;hl=pt-BR&amp;geocode=&amp;q=Av.+Jos%C3%A9+de+Castro+Bispo+129&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=62.99906,49.482422&amp;t=h&amp;ie=UTF8&amp;hq=Av.+Jos%C3%A9+de+Castro+Bispo+129&amp;hnear=Residencial+Gramado,+Uberl%C3%A2ndia+-+Minas+Gerais,+Rep%C3%BAblica+Federativa+do+Brasil&amp;ll=-18.86824,-48.282337&amp;spn=0.014213,0.018239&amp;z=15&amp;iwloc=A" style="color:#0000FF;text-align:left; font-size:1.3em;" target="_blank">Exibir mapa ampliado</a>		
		<br>
    </article>
    
    <article style="width:50%; float:right; background-color:#ddd;">
        <form action="/contato/" method="post">
			<h1>Envio de E-Mail</h1>
		
            <label for="nome">Nome:</label>
			<br>
            <input id="nome" name="nome" class="input-text required" type="text" width="50" maxlength="30" <?php if (!empty($_POST['nome'])) echo 'value="'.$_POST['nome'].'"';?>/>
            <br>
			<br>
			
            <label for="email">Email:</label>
			<br>
            <input id="email" name="email" class="input-tex required" type="text" width="50" maxlength="30" <?php if (!empty($_POST['email'])) echo 'value="'.$_POST['email'].'"';?>/>
            <p>seu email não será divulgado ou usado para outros fins, além de manter contato com você cliente.</p>
            <br>
			
            <label for="assunto">Assunto:</label>
			<br>
            <input id="assunto" name="assunto" class="input-text required" type="text" width="50" maxlength="40" <?php if (!empty($_POST['assunto'])) echo 'value="'.$_POST['assunto'].'"';?>/>
			<br>
			<br>
		
            <textarea id="msg" name="msg" class="text-area required" rows="5" cols="41"><?php if (!empty($_POST['msg'])) echo $_POST['msg'];?></textarea>
            <br>
            
			<p style="font-size:1.6em; font-weight:400; color:red;"><?php if (!empty($GLOBALS['msgEmail'])) echo $GLOBALS['msgEmail'];?></p>
			
			
			<p>TODOS os campos são requeridos.</p>
            <input id="submit" type="submit" style="display: inline; margin-top: 10px;" value="Enviar" />
            <input id="limpar" type="button" style="display: inline; margin-top: 10px;" value="Limpar" />
        </form>
    </article>
</section>