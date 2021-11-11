<h1>Login</h1>
<form action="<?php echo URL ?>login/doLogin" method="POST">
	<table>
		<tr>
			<td>
				<label>Email:</label>
			</td>
			<td>
				<input type="text" name="email" >
			</td>
		</tr>
		<tr>
			<td>
				<label>Password: </label>
			</td>
			<td>
				<input type="password" name="password">
			</td>
		</tr>
	</table>
	<input type="submit">
</form>
<h2 style="color: red" id="errorLogin"></h2>