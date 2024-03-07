@extends('layouts.landing')
@section('title', 'Create')

@section('content')
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center section-bg">
    <div class="container">
      <div class="row justify-content-between gy-5">
        <h1>Create Category</h1>
        <form method="POST" action="{{route('store_category')}}">
            @csrf {{-- directiva para enviar la información --}}
            <label>name</label>
            <input type="text" name="nombre_categoria">
            <label>description</label>
            <input type="text" name="descripcion_categoria">
            <input type="submit" value="CREATE">
        </form>
      </div>
    </div>
  </section><!-- End Hero Section -->

@endsection
