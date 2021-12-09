<h3 class="d-flex justify-content-center pt-4">Confermi di voler eliminare questo componente?</h3>
<div class="d-flex justify-content-center pt-4 pb-4">
	<table class="center">
		<tr>
			<td>
				<form action="<?php echo URL ?>listComponents/deleteComponent/<?php echo $this->idComponente
				. '/' . $this->idCategoria ?>" method="POST">
					<input type="submit" class="btn btn-dark btn-lg" value="Conferma">
				</form>
			</td>
			<td>
				<form action="<?php echo URL ?>listComponents/index/<?php echo $this->idCategoria ?>" method="POST">
					<input type="submit" class="btn btn-dark btn-lg" value="Annulla">
				</form>
			</td>
		</tr>
    </table>
</div> 