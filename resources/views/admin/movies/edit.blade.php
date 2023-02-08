


<x-admin-layout>

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">{{ __("Movie") }}/</span> {{ __("Update New Movie") }}</h4>

        <!-- Basic Layout -->
        <div class="row">
          <div class="col-xl">
            <div class="card mb-4">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{ __("Update New Movie") }}</h5>
                <small class="text-muted float-end">{{ __("Update New Movie") }}</small>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route("admin.movies.update", $movie->slug) }}" autocomplete="off" enctype="multipart/form-data">
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
                                value="{{ old('title', $movie->title) }}"
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
                      <textarea class="form-control" rows="3" name="description">{{ old("description", $movie->description) }}</textarea>
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
                              value="{{ old('rate', $movie->rate) }}"
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
                      <img src="{{ asset("upload_files/movie/" . $movie->thumbnail) }}" class="my-3" alt="{{ $movie->thumbnail }}">
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
                            <option value="{{ $category->id }}" {{ (old("category_id") || $movie->category->id) == $category->id ? "selected" : "" }}>{{ $category->title }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="error">
                        @error('category_id')
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
                            {{ $movie->status == "active" ? "checked" : "" }}
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
                            {{ $movie->status == "inactive" ? "checked" : "" }}
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