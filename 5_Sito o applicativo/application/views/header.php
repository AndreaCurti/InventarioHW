<html>
    <head>
        <title>InventarioHW</title>
        <link rel="stylesheet" href="<?php echo URL; ?>application/public/css/default.css">
        <link rel="stylesheet" href="<?php echo URL; ?>application/public/css/bootstrap/css/bootstrap-grid.css">
        <link rel="stylesheet" href="<?php echo URL; ?>application/public/css/bootstrap/css/bootstrap-grid.min.css">
        <link rel="stylesheet" href="<?php echo URL; ?>application/public/css/bootstrap/css/bootstrap-reboot.css">
        <link rel="stylesheet" href="<?php echo URL; ?>application/public/css/bootstrap/css/bootstrap-reboot.min.css">
        <link rel="stylesheet" href="<?php echo URL; ?>application/public/css/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo URL; ?>application/public/css/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo URL; ?>application/public/css/bootstrap/icons/bootstrap-icons.css">
        
        <script src="<?php echo URL; ?>public/js/jquery.js"></script>

    </head>
    <body>
        <div >
            <div id="header">
                <?php if(!empty($_SESSION['id'])){ ?>
                    <?php if($_SESSION['isAdmin'] == 0){ ?>
                        <a style="margin-right: 20px" href="<?php echo URL; ?>Home/index">Home</a>   
                        <a style="margin-right: 20px" href="<?php echo URL; ?>Login/index">Logout</a>
                    <?php }else if($_SESSION['isAdmin'] == 1){ ?>
                        <a style="margin-right: 20px" href="<?php echo URL; ?>Home/index">Home</a>   
                        <a style="margin-right: 20px" href="<?php echo URL; ?>AddUser/index">Aggiungi utente</a>
                        <a style="margin-right: 20px" href="<?php echo URL; ?>DeleteUser/index">Rimuovi utente</a>
                        <a style="margin-right: 20px" href="<?php echo URL; ?>ChangeEmail/index">Cambia email</a>
                        <a style="margin-right: 20px" href="<?php echo URL; ?>ChangePassword/index">Cambia password</a>
                        <a style="margin-right: 20px" href="<?php echo URL; ?>Login/index">Logout</a>
                    <?php } ?>
                <?php }else{ ?>
                    <a style="margin-right: 20px" href="<?php echo URL; ?>Login/index">Login</a>
                <?php } ?>  
            </div>
        </div>