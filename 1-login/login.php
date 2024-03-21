<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <style>
         body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        h1 {
            text-align: center;
            margin-top: 50px;
        }

        form {
            max-width: 300px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            margin-top: 50px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 10px;
        }

        .form-control {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .button {
            display: block;
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }

        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Digite seus dados para acessar sua conta</h1>
    <form action="autenticar.php" method="POST">
<div class="login">
    <label for="inputemail">Digite seu email</label>
     <input type="email" class="form-control" id="inputemail " placeholder="digite seu email " name="email" required>
</div>
<div class="login">
    <label for="inputsenha">Digite sua senha </label>
     <input type="password" class="form-control" id="inputsenha " placeholder="digite sua senha " name="senha" required>
</div>
 <div>
    <button type="submit" class="button btn btn-primary"> Acessar Perfil  </button>
 </div>
    </form>
</body>
</html>