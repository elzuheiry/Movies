


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
                <form method="POST" action="{{ route("admin.users.update", $user->username) }}" autocomplete="off">
                    @csrf
                    @method("PATCH")

                    {{-- Name --}}
                    <div class="mb-3">
                        <label class="form-label" for="Name">{{ __("Name")  }}</label>
                        <div class="input-group input-group-merge">
                            <span id="Name2" class="input-group-text"
                                ><i class="bx bx-user"></i
                            ></span>
                            <input
                                type="text"
                                class="form-control"
                                id="Name"
                                name="name"
                                placeholder="type here the name"
                                aria-label="John Doe"
                                autofocus
                                value="{{ old('name', $user->name) }}"
                                aria-describedby="Name2"
                            />
                        </div>
                        <div class="error">
                        @error('name')
                            <p>{{ $message }}</p>
                        @enderror
                        </div>
                    </div>

                    {{-- Username --}}
                    <div class="mb-3">
                        <label class="form-label" for="Username">{{ __("Username")  }}</label>
                        <div class="input-group input-group-merge">
                            <span id="Username2" class="input-group-text"
                                ><i class="bx bx-user"></i
                            ></span>
                            <input
                                type="text"
                                class="form-control"
                                id="Username"
                                name="username"
                                placeholder="type here the Username"
                                aria-label="John Doe"
                                autofocus
                                value="{{ old('username', $user->username) }}"
                                aria-describedby="Username2"
                            />
                        </div>
                        <div class="error">
                        @error('username')
                            <p>{{ $message }}</p>
                        @enderror
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="mb-3">
                        <label class="form-label" for="Email">{{ __("Email")  }}</label>
                        <div class="input-group input-group-merge">
                            <span id="Email2" class="input-group-text"
                                ><i class="bx bx-user"></i
                            ></span>
                            <input
                                type="text"
                                class="form-control"
                                id="Email"
                                name="email"
                                placeholder="type here the Email"
                                aria-label="John Doe"
                                autofocus
                                value="{{ old('email', $user->email) }}"
                                aria-describedby="Email2"
                            />
                        </div>
                        <div class="error">
                        @error('email')
                            <p>{{ $message }}</p>
                        @enderror
                        </div>
                    </div>

                    {{-- BirthDate --}}
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">{{ __("Birth Date")  }}</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"
                                ><i class="bx bx-user"></i
                            ></span>
                            <input
                                type="date"
                                class="form-control"
                                id="basic-icon-default-fullname"
                                name="birthdate"
                                placeholder="type here the birthdate"
                                aria-label="John Doe"
                                value="{{ old("birthdate", $user->birthdate) }}"
                                autofocus
                                aria-describedby="basic-icon-default-fullname2"
                            />
                        </div>
                        <div class="error">
                            @error('birthdate')
                            <p>{{ $message }}</p>
                            @enderror
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