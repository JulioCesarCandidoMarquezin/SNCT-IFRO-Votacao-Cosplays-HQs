<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="text"],
        textarea {
            resize: none;
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        input[type="file"] {
            margin-bottom: 20px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 16px;
            display: block;
            margin: 0 auto; /* Centraliza o botão */
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
    <title>Upload</title>
</head>
<body>
    <form action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" autocomplete="off">

        <label for="autor_name">Nome do Autor:</label>
        <input type="text" name="autor_name" id="autor_name" autocomplete="off">

        <label for="pinture_name">Nome Original da Pintura:</label>
        <input type="text" name="pinture_name" id="pinture_name" autocomplete="off">

        <label for="description">Descrição:</label>
        <textarea name="description" id="description" rows="4"></textarea>

        <label for="class_name">Nome da Classe:</label>
        <input type="text" name="class_name" id="class_name" autocomplete="off">

        <label for="file">Arquivo:</label>
        <input type="file" name="file" id="file" accept="image/*">

        <input type="submit" value="Enviar">
    </form>
</body>
</html>