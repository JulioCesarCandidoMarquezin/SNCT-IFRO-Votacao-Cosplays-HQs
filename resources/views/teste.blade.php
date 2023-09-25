<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <style>
            img {
                height: 200px;
            }
        </style>
        <title>Document</title>
    </head>
    <body>
        <ul>
            @foreach ($items->items() as $item)
                <li>
                    <details>
                        <summary>
                            Imagem
                        </summary>
                        <img src="{{ route('cosplay.show', $item->id) }}" alt="File">
                    </details>
                </li>
            @endforeach
        </ul>
        {{-- <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              @foreach ($cosplays as $key => $cosplay)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                  <img class="d-block w-100" src="{{ route('cosplay.show', $cosplay->id) }}" alt="Imagem {{ $key }}">
                </div>
              @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Próximo</span>
            </a>
          </div> --}}
          
    </body>
</html>
