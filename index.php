<?php 
    session_start(); 

    if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "Faça o login para ter acesso";
    header('location: login.php');
    }
    if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wardnary | Conectando os membros e a história das unidades da igreja</title>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/wardnary/common/head-imports.php'; ?>

</head>
<body>
    <header>

    </header>
    <main>
        <!-- notification message -->
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="error success" >
            <h3>
                <?php 
                echo $_SESSION['success']; 
                unset($_SESSION['success']);
                ?>
            </h3>
            </div>
        <?php endif ?>

        <!-- logged in user information -->
        <?php  if (isset($_SESSION['username'])) : ?>
            <p>Bem-vindo <strong><?php echo $_SESSION['username']; ?></strong></p>
            <p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
        <?php endif ?>

    </main>
    <footer>

    </footer>    
</body>
</html>