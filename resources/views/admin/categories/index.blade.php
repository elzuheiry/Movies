

<x-admin-layout>

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">{{ __("Categories") }} /</span> {{ __("All Categories") }}</h4>
    
        <!-- Basic Bootstrap Table -->
        <div class="card overflow-hidden">
          <h5 class="card-header mb-4">{{ __("All Categories") }}</h5>
          <div class="text-wrap">
            <table class="table" id="admins-table" style="width: 100%">
              <thead>
                <tr>
                  <th>{{ __("NUM") }}</th>
                  <th>{{ __("Name") }}</th>
                  <th>{{ __("Status") }}</th>
                  <th>{{ __("Actions") }}</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">                  
                @if ($categories->count() > 0)
                  @foreach ($categories as $category)
                    <tr>
                        <td><strong>{{ $category->id }}</strong></td>
                        <td>{{ $category->title }}</td>
                        <td>{{ $category->status }}</td>
                        <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>

                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route("admin.categories.edit", $category->slug) }}"
                                    ><i class="bx bx-edit-alt me-1"></i> {{ __("Edit") }}</a
                                >
                                
                                <form action="{{ route("admin.categories.destroy", $category->slug) }}" method="post">
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
            $(function() {});
        </script>
      @endpush

</x-admin-layout>