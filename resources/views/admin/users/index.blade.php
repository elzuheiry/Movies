

<x-admin-layout>

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">{{ __("Users") }} /</span> {{ __("All Users") }}</h4>
    
        <!-- Basic Bootstrap Table -->
        <div class="card overflow-hidden">
          <h5 class="card-header mb-4">{{ __("All Users") }}</h5>
          <div class="text-wrap">
            <table class="table" id="admins-table" style="width: 100%">
              <thead>
                <tr>
                  <th>{{ __("NUM") }}</th>
                  <th>{{ __("Name") }}</th>
                  <th>{{ __("Email") }}</th>
                  <th>{{ __("Actions") }}</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">                  
                @if ($users->count() > 0)
                  @foreach ($users as $user)
                    <tr>
                        <td><strong>{{ $user->id }}</strong></td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>

                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route("admin.users.edit", $user->username) }}"
                                    ><i class="bx bx-edit-alt me-1"></i> Edit</a
                                >
                                
                                <form action="{{ route("admin.users.destroy", $user->username) }}" method="post">
                                    @csrf
                                    @method("DELETE")

                                    <button class="dropdown-item" type="submit"
                                        ><i class="bx bx-trash me-1"></i> Delete</button
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