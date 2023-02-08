

<x-admin-layout>

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">{{ __("Movies") }} /</span> {{ __("All Movies") }}</h4>
    
        <!-- Basic Bootstrap Table -->
        <div class="card overflow-hidden">
          <h5 class="card-header mb-4">{{ __("All Movies") }}</h5>

          <div class="row mb-3 ml-3 mr-3">
            <div class="col-lg-4">
              <label for="">{{ __("Filter by Rate") }}</label>
              <select id="rate" style="display:block; width:100%; height:40px">
                <option disabled selected>{{ __("Select Rate") }}</option>
                <option value="3">{{ __("+ 3") }}</option>
                <option value="5">{{ __("+ 5") }}</option>
                <option value="7">{{ __("+ 7") }}</option>
                <option value="9">{{ __("+ 9") }}</option>
                <option value="10">{{ __("10") }}</option>
                
              </select>
            </div>

            <div class="col-lg-4">
              <label for="">{{ __("Filter by Category") }}</label>
              <select id="category" style="display:block; width:100%; height:40px">
                <option disabled selected>{{ __("Select Category") }}</option>
                @foreach ($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
              </select>
            </div>

            <div class="col-lg-4">
              <label for="">{{ __("Search") }}</label>
              <input type="text" id="search" placeholder="Search..." style="display:block; width:100%; height:40px">
            </div>
          </div>

          <div class="text-wrap">
            <table class="table" id="admins-table" style="width: 100%">
              <thead>
                <tr>
                  <th>{{ __("NUM") }}</th>
                  <th>{{ __("Title") }}</th>
                  <th>{{ __("Description") }}</th>
                  <th>{{ __("Rate") }}</th>
                  <th>{{ __("Category") }}</th>
                  <th>{{ __("Status") }}</th>
                  <th>{{ __("Actions") }}</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0" id="movies">
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
              </tbody>
            </table>
          </div>
          
        </div>
        <!--/ Basic Bootstrap Table -->
      </div>
  
      @push('scripts')
        <script type="text/javascript">
            $(function() {
              $(document).on("keyup", "#search", function (e) {
                let data = $(this).val();

                $.ajax({
                    type: "GET", 
                    url: '{{ route("admin.movies.filter") }}',
                    data: {
                        "search": data
                    },
                    cache: false,

                    success: function (response) {
                        $("#movies").html(response);
                    }
                });
              });

              $(document).on("change", "#category", function (e) {
                let data = $(this).find(":selected").val();

                $.ajax({
                    type: "GET", 
                    url: '{{ route("admin.movies.filter") }}',
                    data: {
                        "category": data
                    },
                    cache: false,

                    success: function (response) {
                        $("#movies").html(response);
                    }
                });
              });

              $(document).on("change", "#rate", function (e) {
                let data = $(this).find(":selected").val();

                $.ajax({
                    type: "GET", 
                    url: '{{ route("admin.movies.filter") }}',
                    data: {
                        "rate": data
                    },
                    cache: false,

                    success: function (response) {
                        $("#movies").html(response);
                    }
                });
              });
            });
        </script>
      @endpush

</x-admin-layout>