<style>
#cont-wrapper{
width:850px;
height:640px;
margin:0 auto;
background-color:#eee;
}
#text{
width:480px;
height:600px;
margin:20px;
float:left;
background-color:#ddd;
}
.textboxinside{
font-size:1.4em;
font-family:'RalewayThin';
font-smooth:always; 
letter-spacing:2px;
color:#333;
}
#form-mail{
width:280px;
height:450px;
margin:20px;
float:left;
background-color:#ddd;
}
</style>

<div id="cont-wrapper">
    <div id="text">
        <div class="header">
            Endereço
        </div>
        
        <div class="box-inside textboxinside">
            <p class="label-vet "><b>Telefones:</b> (034)9147-4479 (TIM) / 8872-8160 (OI)<br /></p>
            <p class="label-vet"><b>Endereço:</b> Av. José de Castro Bispo 129 - Residencial Gramado - Uberlândia(MG)<br /></p>
            <iframe width="429" class="label-vet" height="380" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com.br/maps?f=q&amp;source=s_q&amp;hl=pt-BR&amp;geocode=&amp;q=Av.+Jos%C3%A9+de+Castro+129+-+Residencial+Gramado+Uberl%C3%A2ndia+-+MG,+38401-712&amp;aq=&amp;sll=-18.874636,-48.282766&amp;sspn=0.008639,0.016512&amp;gl=br&amp;ie=UTF8&amp;hq=&amp;hnear=Av.+Jos%C3%A9+de+Castro,+129+-+Residencial+Gramado,+Uberl%C3%A2ndia+-+Minas+Gerais,+38401-712&amp;t=h&amp;ll=-18.863407,-48.281393&amp;spn=0.030864,0.036736&amp;z=14&amp;output=embed"></iframe><br /><small><a href="http://maps.google.com.br/maps?f=q&amp;source=embed&amp;hl=pt-BR&amp;geocode=&amp;q=Av.+Jos%C3%A9+de+Castro+129+-+Residencial+Gramado+Uberl%C3%A2ndia+-+MG,+38401-712&amp;aq=&amp;sll=-18.874636,-48.282766&amp;sspn=0.008639,0.016512&amp;gl=br&amp;ie=UTF8&amp;hq=&amp;hnear=Av.+Jos%C3%A9+de+Castro,+129+-+Residencial+Gramado,+Uberl%C3%A2ndia+-+Minas+Gerais,+38401-712&amp;t=h&amp;ll=-18.863407,-48.281393&amp;spn=0.030864,0.036736&amp;z=14" style="color:#0000FF;text-align:left">Exibir mapa ampliado</a></small>
        </div>
    </div>
    
    <div id="form-mail">
        <div class="header">
            Envio de E-Mail
        </div>
        
        <form>
            <p class="label-vet">Nome:</p>
            <input id="namemsg" name="namemsg" class="input-text required" type="text" width="50" maxlength="30"/>
            
            <p class="label-vet">Email:</p>
            <input id="namemsg" name="emailmsg" class="input-tex required" type="text" width="50" maxlength="30"/>
            <p class="label-mini">seu email não será divulgado ou usado para outros fins, além de manter contato com você cliente.</p>
            
            <p class="label-vet">Assunto:</p>
            <input id="headmsg" name="headmsg" class="input-text required" type="text" width="50" maxlength="40"/>
        
            <textarea id="bodymsg" name="bodymsg" class="text-area required" rows="5" cols="41"></textarea>
            
            <br />
            
            <input id="send" type="button" style="display: inline; margin-top: 10px;" value="Enviar" />
            <input id="new" type="button" style="display: inline; margin-top: 10px;" value="Limpar" />
        </form>
    </div>
</div>
