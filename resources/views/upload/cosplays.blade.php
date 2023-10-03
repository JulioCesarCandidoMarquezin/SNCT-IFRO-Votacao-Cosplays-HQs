<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Cosplay upload</title>
</head>
<body>
    @extends('components.upload')
    @section('content')
        <label for="autor_name">Nome:</label>
        <input type="text" name="autor_name" autocomplete="off">

        <label for="class_name">Nome da Classe:</label>
        <input type="text" name="class_name" autocomplete="off">

        <label for="pinture_name">Nome Original da Pintura:</label>
        <input type="text" name="pinture_name" autocomplete="off">

        <label for="description">Descrição:</label>
        <textarea name="description" rows="4"></textarea>

        <label for="cosplay">Cosplay:</label>
        <input type="file" name="cosplay"  accept="image/*">

        <label for="pinture">Pintura:</label>
        <input type="file" name="pinture"  accept="image/*">
    @endsection
</body>
</html>