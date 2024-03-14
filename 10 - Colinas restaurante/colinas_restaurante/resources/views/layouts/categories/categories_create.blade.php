<!-- ======= Book A Table Section ======= -->
<section id="book-a-table" class="book-a-table">
    <div class="container" data-aos="fade-up">
        <div class="row g-0">

            <div class="col-lg-4 reservation-img" style="background-image: url(assets/img/reservation.jpg);"
                data-aos="zoom-out" data-aos-delay="200"></div>

            <div class="col-lg-8 d-flex align-items-center reservation-form-bg">
                <form method="POST" action="{{ route('store_category') }}" role="form"
                    class=" w-100 justify-content-center" data-aos="fade-up" data-aos-delay="100">
                    @csrf {{-- directiva para enviar la información --}}
                    <div class="row gy-4 d-flex justify-content-center">
                        <div class="col-auto">
                            <input type="text" name="nombre_categoria" class="form-control" id="nombre_categoria"
                                placeholder="Category name">
                            <div class="validate"></div>
                        </div>
                        <div class="col-auto">
                            <input type="text" name="descripcion_categoria" class="form-control"
                                id="descripcion_categoria" placeholder="Category description">
                            <div class="validate"></div>
                        </div>
                        @error('nombre_categoria')
                            <div class="alert alert-danger m-3 w-25">{{ $message }}</div>
                        @enderror
                        <div class="text-center m-3"><button type="submit" class="btn btn-danger w-25">Create</button>
                        </div>
                    </div>
                </form>

            </div><!-- End Reservation Form -->

        </div>

    </div>
</section><!-- End Book A Table Section -->
