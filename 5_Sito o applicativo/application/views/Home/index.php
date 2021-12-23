<form action="<?php echo URL ?>home/load" method="POST">
<table style="margin: auto; margin-right:auto; margin-top:3em;">
    <tr>
        <div>
            <td>
                <input type="submit" class="btn btn-dark btn-lg" style="height: 5em" name="listComponents" value="Consulta inventario">
            </td>
            <td></td>
            <?php if($_SESSION['isAdmin'] == 1){ ?>
                <td>
                    <input type="submit" class="btn btn-dark btn-lg" style="height: 5em;" name="users" value="Gestione utenti">
                </td>
            <?php } ?>
        </div>
    </tr>
</table>
</form>
    