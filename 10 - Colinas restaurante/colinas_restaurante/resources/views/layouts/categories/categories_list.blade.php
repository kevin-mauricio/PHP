<section id="about" class="about">
    <button><a href="{{route('form_category')}}">Create Category</a></button>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>NAME</th>
                <th>EDIT</th>
                <th>DELETE</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
            <tr>
                <td>
                    <a href="{{ route('show_category', $category->id) }}">{{ $category->nombre_categoria }}</a>
                </td>
                <td>
                    <button class="btn btn-primary"><a href="{{ route('edit_category', $category->id) }}" class="text-white">EDIT</a></button>
                </td>
                <td>
                    <form method="POST" action="{{ route('delete_category', $category->id) }}">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">DELETE</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3"><h1>No hay categorías registradas aún</h1></td>
            </tr>
            @endempty
        </tbody>
    </table>
</section>