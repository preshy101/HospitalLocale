<nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
            >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div  class="navbar-nav align-items-center">

                <div class="nav-item  d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
{{--
                    <form action="{{route('order.search')}}" method="post">
                        @csrf --}}

                            <input

                    type="text"
                    style="width: 500px"
                    class="form-control border-0 shadow-none"
                    placeholder="Search by Order Number, delivery address, Pick-up address..."
                    aria-label="Search..."
                    name="search"
                    id="search"
                  />



                {{-- </form> --}}

                </div>

              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                <li class="nav-item lh-1 me-3">
                  <a
                    {{-- href="{{route('wallet')}}" --}}
                    style="color: inherit"
                    >
                    <i class="bx bx-money">
                    {{-- @php
                       $wallet = Auth::user()->wallet->balance;
                    @endphp
                    {{$wallet}} --}}
                </i>
                    </a
                  >
                </li>

                <!-- User -->
                {{-- @php
                    $id = Auth::user()->id;
                    $adminData =App\models\User::find($id);

                    @endphp --}}
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img

                          {{-- src="{{(!empty($adminData->profileImage))? url('./upload/admin_images/'.$adminData->profileImage): asset('../assets/img/avatars/1.png')}}" --}}
                          src="{{ asset('../assets/img/avatars/1.png')}}"
                      alt class="w-px-30 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item"

                      {{-- href="{{route('admin.profile')}}"--}}
                      >
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img
                                 {{-- src="{{(!empty($adminData->profileImage))? url('./upload/admin_images/'.$adminData->profileImage): asset('../assets/img/avatars/1.png')}}" --}}
                                 src="{{  asset('../assets/img/avatars/1.png')}}"
                              alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">
                                Presh Admin
                                {{-- {{$adminData->name}} {{$adminData->lastName}} --}}
                            </span>
                            <small class="text-muted"> Administration</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item"
                      {{-- href="{{route('admin.profile')}}" --}}
                      >
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Settings</span>
                      </a>
                    </li>
                    <li>

                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item"
                      {{-- href="{{route('admin.logout')}}" --}}
                      >
                        <i class="bx bx-power-off me-2 text-danger"></i>
                        <span class="align-middle text-danger">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>

          </nav>
    <div style="width: 800px; margin-left: 25px; z-index: 1000; margin-top: 80px; position: absolute; " class="card clearfix" >
                        <table class="table table-striped">
                            <tbody  id="searchOrder">

                            </tbody>
                        </table>
                        </div>
  {{-- modal for order details --}}
                        <div class="modal fade" id="exLargeModal2" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                          <div class="modal-content"  id="order-body2">

                          </div>
                        </div>
                      </div>
