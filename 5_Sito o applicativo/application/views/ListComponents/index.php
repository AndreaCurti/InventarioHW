<table>
    <tr>
        <td class="bg-dark h1 ">
            <nav class="navbar navbar-dark bg-dark">        
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="navbar-brand" href="<?php echo URL; ?>listComponents/index/1" class="active">Computer</a>
                    </li>
                    <li class="nav-item">
                        <a class="navbar-brand" href="<?php echo URL; ?>listComponents/index/2">Tastiere</a>
                    </li>
                    <li class="nav-item">
                        <a class="navbar-brand" href="<?php echo URL; ?>listComponents/index/3">Mouse</a>
                    </li>
                    <li class="nav-item">
                        <a class="navbar-brand" href="<?php echo URL; ?>listComponents/index/4">Monitor</a>
                    </li>
                    <li class="nav-item">
                        <a class="navbar-brand" href="<?php echo URL; ?>listComponents/index/5">Proiettori</a>
                    </li>
                    <li class="nav-item">
                        <a class="navbar-brand" href="<?php echo URL; ?>listComponents/index/6">Archiviati</a>
                    </li>
                </ul>
            </nav>
        </td>
        <td style='text-align:center;' class="align-top">
            <?php if($_SESSION['emptyList'] == 0){ ?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <td scope="col">ID</td>
                                <td scope="col">Marca</td>
                                <td scope="col">Descrizione</td>
                                <td scope="col">Numero seriale</td>
                                <td scope="col">Data installazione</td>
                                <td scope="col">Aula</td>
                                <?php if($_SESSION["idCategoria"] != 6){ ?>
                                    <td scope="col" colspan="2" class="text-center">Azioni</td>
                                <?php } ?> 
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($_SESSION["components"] as $component){ ?>
                                <tr>
                                    <?php foreach($component as $field){ ?>
                                        <td style="padding: 5px; text-align: center;"><?php echo $field; ?></td>
                                    <?php } ?>
                                    <?php if($_SESSION["idCategoria"] != 6){  ?>
                                        <td>
                                            <form action="<?php echo URL ?>modifyComponent/index/<?php echo $component["id"] ?>" method="POST">
                                                <input type="submit" value="Modifica" class="btn btn-dark" style="display: inline-block;">
                                            </form>
                                        </td>
                                        <td>
                                            <form action="<?php echo URL ?>listComponents/askConfirm/<?php echo $component["id"] 
                                            . '/'. $_SESSION["idCategoria"] ?>" method="POST">
                                                <input type="submit" value="Elimina" class="btn btn-dark" style="display: inline-block;">
                                            </form>
                                        </td>
                                    <?php } ?>    
                                </tr>
                            <?php } ?>  
                        </tbody>  
                    </table>
                </div>
            <?php }else{ ?>
                <h2 id="noElements" class="align-middle"> <?php echo $this->errorMessage ?></h2>
            <?php } ?>
        </td>
        <td class="align-top pt-2">
            <form action="<?php echo URL ?>addComponent/index" method="POST">
                <button class="btn btn-dark mt-1 ml-2"><i class="bi bi-plus-lg"></i></button>
            </form>
        </td>
    </tr>
</table>

