<div class="container pt-5">
  <div class="row">
    <div class="col-lg-3 col-md-4">
      <div class="collection-menu text-center mt-30">
        <h4 class="collection-tilte">Areas</h4>
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          @foreach($areas as $area)
          <a class="@if($loop->first) active @endif" id="v-pills-furniture-tab" data-toggle="pill" href="#v-pills-{{$area->id}}" role="tab" aria-controls="v-pills-{{$area->id}}" aria-selected="true">{{$area->nombre}}</a>
          @endforeach
        </div>
      </div>
    </div>
    <div class="col-lg-9 col-md-8">
      <div class="tab-content" id="v-pills-tabContent">
        @foreach($areas as $area)
        <div class="tab-pane fade show @if($loop->first) active @endif" id="v-pills-{{$area->id}}" role="tabpanel" aria-labelledby="v-pills-furniture-tab">
          <div class="product-items mt-30">
            <div class="row product-items-active">
              @foreach($area->productos as $producto)
              <div class="col-md-4">
                <div class="single-product-items">
                  <div class="product-item-image">
                    <div id="carouselExampleControls-{{$producto->id}}" class="carousel slide" data-ride="carousel">
                      <div class="carousel-inner">
                        @foreach($producto->fotos as $foto)
                        <div class="carousel-item @if($loop->first) active @endif">
                          <img class="d-block w-100" src="{{asset($foto->path)}}" alt="First slide">
                        </div>
                        @endforeach
                      </div>
                      <a class="carousel-control-prev" href="#carouselExampleControls-{{$producto->id}}" role="button" data-slide="prev" style="position: absolute; top: 50%;">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleControls-{{$producto->id}}" role="button" data-slide="next" style="position: absolute; top: 50%; height: 100%; ">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>

                    </div>
                  </div>
                  <div class="product-item-content text-center mt-30">
                    <h5 class="product-title"><a href="#">{{$producto->descripcion}}</a></h5>
                    <span class="regular-price">${{$producto->precio_vendido}}</span> <br>
                    <span class="regular-price">Disponibles: {{$producto->disponibles}}</span> <br>
                    @guest
                    <a href="#" class="btn btn-warning"  data-toggle="modal" data-target="#registrarse">Comprar</a>
                    @else
                    <a href="#" onclick="comprar({{$producto->id}})" class="btn btn-info">Comprar</a>
                    @endguest
                  </div>
                </div>
              </div>
              @endforeach

            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
