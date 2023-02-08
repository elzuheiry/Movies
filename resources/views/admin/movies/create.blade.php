

<x-admin-layout>

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">{{ __("Movie") }}/</span> {{ __("Publish New Movie") }}</h4>

        <!-- Basic Layout -->
        <div class="row">
          <div class="col-xl">
            <div class="card mb-4">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{ __("Publish New Movie") }}</h5>
                <small class="text-muted float-end">{{ __("Publish New Movie") }}</small>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route("admin.movies.store") }}" autocomplete="off" enctype="multipart/form-data">
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

                    {{-- Description --}}
                    <div class="mb-3">
                      <label class="form-label">{{ __("Description") }}</label>
                      <textarea class="form-control" rows="3" name="description">{{ old("description") }}</textarea>
                      <div class="error">
                        @error('description')
                            <p>{{ $message }}</p>
                        @enderror
                      </div>
                    </div>

                    {{-- Rate --}}
                    <div class="mb-3">
                      <label class="form-label">{{ __("Rate")  }}</label>
                      <div class="input-group input-group-merge">
                          <span class="input-group-text"
                              ><i class="bx bx-user"></i
                          ></span>
                          <input
                              type="text"
                              class="form-control"
                              name="rate"
                              placeholder="type here the rate"
                              value="{{ old('rate') }}"
                          />
                      </div>
                      <div class="error">
                      @error('rate')
                          <p>{{ $message }}</p>
                      @enderror
                      </div>
                    </div>

                    {{-- Picture --}}
                    <div class="mb-3">
                      <label class="form-label">{{ __("Picture") }}</label>
                      <div class="input-group">
                          <label class="input-group-text">{{ __("Upload") }}</label>
                          <input type="file" name="thumbnail" class="form-control" />
                      </div>
                      <div class="error">
                        @error('thumbnail')
                          <p>{{ $message }}</p>
                        @enderror
                      </div>
                    </div>

                    {{-- Select Category --}}
                    <div class="mb-3">
                      <label class="form-label">{{ __("Select Category") }}</label>
                      <div class="input-group">
                        <label class="input-group-text">{{ __("Category") }}</label>
                        <select class="form-select" name="category_id">
                          <option disabled selected>{{ __("Select Category") }}</option>
                          @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old("category_id") == $category->id ? "selected" : "" }}>{{ $category->title }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="error">
                        @error('category_id')
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