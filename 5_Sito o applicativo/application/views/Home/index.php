<form action="<?php echo URL ?>home/load" method="POST">
<table>
    <tr>
        <td>
            <input type="submit" class="btn btn-dark btn-lg" name="listComponents" value="Consulta inventario">
        </td>
        <?php if($_SESSION['isAdmin'] == 1){ ?>
            <td>
                <input type="submit" class="btn btn-dark btn-lg" name="users" value="Gestione utenti">
            </td>
        <?php } ?>
    </tr>
</table>
</form>
    