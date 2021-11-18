
<table>
    <tr>
        <td>
            <div class="vertical-menu">
                <a href="<?php echo URL; ?>listComponents/listAll/1" class="active">Computer</a>
                <a href="<?php echo URL; ?>listComponents/listAll/2">Tastiere</a>
                <a href="<?php echo URL; ?>listComponents/listAll/3">Mouse</a>
                <a href="<?php echo URL; ?>listComponents/listAll/4">Monitor</a>
                <a href="<?php echo URL; ?>listComponents/listAll/5">Proiettori</a>
            </div>
        </td>
        <td>
            <table>
                <tr>
                    <td class="grey">Mail</td>
                    <td class="grey">Nome</td>
                    <td class="grey">Cognome</td>
                    <td class="grey">Nascita</td>
                    <td class="grey">Password</td>
                    <td class="grey">Azione</td>
                </tr>
                <?php foreach($this->users as $user){ ?>
                    <tr>
                    <?php foreach($user as $field){ ?>
                        <td style="padding: 5px; text-align: center;"><?php echo $field; ?></td>
                    <?php } ?>
                        <td>
                            <form action="<?php echo URL ?>users/deleteUser/<?php echo $user[0] ?>" method="POST">
                                <input type="submit" value="Elimina">
                            </form>
                            <form action="<?php echo URL ?>users/modifyUser/<?php echo $user[0] ?>" method="POST">
                                <input type="submit" value="Modifica">
                            </form>
                    </tr>
                <?php } ?>    
            </table>
        </td>
    </tr>
</table>

