<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resetar E-mail | Wardnary | Conectando os membros e a história das unidades da igreja</title>  

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/wardnary/common/head-imports.php'; ?>

    <!-- This is the style for the login page -->
    <link rel="stylesheet" href="css/login-style.css" type="text/css">

</head>
<body>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="login.php" method="POST" id="register-form">
            <h1>Criar conta</h1>            
            <span>Use seu e-mail para se cadastrar</span>

            <?php include('errors_register.php'); ?>

            <fieldset>
                <input type="text" name="username" id="username" placeholder="Usuário" value="<?php echo $username; ?>">
                <input type="email" name="email" id="email" placeholder="E-mail" value="<?php echo $email; ?>">
                <input type="password" name="password1" id="password1" placeholder="Senha">
                <input type="password" name="password2" id="password2" placeholder="Repetir Senha">
                <button type="submit" class="btn" name="reg_user">Cadastre-se</button>
            </fieldset>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="enter_email.php" method="POST" id="send-reset-email-form">
            <h1>Recupere sua senha</h1>   

            <span>E-mail usado quando criou sua conta.</span>

            <?php include('errors_email.php'); ?>

            <fieldset>
                <input type="email" name="email" id="email" placeholder="E-mail">
                <button type="submit" class="btn" name="reset-password">Enviar e-mail</button>
            </fieldset>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Não lembra a senha?</h1>
				<p>Se você esqueceu sua senha, clique aqui para enviar um e-mail de recuperação.</p>
				<button class="ghost" id="signIn">Recuperar Senha</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Olá, irmão(ã)!</h1>
				<p>Se você ainda não tem uma conta, clique aqui para fazer seu cadastro.</p>
				<button class="ghost" id="signUp">Cadastre-se</button>
			</div>
		</div>
	</div>
</div>
    
    <!-- JavaScript app para transitar entre o painel de login e o de cadastro -->
    <script src="js/login-register-switch.js"></script>

    <!-- Importing FontAwesome icons -->
    <script src="https://kit.fontawesome.com/d92ab94eeb.js"></script>

</body>
</html>