<div class="d-flex justify-content-center pt-4 pb-4">
    <form action="<?php echo URL ?>changePassword/change" method="POST">
        <table>
            <thead>
				<tr>
					<h1>Cambia Password</h1>
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
                        <label>Vecchia password:</label>
                    </td>
                    <td>
                        <input type="password" name="oldPassword" autocomplete="off">
                    </td>
                </tr>
                <tr>
                    <td>
                        <br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Nuova password:</label>
                    </td>
                    <td>
                        <input type="password" name="newPass" autocomplete="off">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Conferma password:</label>
                    </td>
                    <td>
                        <input type="password" name="confPass" autocomplete="off">
                    </td>
                </tr>
                <tr>
					<td colspan="2" style="text-align:center">
					<br>
						<input type="submit" class="btn btn-dark btn-lg" value="Accedi">
					</td>
				</tr>
            </tbody>
        </table>
    </form>
</div>
<?php if($this->errorMessage != ""){ ?>
	<h2 id="errorChangePassword" style="text-align: center" class="alert alert-danger"> <?php echo $this->errorMessage ?></h2>
<?php } ?>