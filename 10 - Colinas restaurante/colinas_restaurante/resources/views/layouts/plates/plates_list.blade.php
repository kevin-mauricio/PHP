    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu">
        <div class="container p-3" data-aos="fade-up">
            <div class="row">
                <div class="col">
                    <a class="btn btn-danger" href="{{ route('form_plate') }}">Add Plate</a>
                </div>
            </div>
          <div class="section-header">
            <h2>Our Menu</h2>
            <p>Check Our <span>Colinas Menu</span></p>
          </div>
          
          @if($categories->isNotEmpty() && $plates->isNotEmpty())
          <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <li class="nav-item">
                <a href="{{route('index_plate')}}" class="nav-link">
                    <h4>All</h4>
                </a>
            </li>
            @forelse($categories as $key => $category)
                <li class="nav-item">
                    <a class="nav-link" href="{{route('plate_by_category', $category->id )}}">
                        <h4>{{ $category->nombre_categoria }}</h4>
                    </a>
                </li><!-- End tab nav item -->
            @empty
                
            @endforelse
            </ul>
            <div class="tab-content" data-aos="fade-up" data-aos-delay="300">
    
              <div class="tab-pane fade active show" id="menu-starters">
    
                <div class="tab-header text-center">
                  <p>{{$category->nombre_categoria}}</p>
                </div>
    
                <div class="row gy-5">
                  @forelse ($plates as $plate)
                  <div class="col-lg-4 menu-item">
                      <a href="assets/img/menu/menu-item-1.png" class="glightbox"><img src="assets/img/menu/menu-item-1.png" class="menu-img img-fluid" alt=""></a>
                      <h4>{{ $plate->nombre_plato }}</h4>
                      <p class="ingredients">
                        {{ $plate->descripcion }}
                      </p>
                      <p class="price">
                        $ {{ $plate->precio }}
                      </p>
                  </div><!-- Menu Item -->
                  @empty
                  <div class="col-lg-4 menu-item mx-auto">
                      <a href="assets/img/menu/menu-item-1.png" class="glightbox"><img src="assets/img/menu/menu-item-1.png" class="menu-img img-fluid" alt=""></a>
                      <h4>No plates added</h4>
                      <p class="price">
                        $0.00
                      </p>
                  </div><!-- Menu Item -->
                  @endforelse
  
              </div><!-- End Starter Menu Content -->
          @endif
        
  
        </div>
      </section><!-- End Menu Section -->

      