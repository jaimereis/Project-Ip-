<!DOCTYPE html>
<html>
    <head>
         <link rel = "shortcut icon" type = "image / x-icon" href = "<?php echo BASE_URL; ?>/assets/images/ipeicone.ico"/>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Ipê Digital</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- stilo login -->
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/styleLogin.css">
        <!--PACE--> 
        <link type="text/css" media="all" href="<?php echo BASE_URL; ?>/assets/css/pace-theme-minimal.css" rel="stylesheet"/>




    </head>
    <body>

        <div class="wrapper">

            <div class="container">
                <h1><a href="#" class="text-blue"><img src="<?php echo BASE_URL; ?>/assets/images/logoipe.png" /></a></h1>
                <?php if (isset($error) && !empty($error)) : ?>
                <div class="alertaLogin">
                    Usuário e ou senha incorretos !
                </div>
                <?php endif; ?>
                <form class="form" method="post">
                    <input type="text" name="login" placeholder="Usuário" required="true" autocomplete="off">
                    <input id="password" type="password" name="password" placeholder="Senha" required="true" autocomplete="off">
                    <button type="submit">Acessar</button>
                </form>
            </div>

            <ul class="bg-bubbles">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>


        

    </body>
</html>


<script src="<?php echo BASE_URL; ?>/assets/plugins/jQuery-2.1.4.min.js"></script>
<script  src="<?php echo BASE_URL; ?>/assets/js/indexLogin.js" type="text/javascript"></script>
<script  src="<?php echo BASE_URL; ?>/assets/js/pace.min.js" type="text/javascript"></script>
