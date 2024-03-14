<section id="why-us" class="why-us section-bg">
  <div class="container" data-aos="fade-up">
    <div class="row gy-4 p-5 text-center">
      <div class="row">
        <div class="col d-flex justify-content-end p-3">
          <button class="btn btn-dark">
            <a class="text-white" href="{{route('form_category')}}">Create category</a>
          </button>
        </div>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Category</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
          @forelse($categories as $category)
          <tr>
            <th scope="row">
              <a class="text-dark" href="{{ route('show_category', $category->id) }}">{{ $category->nombre_categoria }}</a>
            </th>
            <td>
              <button class="btn btn-dark"><a href="{{ route('edit_category', $category->id) }}" class="text-white">EDIT</a></button>
            </td>
            <td>
              <form method="POST" action="{{ route('delete_category', $category->id) }}">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-light">DELETE</button>
            </form>
            </td>
          </tr>
          @empty
          <tr>
            <th scope="row">
              There are not categories
            </th>
            <td></td>
            <td></td>
          </tr>
          @endforelse
        </tbody>
      </table>
     </div>
    </div>
  </div>
</section><!-- End Why Us Section -->


