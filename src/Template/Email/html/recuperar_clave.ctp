<div class="color:#333">
	<p>
		Estimado/a <b><?php echo $nombre_persona; ?></b>
	</p>
	<p></p>
	<p align="justify">
		<font><br />
			<?php
				echo $descripcion;
			?>
			<br><br>
			<p>	
				Debe hacer clic <?php echo $this->Html->link('aquí', ['controller' => 'personas', 'action' => 'restablecer_clave', ($id*3), '?' => ['token' => md5($id.$email_user)] , '_full' => true]); ?> para recuperar su contraseña.
			</p>
		</font>
	</p>
</div>