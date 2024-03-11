<section id=" -us" class="why-us section-bg">
    <div class="container" data-aos="fade-up">

      <div class="row d-flex justify-content-center gy-4">
        <div class="col-lg-8 d-flex align-items-center">
          <div class="row gy-4">
            @forelse($categories as $category)
            <div class="col-xl-4" data-aos="fade-up" data-aos-delay="200">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center shadow rounded-3">
                  <i class="bi bi-clipboard-data"></i>
                  <h4>
                      <a class="text-dark" href="{{ route('show_category', $category->id) }}">{{ $category->nombre_categoria }}</a>
                  </h4>
                  <div class="row g-2">
                    <div class="col-auto">
                        <button class="btn btn-primary"><a href="{{ route('edit_category', $category->id) }}" class="text-white">EDIT</a></button>
                    </div>
                    <div class="col-auto">
                        <form method="POST" action="{{ route('delete_category', $category->id) }}">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-light">DELETE</button>
                        </form>
                    </div>
                  </div>

                </div>
              </div><!-- End Icon Box -->
            @empty
                
            @endforelse


          </div>
        </div>

      </div>

    </div>
  </section><!-- End Why Us Section -->