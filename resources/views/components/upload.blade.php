@include('components.css.upload')

<form method="POST" action={{ route($route) }} enctype="multipart/form-data">
    @csrf
    @yield('content')
    <input type="submit" value="Enviar">
</form>