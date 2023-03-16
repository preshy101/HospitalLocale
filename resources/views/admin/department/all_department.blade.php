@extends('admin.admin_master')
@section('admin')
<div class="clearfix" style="float: right">
 <button  type="button"
        class="  collapsed btn btn-primary"
        data-bs-toggle="collapse"
        data-bs-target="#accordionIcon-1"
        aria-controls="accordionIcon-1"
        class="btn btn-primary mb-3" ><i class="bx bx-plus" ></i> Add Department</button>

                </div>

<br>

  <div class="container-xxl flex-grow-1 container-p-y">

              <h4 class="fw-bold    "><span class="text-muted fw-light">Department /</span> view</h4>

    <div class="row">
                <div class="col-md-12">

                   @if(count($errors))
                  @foreach ($errors->all() as $error)
                  <p class="alert alert-danger alert-dismissible fade show">
                    {{$error}}
                  </p>
                  @endforeach
                  @endif
                  @if(!empty($message))
                  <p class="alert alert-success alert-dismissible fade show">
                    {{$message}}
                  </p>
                  @endif
                  @if(!empty($error))
                  <p class="alert alert-warning alert-dismissible fade show">
                    {{$error}}
                  </p>
                  @endif

                  <div id="accordionIcon-1" class="accordion-collapse collapse" data-bs-parent="#accordionIcon">
                  <div class="accordion-item card clearfix  my-3">
                     <h5 class="card-header">Add Departments</h5>
                        <div class="accordion-body">

               <form
                            action="{{route('store.department')}}"
                            method="post"
                            enctype="multipart/form-data"
                            >
                                @csrf
                        <div class="mb-3 row">
                        <label for="html5-text-input" class="col-md-2 col-form-label">Hospital</label>
                        <div class="col-md-6">
                            <select class="form-control" name="hospital_id" id="">
                                @foreach ($hospitals as $hospital)
                                <option value="{{$hospital->id}}">{{$hospital->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        </div>


                        <div class="mb-3 row">
                        <label for="html5-text-input" class="col-md-2 col-form-label">department</label>
                        <div class="col-md-6">
                          <input class="form-control"required name="name" type="text" placeholder="meds" id="html5-text-input" />
                        </div>
                        </div>


                        <div class="mb-3 row">
                        <label for="html5-text-input" class="col-md-2 col-form-label">Department image</label>
                        <div class="col-md-6">
                            <input
                                class="form-control"
                              type="file"
                              name="image"
                              autofocus required

                            />                        </div>
                        </div>

                        <div class="mb-3 row">
                        <label for="html5-text-input" class="col-md-2 col-form-label">short Description</label>
                        <div class="col-md-6">
                          <input class="form-control"required name="shortD" type="text" placeholder="meds" id="html5-text-input" />

                        </div>
                        </div>
                        <div class="mb-3 row">
                        <label for="html5-text-input" class="col-md-2 col-form-label">long Description</label>
                        <div class="col-md-6">
                            <textarea class="form-control"required name="longD" id="" cols="10" rows="5"></textarea>
                        </div>
                        </div>

                        <div class="mb-3 row">
                        <label for="html5-text-input" class="col-md-2 col-form-label"> </label>
                        <div class="col-md-6">
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <input type="reset" class="btn btn-outline-secondary" value="Clear">
                        </div>
                        </div>
</form>

                        </div>
                      </div>
                    </div>

                    <div class="card  ">
                    <h5 class="card-header">Departments</h5>
                    <!-- Account -->
                    <div class="card-body">

                <div class="table-responsive text-nowrap mx-1">
                  <table id="table" class="m-3 table table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Hospital</th>
                        <th>Department</th>
                        <th>image</th>
                        <th>short description</th>
                        <th>long description</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @if($departments)
                        @foreach ($departments as $key => $department)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>
                                @php
                                 $hospital = App\Models\Hospital::findOrFail($department->hospital_id);
                                @endphp
                                {{$hospital->name}}
                            </td>
                            <td>{{$department->name}}</td>
                            <td>
                              <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                            <li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              class="avatar avatar-xs pull-up"
                              title="{{$department->name}}"
                            >

                              <img src="{{(!empty($department->image))? url('./upload/department/'.$department->image): asset('../assets/img/avatars/1.png')}}" alt="Avatar" class="rounded-circle" />

                            </li>

                          </ul>
                            </td>
                            <td>{{$department->shortDescription}}</td>
                            <td>{{$department->longDescription}}</td>

                            <td>
                                <a
                                href="{{route('view.department', $department->id)}}"
                                class="btn btn-info text-white">
                                    view
                                </a>
                                <a
                                href="{{route('edit.department', $department->id)}}"
                                 class="btn btn-warning text-white">
                                    Edit
                                </a>
                                <a
                                href="{{route('delete.department', $department->id)}}"
                                class="btn btn-danger text-white">
                                    Delete
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                  </table>
                </div>



      </div>
      </div>
      </div>
      </div>
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>


<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>
<script>
     $('#table').DataTable({

                    });
</script>

@endsection
