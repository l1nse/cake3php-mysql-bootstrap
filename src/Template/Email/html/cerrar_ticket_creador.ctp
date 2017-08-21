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
				Debe hacer clic <a href="<?php echo URI_WEB.APP_URI; ?>tickets/view/<?php echo $id; ?>" title="Ver Ticket">aquí</a> para ver la solicitud.
			</p>
		</font>
	</p>
</div>