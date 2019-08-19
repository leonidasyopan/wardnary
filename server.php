<?php
    session_start();

    // initializing variables
    $username = "";
    $email    = "";
    $errors_login = array();
    $errors_register = array();  

    // connect to the database
    $db = mysqli_connect('localhost', 'wardnary_admin', 'wb4CMDHlT13OwCYQ', 'wardnary');

    // REGISTER USER
    if (isset($_POST['reg_user'])) {
    // receive all input values from the form
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password_1 = mysqli_real_escape_string($db, $_POST['password1']);
        $password_2 = mysqli_real_escape_string($db, $_POST['password2']);

        // DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
        date_default_timezone_set('America/Sao_Paulo');

        $user_create_date = strftime("%B %d, %Y"); // date the user was created

        // form validation: ensure that the form is correctly filled ...
        // by adding (array_push()) corresponding error unto $errors array
        if (empty($username)) { array_push($errors_register, "Escolha um usuário"); }
        if (empty($email)) { array_push($errors_register, "Preencha o e-mail"); }
        if (empty($password_1)) { array_push($errors_register, "Defina sua senha"); }
        if ($password_1 != $password_2) {
        array_push($errors_register, "As duas senhas não correspondem");
        }

        // first check the database to make sure 
        // a user does not already exist with the same username and/or email
        $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
        $result = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($result);

        if ($user) { // if user exists
        if ($user['username'] === $username) {
            array_push($errors_register, "Usuário já existente");
        }

        if ($user['email'] === $email) {
            array_push($errors_register, "Esse e-mail já foi usado");
        }
        }

        // Finally, register user if there are no errors in the form
        if (count($errors_register) == 0) {
        $password = md5($password_1);//encrypt the password before saving in the database

        $query = "INSERT INTO users (username, email, password, user_create_date) 
                    VALUES('$username', '$email', '$password', '$user_create_date')";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "Parabéns, agora você está logado.";
        header('location: index.php');
        }
    }

    // LOGIN USER
    if (isset($_POST['login_user'])) {
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);

        if (empty($username)) {
            array_push($errors_login, "Digite seu usuário");
        }
        if (empty($password)) {
            array_push($errors_login, "Digite sua senha");
        }

        if (count($errors_login) == 0) {
            $password = md5($password);
            $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
            $results = mysqli_query($db, $query);
            if (mysqli_num_rows($results) == 1) {
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "Você está conectado";
                header('location: index.php');
            }else {
                array_push($errors_login, "Seu usuário e/ou senha estão incorretos");
            }
        }
    }

?>