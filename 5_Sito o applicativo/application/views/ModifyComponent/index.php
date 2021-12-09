
<div class="d-flex justify-content-center pt-4 pb-4">
	<form action="<?php echo URL ?>modifyComponent/changeComponent/<?php echo $this->idComponente ?>" method="POST">
		<table>
			<thead>
				<tr>
					<h1>Modifica componente</h1>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<label>Descrizione:</label>
					</td>
					<td>
						<input type="text" name="descrizione" autocomplete="off" 
						value="<?php echo $this->component[0] ?>"
						style="width:300px; height:60px">
					</td>
				</tr>
				<tr>
					<td>
						<label>Aula:</label>
					</td>
					<td>
						<input type="number" name="aula" onkeypress="preventNonNumericalInput(event, this.value)"
						value="<?php echo intval($this->component[1]) ?>">
					</td>
				</tr>
				<tr>
					<td colspan="2" style="text-align:center">
					<br>
						<input type="submit" class="btn btn-dark">
					</td>
				</tr>
			</tbody>
		</table>
	</form>
</div>
<p class="d-flex justify-content-center">Per inserire un componente che si trova in magazzino, inserire nella sezione &nbsp;<b>Aula</b>&nbsp; il numero &nbsp;<b> 1</b></p>
<?php if($this->errorMessage != ""){ ?>
	<h2 id="errorModifyComponent" style="text-align: center" class="alert alert-danger"> <?php echo $this->errorMessage ?></h2>
<?php } ?>



<script> 
	function preventNonNumericalInput(e, val) {
	e = e || window.event;
	var charCode = (typeof e.which == "undefined") ? e.keyCode : e.which;
	var charStr = String.fromCharCode(charCode);
	if(val.length > 2){
		e.preventDefault();
	}
	if (!charStr.match(/^[0-9]+$/))
		e.preventDefault();
	}
</script>