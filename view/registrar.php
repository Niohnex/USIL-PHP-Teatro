<div id="registro" >
    
    
      <form method="post" action="index.php?vista=registrarManual">

		
			<h1>CREAR NUEVA CUENTA</h1>
			<fieldset>
				<legend>INFORMACION PERSONALES</legend>
					
					  <label for="nombre">Nombres</label>
					  <input class="text" type="text" name="txtNombre" id="nombre" value="<?php echo $nombres; ?>" />
					  <label for="apellido">Apellidos</label>
					  <input class="text" type="text" name="txtApellido" id="apellido" value="<?php echo $apellidos; ?>" />
                                           <label for="apellido">Usuario</label>
					  <input class="text" type="text" name="txtUsuario" id="apellido" value="" />
					  
			</fieldset>
			<fieldset>
				<legend>INFORMACION DE CUENTA</legend>
				 <label for="email">Email</label>
					  <input class="text" type="email" name="txtCorreo" id="email" value="<?php echo $email; ?>" />
					  <label for="password">Password</label>
					  <input class="text" type="password" name="txtClave" id="password" />
					  <label for="repetPassw">Repetir password</label>
					  <input class="text" type="password" name="txtClave2" id="repetPassw" />
			</fieldset>
			<p id="aceptoterminos"><input type="checkbox" name="chkTermCondi" id="termCondi" />
			<label>Acepta  los términos y condiciones</label></p>
			<input type="submit" name="btRegistrar" id="Registrarme!" value="Registrar" />
		</form>
	</div>
	<div id="registroRedes">
		 <fieldset>
		 <legend>Registrarte mediante</legend>
			<?php if (isset($_SESSION['usuario'])): ?>
			  <a href="<?php echo $logoutUrl; ?>"><img src="<?php echo base_url() ?>img/logOut_facebook.png" alt="registro_facebook" /></a>
			<?php else: ?>
				<a href="<?php echo $loginUrl; ?>"><img src="<?php echo base_url() ?>img/reg_fcbk.png" alt="registro_facebook" /></a>
			<?php endif ?>
		</fieldset>
		<p style="padding:10px;">&oacute;</p>
		<fieldset>
		 <legend>Registrarte mediante</legend>
			<?php if ($user_tw): ?>
        <a href="<?php echo $logoutUrl_tw; ?>"><img src="<?php echo base_url() ?>img/logOut_facebook.png"/></a>
      <?php else: ?>
        <a href="<?php echo $loginUrl_tw; ?>"><img src="<?php echo base_url() ?>img/reg_twtr.png"/></a>
       </div>
      <?php endif ?>
		</fieldset>
    </div>