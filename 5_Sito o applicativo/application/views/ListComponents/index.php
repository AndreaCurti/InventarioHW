<div class="bg-light">
    <table>
        <tr>
            <div>
                <td class="bg-light h1" style="width:25%; text-align:center">
                    <nav class="navbar navbar-light bg-light d-inline-flex p-2">        
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="navbar-brand" href="<?php echo URL; ?>listComponents/index/1">Computer</a>
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
            </div>
            <div class="col">
                <td style='text-align:center; width:75%' class="align-top bg-dark">
                    <?php if($_SESSION['emptyList'] == 0){ ?>
                        <div class="table-responsive">
                            <table class="table table-hover table-dark">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col" class="text-center">ID</th>
                                        <th scope="col" class="text-center">Marca</th>
                                        <th scope="col" class="text-center">Descrizione</th>
                                        <th scope="col" class="text-center">Numero seriale</th>
                                        <th scope="col" class="text-center">Data installazione</th>
                                        <th scope="col" class="text-center">Aula</th>
                                        <?php if($_SESSION["idCategoria"] != 6){ ?>
                                            <th scope="col" colspan="2" class="text-center">Azioni</th>
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
                                                        <input type="submit" value="Modifica" class="btn btn-light" style="display: inline-block;">
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="<?php echo URL ?>listComponents/askConfirm/<?php echo $component["id"] 
                                                    . '/'. $_SESSION["idCategoria"] ?>" method="POST">
                                                        <input type="submit" value="Elimina" class="btn btn-light" style="display: inline-block;">
                                                    </form>
                                                </td>
                                            <?php } ?>    
                                        </tr>
                                    <?php } ?>  
                                </tbody>  
                            </table>
                        </div>
                    <?php }else{ ?>
                        <h2 id="noElements" class="align-middle text-white"> <?php echo $this->errorMessage ?></h2>
                    <?php } ?>
                </td>
            </div>
            <div class="col">
                <td class="align-top pt-2 ">
                    <form action="<?php echo URL ?>addComponent/index" method="POST">
                        <button class="btn btn-dark mt-1 ml-2"><i class="bi bi-plus-lg" style="font-size:20px"></i></button>
                    </form>
                </td>
            </div>    
        </tr>
    </table>
</div>

