
<h1>Cambia Password</h1>
<form action="<?php echo URL ?>changePassword/change" method="POST">
    <table>
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
    </table>
    <input type="submit">
</form>
<h2 style="color: red" id="errorChangePassword"></h2>