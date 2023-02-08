

<x-admin-layout>

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">{{ __("Category") }}/</span> {{ __("Publish New Category") }}</h4>

        <!-- Basic Layout -->
        <div class="row">
          <div class="col-xl">
            <div class="card mb-4">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{ __("Publish New Category") }}</h5>
                <small class="text-muted float-end">{{ __("Publish New Category") }}</small>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route("admin.categories.store") }}" autocomplete="off">
                    @csrf
                    @method("POST")

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
                                placeholder="type here the name"
                                aria-label="John Doe"
                                autofocus
                                value="{{ old('title') }}"
                                aria-describedby="Name2"
                            />
                        </div>
                        <div class="error">
                        @error('title')
                            <p>{{ $message }}</p>
                        @enderror
                        </div>
                    </div>
                    
                  
                  <button type="submit" class="btn btn-primary">{{ __("Publish") }}</button>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>

</x-admin-layout>