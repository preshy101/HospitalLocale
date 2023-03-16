@extends('admin.admin_master')
@section('admin')
<div class="clearfix" style="float: right">
 <button  type="button"
        class="  collapsed btn btn-primary"
        data-bs-toggle="collapse"
        data-bs-target="#accordionIcon-1"
        aria-controls="accordionIcon-1"
        class="btn btn-primary mb-3" ><i class="bx bx-plus" ></i> Add Med-Service</button>

                </div>

<br>

  <div class="container-xxl flex-grow-1 container-p-y">

              <h4 class="fw-bold    "><span class="text-muted fw-light">Med-Service /</span> view</h4>

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
                     <h5 class="card-header">Add med-Service</h5>
                        <div class="accordion-body">

               <form
                            action="{{route('store.medService')}}"
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
                        <label for="html5-text-input" class="col-md-2 col-form-label">icon</label>
                        <div class="col-md-6">
                          <input class="form-control"required name="icon" type="text" placeholder="meds" id="html5-text-input" />
                        </div>
                        </div>

                        <div class="mb-3 row">
                        <label for="html5-text-input" class="col-md-2 col-form-label">Service</label>
                        <div class="col-md-6">
                          <input class="form-control"required name="name" type="text" placeholder="meds" id="html5-text-input" />
                        </div>
                        </div>


                        <div class="mb-3 row">
                        <label for="html5-text-input" class="col-md-2 col-form-label">Description</label>
                        <div class="col-md-6">
                            <input
                                class="form-control"
                              type="text"
                              name="description"
                              autofocus required

                            />                        </div>
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
                    <h5 class="card-header">Doctor</h5>
                    <!-- Account -->
                    <div class="card-body">

                <div class="table-responsive text-nowrap mx-1">
                  <table id="table" class="m-3 table table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>service</th>
                        <th>description</th> 
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @if($meds)
                        @foreach ($meds as $key => $med)
                        <tr>
                            <td>{{$key+1}}</td>

                            <td>{{$med->name}}</td>

                            <td>{{$med->description}}</td>

                            <td>
                              {{--   <a
                                href="{{route('view.doctor', $doctor->id)}}"
                                class="btn btn-info text-white">
                                    view
                                </a>
                                <a
                                href="{{route('edit.doctor', $doctor->id)}}"
                                 class="btn btn-warning text-white">
                                    Edit
                                </a>
                                <a
                                href="{{route('delete.doctor', $doctor->id)}}"
                                class="btn btn-danger text-white">
                                    Delete
                                </a>--}}
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
