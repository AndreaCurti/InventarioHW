
<table>
    <tr>
        <td>
            <div class="vertical-menu">
                <a href="<?php echo URL; ?>listComponents/index/1" class="active">Computer</a>
                <a href="<?php echo URL; ?>listComponents/index/2">Tastiere</a>
                <a href="<?php echo URL; ?>listComponents/index/3">Mouse</a>
                <a href="<?php echo URL; ?>listComponents/index/4">Monitor</a>
                <a href="<?php echo URL; ?>listComponents/index/5">Proiettori</a>
                <a href="<?php echo URL; ?>listComponents/index/6">Archiviati</a>
            </div>
        </td>
        <td style='text-align:center; vertical-align:middle'>
            <?php if($_SESSION['emptyList'] == 0){ ?>
                <table class="components">
                    <tr>
                        <td class="grey">ID</td>
                        <td class="grey">Marca</td>
                        <td class="grey">Descrizione</td>
                        <td class="grey">Numero seriale</td>
                        <td class="grey">Data installazione</td>
                        <td class="grey">Aula</td>
                        <?php if($this->idCategoria != 6){ ?>
                            <td class="grey">Azioni</td>
                        <?php } ?> 
                    </tr>
                    <?php foreach($this->components as $component){ ?>
                        <tr>
                            <?php foreach($component as $field){ ?>
                                <td style="padding: 5px; text-align: center;"><?php echo $field; ?></td>
                            <?php } ?>
                            <?php if($this->idCategoria != 6){ ?>
                                <td>
                                    <form action="<?php echo URL ?>listComponents/askConfirm/<?php echo $component["id"] 
                                    . '/'. $this->idCategoria ?>" method="POST">
                                        <input type="submit" value="Elimina">
                                    </form>
                                    <form action="<?php echo URL ?>modifyComponent/index/<?php echo $component["id"] ?>" method="POST">
                                        <input type="submit" value="Modifica">
                                    </form>
                            <?php } ?>    
                        </tr>
                    <?php } ?>    
                </table>
            <?php }else{ ?>
                <h2 id="noElements" style="text-align: center"> <?php echo $this->errorMessage ?></h2>
            <?php } ?>
        </td>
    </tr>
</table>

