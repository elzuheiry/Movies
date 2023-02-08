

<x-admin-layout>
    
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
          <div class="col-lg-12 mb-4 order-0">
            <div class="card">
              <div class="d-flex align-items-center row">
                <div class="col-sm-7">
                  <div class="card-body">
                    <h5 class="card-title text-primary">{{ __("Welcome Back") . ", " . Auth::user()->name }}</h5>
                  </div>
                </div>
                <div class="col-sm-5 text-center text-sm-left">
                  <div class="card-body pb-0 px-0 px-md-4">
                    <img
                      src="{{ asset("backEnd/assets/img/illustrations/man-with-laptop-light.png") }}"
                      height="140"
                      alt="View Badge User"
                      data-app-dark-img="illustrations/man-with-laptop-dark.png"
                      data-app-light-img="illustrations/man-with-laptop-light.png"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-12 col-md-12 order-1">
            <div class="row">
              <div class="col-lg-3 col-md-3 col-6 mb-4">
                <div class="card">
                  <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                      <div class="avatar flex-shrink-0">
                        <img
                          src="{{ asset("backEnd/assets/img/icons/unicons/wallet-info.png") }}"
                          alt="Credit Card"
                          class="rounded"
                        />
                      </div>
                      <div class="dropdown">
                        <button
                          class="btn p-0"
                          type="button"
                          id="cardOpt6"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                        >
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                          <a class="dropdown-item" href="{{ route("admin.users.index") }}">{{ __("View More") }}</a>
                        </div>
                      </div>
                    </div>
                    <span>{{ __("All Users") }}</span>
                    <h3 class="card-title text-nowrap mb-1">{{ App\Models\User::whereRoleIs("user")->count() }}</h3>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-md-3 col-6 mb-4">
                <div class="card">
                  <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                      <div class="avatar flex-shrink-0">
                        <img
                          src="{{ asset("backEnd/assets/img/icons/unicons/wallet-info.png") }}"
                          alt="Credit Card"
                          class="rounded"
                        />
                      </div>
                      <div class="dropdown">
                        <button
                          class="btn p-0"
                          type="button"
                          id="cardOpt6"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                        >
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                          <a class="dropdown-item" href="">{{ __("View All") }}</a>
                        </div>
                      </div>
                    </div>
                    <span>{{ __("All Categories") }}</span>
                    <h3 class="card-title text-nowrap mb-1">{{ App\Models\Category::count() }}</h3>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-md-3 col-6 mb-4">
                <div class="card">
                  <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                      <div class="avatar flex-shrink-0">
                        <img
                          src="{{ asset("backEnd/assets/img/icons/unicons/wallet-info.png") }}"
                          alt="Credit Card"
                          class="rounded"
                        />
                      </div>
                      <div class="dropdown">
                        <button
                          class="btn p-0"
                          type="button"
                          id="cardOpt6"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                        >
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                          <a class="dropdown-item" href="">{{ __("View All") }}</a>
                        </div>
                      </div>
                    </div>
                    <span>{{ __("All Movies") }}</span>
                    <h3 class="card-title text-nowrap mb-1">{{ App\Models\Movie::count() }}</h3>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-md-3 col-6 mb-4">
                <div class="card">
                  <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                      <div class="avatar flex-shrink-0">
                        <img
                          src="{{ asset("backEnd/assets/img/icons/unicons/wallet-info.png") }}"
                          alt="Credit Card"
                          class="rounded"
                        />
                      </div>
                      <div class="dropdown">
                        <button
                          class="btn p-0"
                          type="button"
                          id="cardOpt6"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                        >
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                          <a class="dropdown-item" href="">{{ __("--") }}</a>
                        </div>
                      </div>
                    </div>
                    <span>{{ __("---") }}</span>
                    <h3 class="card-title text-nowrap mb-1">---</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>

</x-admin-layout>
