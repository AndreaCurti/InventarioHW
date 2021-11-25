
<table>
    <tr>
        <td>
            <div class="vertical-menu">
                <a href="<?php echo URL; ?>listComponents/index/1" class="active">Computer</a>
                <a href="<?php echo URL; ?>listComponents/index/2">Tastiere</a>
                <a href="<?php echo URL; ?>listComponents/index/3">Mouse</a>
                <a href="<?php echo URL; ?>listComponents/index/4">Monitor</a>
                <a href="<?php echo URL; ?>listComponents/index/5">Proiettori</a>
            </div>
        </td>
        <td style='text-align:center; vertical-align:middle'>
            <?php if(isset($_SESSION['emptyList']) && $_SESSION['emptyList'] != 1){ ?>
                <table class="components">
                    <tr>
                        <td class="grey">ID</td>
                        <td class="grey">Marca</td>
                        <td class="grey">Descrizione</td>
                        <td class="grey">Numero seriale</td>
                        <td class="grey">Data installazione</td>
                        <td class="grey">Aula</td>
                    </tr>
                    <?php foreach($this->components as $component){ ?>
                        <tr>
                        <?php foreach($component as $field){ ?>
                            <td style="padding: 5px; text-align: center;"><?php echo $field; ?></td>
                        <?php } ?>
                            <td>
                                <form action="<?php echo URL ?>users/deleteUser/<?php echo $component[0] ?>" method="POST">
                                    <input type="submit" value="Elimina">
                                </form>
                                <form action="<?php echo URL ?>users/modifyUser/<?php echo $component[0] ?>" method="POST">
                                    <input type="submit" value="Modifica">
                                </form>
                        </tr>
                    <?php } ?>    
                </table>
            <?php }else{ ?>
                <h2 id="noElements" style="text-align: center"></h2>
            <?php } ?>
        </td>
    </tr>
</table>

