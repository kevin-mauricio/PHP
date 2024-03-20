
<section id="why-us" class="why-us">
  <div class="container" data-aos="fade-up">
    <div class="row gy-4 p-5 text-center">
      <div class="row">
        @if($message = Session::get('alert'))
        <div class="alert alert-{{$message['color']}}" role="alert">
          {{$message['message']}}
        </div>  
        @endif
      </div>
      <div class="row">
        <div class="col d-flex justify-content-end p-3">
          <button class="btn btn-danger">
            <a class="text-white" href="{{route('form_category')}}">Create category</a>
          </button>
        </div>
        @if($categories->isNotEmpty())
        <table class="table">
          <thead>
            <tr>
              <th scope="col" class="text-start">Category</th>
              <th scope="col">Edit</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>
            @forelse($categories as $category)
            <tr>
              <th scope="row" class="text-start">
                <a class="text-dark" href="{{ route('show_category', $category->id) }}">{{ $category->nombre_categoria }}</a>
              </th>
              <td>
                <button class="btn btn-light"><a href="{{ route('edit_category', $category->id) }}" class="text-dark"><i class="bi bi-pencil-square"></i></a></button>
              </td>
              <td>
                  <button type="submit" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#idModalDelete"><i class="bi bi-trash"></i></button>
              </td>
            </tr>
            @empty
            <tr>
              <th scope="row">
                No categories added
              </th>
              <td></td>
              <td></td>
            </tr>
            @endforelse
          </tbody>
        </table>
            
        @else
        <h4>No categories added</h4>
        @endif
     </div>
    </div>
  </div>
</section><!-- End Why Us Section -->

<!-- Modal Delete -->
<div class="modal fade" id="idModalDelete" tabindex="-1" aria-labelledby="modalDelete" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h1 class="modal-title fs-5" id="modalDelete">Deleting...</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              Are you sure?
          </div>
          <div class="modal-footer">
              @if(isset($categoryToDelete))
                  <form method="POST" action="{{ route('delete_category', $categoryToDelete->id) }}">
                      @method('DELETE')
                      @csrf
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                      <button type="submit" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal">Yes</button>
                  </form>
              @endif
          </div>
      </div>
  </div>
</div>

<!-- Antes del bucle, almacena la categoría a eliminar si es necesario -->
@empty($categories)
  @php
      $categoryToDelete = null;
  @endphp
@endempty





