<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Hqs upload</title>
</head>
<body>
    @extends('components.upload')
    @section('content')
        <label for="name">Nome:</label>
        <input type="text" name="name" autocomplete="off">

        <label for="autor_name">Nome do Autor:</label>
        <input type="text" name="autor_name" autocomplete="off">

        <label for="class_name">Nome da turma:</label>
        <input type="text" name="class_name" autocomplete="off">

        <label for="description">Descrição:</label>
        <textarea name="description" rows="4"></textarea>

        <label for="images">Imagens:</label>
        <input type="file" name="images[]"  accept="image/*" multiple>
    @endsection
</body>
</html>