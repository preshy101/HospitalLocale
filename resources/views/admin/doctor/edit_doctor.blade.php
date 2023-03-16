@extends('admin.admin_master')
@section('admin')


  <div class="container-xxl flex-grow-1 container-p-y">

              <h4 class="fw-bold    "><span class="text-muted fw-light">Doctor /</span> view</h4>

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

                   <div class="  card clearfix  my-3">
                      <div class="card-body">
                            <h5 class="card-header">Add Doctor</h5>

               <form
                            action="{{route('update.doctor',$doctor->id)}}"
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
                        <label for="html5-text-input" class="col-md-2 col-form-label">Doctor</label>
                        <div class="col-md-6">
                          <input class="form-control"
                         value="{{$doctor->name}}"
                          name="name" type="text"required placeholder="meds" id="html5-text-input" />
                        </div>
                        </div>


                        <div class="mb-3 row">
                        <label for="html5-text-input" class="col-md-2 col-form-label">Doctor image</label>
                        <div class="col-md-6">
                            <input
                                class="form-control"
                              type="file"
                              name="image"
                              autofocus required
                            value="{{$doctor->image}}"
                            />                        </div>
                        </div>

                        <div class="mb-3 row">
                        <label for="html5-text-input" class="col-md-2 col-form-label">Office</label>
                        <div class="col-md-6">
                          <input class="form-control"
                          value="{{$doctor->title}}"
                           name="title" type="text"required placeholder="meds" id="html5-text-input" />

                        </div>
                        </div>
                        <div class="mb-3 row">
                        <label for="html5-text-input" class="col-md-2 col-form-label">Short Bio</label>
                        <div class="col-md-6">
                            <textarea class="form-control "required name="shortD" id="" cols="10" rows="5">{{$doctor->description}}</textarea>
                        </div>
                        </div>

                        <div class="mb-3 row">
                        <label for="html5-text-input" class="col-md-2 col-form-label">Social link</label>
                        <div class="col-md-6">
                          <input type="text"required value="{{$doctor->socialLink1}}" class="form-control col" name="socialLink1" id="">
                          <input type="text" value="{{$doctor->socialLink2}}" class="form-control col" name="socialLink2" id="">
                          <input type="text" value="{{$doctor->socialLink3}}" class="form-control col" name="socialLink3" id="">
                          <input type="text" value="{{$doctor->socialLink4}}" class="form-control col" name="socialLink4" id="">
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
      </div>
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>


<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>
<script>
     $('#table').DataTable({

                    });
</script>

@endsection
