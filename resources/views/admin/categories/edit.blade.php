


<x-admin-layout>

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">{{ __("User") }}/</span> {{ __("Update New User") }}</h4>

        <!-- Basic Layout -->
        <div class="row">
          <div class="col-xl">
            <div class="card mb-4">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{ __("Update New User") }}</h5>
                <small class="text-muted float-end">{{ __("Update New User") }}</small>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route("admin.categories.update", $category->slug) }}" autocomplete="off">
                    @csrf
                    @method("PATCH")

                    {{-- Title --}}
                    <div class="mb-3">
                        <label class="form-label" for="Name">{{ __("Title")  }}</label>
                        <div class="input-group input-group-merge">
                            <span id="Name2" class="input-group-text"
                                ><i class="bx bx-user"></i
                            ></span>
                            <input
                                type="text"
                                class="form-control"
                                id="Name"
                                name="title"
                                placeholder="type here the Tile"
                                value="{{ old('title', $category->title) }}"
                            />
                        </div>
                        <div class="error">
                        @error('title')
                            <p>{{ $message }}</p>
                        @enderror
                        </div>
                    </div>

                    {{-- Status --}}
                    <div class="mb-3">
                        <div class="form-check">
                        <input
                            name="status"
                            class="form-check-input"
                            type="radio"
                            value="active"
                            id="active"
                            {{ $category->status == "active" ? "checked" : "" }}
                        />
                        <label class="form-check-label" for="active">{{ __("Active") }}</label>
                        </div>

                        <div class="form-check">
                        <input
                            name="status"
                            class="form-check-input"
                            type="radio"
                            value="inactive"
                            id="inactive"
                            {{ $category->status == "inactive" ? "checked" : "" }}
                        />
                        <label class="form-check-label" for="inactive">{{ __("Inactive") }}</label>
                        </div>
                    </div>
                    
                  
                  <button type="submit" class="btn btn-primary">{{ __("Update") }}</button>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>

</x-admin-layout>