    <!-- ======= Book A Table Section ======= -->
    <section id="book-a-table" class="book-a-table">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Book A Table</h2>
                <p>Creating a <span>Delicious</span> Plate</p>
            </div>

            <div class="row g-0">

                <div class="col-lg-4 reservation-img" style="background-image: url(assets/img/reservation.jpg);"
                    data-aos="zoom-out" data-aos-delay="200"></div>

                <div class="col-lg-8 d-flex align-items-center reservation-form-bg">
                    <form action="{{route('store_plate')}}" method="POST" role="form" class="" data-aos="fade-up"
                        data-aos-delay="100">
                        @csrf
                        <div class="row gy-4">
                            <div class="col-lg-4 col-md-6">
                                <input type="text" name="nombre_plato" class="form-control" id="nombre_plato"
                                    placeholder="Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                                <div class="validate"></div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <input type="text" class="form-control" name="descripcion" id="descripcion"
                                placeholder="Description">
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <input type="number" class="form-control" name="precio" id="precio"
                                placeholder="Price">
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <input type="number" name="costo" class="form-control" id="costo"
                                placeholder="Cost">
                            </div>
                            {{-- categories option --}}
                            <div class="col-lg-4 col-md-6">
                                <select name="id_categoria" id="id_categoria">
                                    <option value="null">select category</option>
                                    @forelse ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->nombre_categoria}}</option>
                                    @empty
                                    <option value="null">No categories added</option>
                                    @endforelse

                                </select>
                            </div>
                            <div class="text-center"><button type="submit">Add</button></div>
                    </form>
                </div><!-- End Reservation Form -->

            </div>

        </div>
    </section><!-- End Book A Table Section -->
