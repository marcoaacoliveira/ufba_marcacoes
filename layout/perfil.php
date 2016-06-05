<?php include 'top.php'; ?>
<?php include 'sidebar.php' ?>

<div class="conteudo-left">
	<div class="name">
		Perfil
	</div>
	<div  class="conteudo-center">
		<form action="perfil.php">
			<div id="centro-div-perfil" style="margin-top:-50px; ">
                <span>Nome</span>
                	<p><input name="nome" type="text" class="feedback-input form-input" placeholder="Antônio da Silva" id="name"  required/></p>
                <span>Nome do Pet</span>
                	<p><input name="pet" type="text" class="feedback-input form-input" placeholder="Paçoca" id="name"  required/></p>
              <label for="RG">
    			<span>RG</span>
    				<p><input name="rg" type="text" class="feedback-input form-input" placeholder="12345678" id="name" required /></p>
              </label>
                <label for="CPF">
                <span>CPF</span>
                	<p><input name="cpf" type="text" class="feedback-input form-input" style="width:230px;" placeholder="12345678" id="name" required/></p>
              </label>                    
                <span>Endereço</span>
                	<p><input name="endereco" type="text" class="feedback-input form-input" placeholder="Av. Ademar de Barros, Ondina" id="name"  required/></p>      
                <span>E-mail</span>
                	<p><input name="email" type="text" class="feedback-input form-input" placeholder="doutorantonio@gmail.com" id="name"  required/></p>  
              <label for="Telefone">
    			<span>Telefone</span>
                	<p><input name="telefone" type="text" class="feedback-input form-input" placeholder="(71) 3333-3333" id="name" required/></p>      
               </label> 
                <label for="Celular">
                <span>Celular</span>
                	<p><input name="celular" type="text" class="feedback-input form-input" style="width:230px;" placeholder="(71) 9999-9999" id="name" required/></p>         
              </label>                                                          
				<div class="submit">
	       			<input type="submit" value="Confirmar"  id="button"/>
	        		<div class="ease"></div>
	      		</div>
			</div>
		</div>
	</form>
	</div>
</div>




<!--<?php include 'footer.php'; ?>-->

