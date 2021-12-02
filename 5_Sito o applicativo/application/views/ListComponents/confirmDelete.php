<h1>Confermi di voler eliminare questo componente?</h1>
<table class="center">
		<tr>
			<td>
                <form action="<?php echo URL ?>listComponents/deleteComponent/<?php echo $this->idComponente
                 . '/' . $this->idCategoria ?>" method="POST">
	                <input type="submit" value="Conferma">
                </form>
			</td>
			<td>
                <form action="<?php echo URL ?>listComponents/index/<?php echo $this->idCategoria ?>" method="POST">
	                <input type="submit" value="Annulla">
                </form>
			</td>
		</tr>
    </table>
<h2 style="color: red" id="errorDeleteUser"></h2>