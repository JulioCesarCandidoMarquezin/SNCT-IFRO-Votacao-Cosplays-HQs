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
          {{-- @php
            $carouselImages = [];
            foreach ($items as $item) {
              $carouselImages[] = $item->image_url;
            }    
          @endphp
          <x-carousel :images="$carouselImages" /> --}}
            @foreach ($items->items() as $item)

              @foreach($item->images_url as $image_url)
                <img src="{{ $image_url }}" alt="Image">
              @endforeach
              <form action="{{route('hqs.destroy', $item->id )}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Deletar</button>
              </form>
                {{-- <li> --}}
                    {{-- <details>
                        <summary>
                            Imagem
                        </summary> --}}

                        {{-- @if ($item->cosplay)
                          <img src="{{ $item->cosplay }}" alt="File">
                        @else --}}
                            
                        {{-- @endif --}}

                        {{-- <form action="{{ route('cosplays.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Deletar</button>
                        </form> --}}
                    {{-- </details> --}}
                {{-- </li> --}}
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
