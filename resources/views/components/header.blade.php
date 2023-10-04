<style>
    /* Estilos para o header */
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    header {
        background-color: #2e7d32;
        /* Cor de fundo do IFRO */
        color: white;
        padding: 10px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    header img {
        width: 100px;
        /* Ajuste o tamanho conforme necessário */
        height: auto;
    }

    header nav a {
        color: white;
        text-decoration: none;
        margin-left: 20px;
        font-weight: bold;
    }

    header nav a:hover {
        color: #FFD100;
        /* Cor de destaque ao passar o mouse */
    }
</style>
<header>
    <div>
        <img src="https://snct-ifro-2023.s3.sa-east-1.amazonaws.com/system/logo-ifro-cacoal-1.png" alt="IFRO Logo">
    </div>
    <div>
        <h1>SNCT Votação Cosplays & HQs</h1>
    </div>
    <nav>
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                    <a href="{{ url('/home') }}">Dashboard</a>
                @else
                    <a href="{{ route('login') }}">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </nav>
</header>