<div class="d-flex justify-content-center pt-4 pb-4">
	<form action="<?php echo URL ?>deleteUser/delete" method="POST">
		<table>
			<thead>
				<tr>
					<h1>Rimuovi utente</h1>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<label>Email:</label>
					</td>
					<td>
						<input type="text" name="email" autocomplete="off">
					</td>
				</tr>
				<tr>
					<td>
						<label>Conferma email:</label>
					</td>
					<td>
						<input type="text" name="confEmail" autocomplete="off">
					</td>
				</tr>
				<tr>
					<td colspan="2" style="text-align:center">
					<br>
						<input type="submit" class="btn btn-dark btn-lg" value="Rimuovi">
					</td>
				</tr>
			</tbody>
		</table>
	</form>
</div>
<?php if($this->errorMessage != ""){ ?>
	<h2 id="errorDeleteUser" style="text-align: center" class="alert alert-danger"> <?php echo $this->errorMessage ?></h2>
<?php } ?>