<h1>Modifica componente</h1>
<form action="<?php echo URL ?>modifyComponent/changeComponent/<?php echo $this->idComponente ?>" method="POST">
	<table>
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
				<input type="submit">
			</td>
		</tr>
	</table>
</form>
<p>Per inserire un componente che si trova in magazzino, inserire nella sezione <b>Aula</b> il numero <b>1</b></p>
<h2 style="color: red" id="errorModifyComponent"></h2>

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