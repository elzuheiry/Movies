

@if ($movies->count() > 0)
@foreach ($movies as $movie)
    <tr>
        <td><strong>{{ $movie->id }}</strong></td>
        <td>{{ $movie->title }}</td>
        <td>{{ $movie->description }}</td>
        <td>{{ $movie->rate }}</td>
        <td>{{ $movie->category->title }}</td>
        <td>{{ $movie->status }}</td>
        <td>
        <div class="dropdown">
            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                <i class="bx bx-dots-vertical-rounded"></i>
            </button>

            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route("admin.movies.edit", $movie->slug) }}"
                    ><i class="bx bx-edit-alt me-1"></i> {{ __("Edit") }}</a
                >
                
                <form action="{{ route("admin.movies.destroy", $movie->slug) }}" method="post">
                    @csrf
                    @method("DELETE")

                    <button class="dropdown-item" type="submit"
                        ><i class="bx bx-trash me-1"></i> {{ __("Delete") }}</button
                    >
                </form>
            </div>
        </div>
        </td>
    </tr>
@endforeach
@else
    <tr>
    <td>{{ __("No data found.!") }}</td>
    </tr>
@endif