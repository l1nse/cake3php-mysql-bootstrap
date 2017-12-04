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
				Debe hacer clic <a href="<?php echo URI_WEB.APP_URI; ?>calendarios/view/<?php echo $id; ?>" title="Ver Reunion">aquí</a> para ver la reunion.
			</p>
		</font>
	</p>
</div>