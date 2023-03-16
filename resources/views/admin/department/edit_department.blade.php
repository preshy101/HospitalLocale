@extends('admin.admin_master')
@section('admin')


  <div class="container-xxl flex-grow-1 container-p-y">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
              <h4 class="fw-bold    "><span class="text-muted fw-light">Department /</span> edit</h4>

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
                     <h5 class="card-header">Edit Department</h5>
                        <div class="accordion-body">
               <form
                            action="{{route('update.department',$department->id)}}"
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
                          <input class="form-control"required value="{{$department->name}}" name="name" type="text" placeholder="meds" id="html5-text-input" />
                        </div>
                        </div>


                        <div class="mb-3 row">
                        <label for="html5-text-input"required class="col-md-2 col-form-label">Department image</label>
                        <div class="col-md-6">
                            <input
                                class="form-control"
                              type="file"
                              name="image"
                              autofocus required
                                value="{{$department->image}}"
                            />                        </div>
                        </div>

                        <div class="mb-3 row">
                        <label for="html5-text-input"  class="col-md-2 col-form-label">short Description</label>
                        <div class="col-md-6">
                          <input class="form-control"
                          value="{{$department->shortDescription}}"
                          name="shortD" type="text"required placeholder="meds" id="html5-text-input" />

                        </div>
                        </div>
                        <div class="mb-3 row">
                        <label for="html5-text-input" class="col-md-2 col-form-label">long Description</label>
                        <div class="col-md-6">
                            <textarea class="form-control"required name="longD" id="" cols="10" rows="5">{{$department->longDescription}}
                            </textarea>
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
      <script src="{{asset('assets/js/statejson.js')}}">
                </script>

                  <script type="text/javascript">

            //   $(document).ready(function(){
//                   var statey = document.getElementById('selectStatex');
//                   var searchBox, input;

//                   if(statey){
//             var statez = document.getElementById('selectStatex').value;
//                                 var lgaz = document.getElementById('lgax').value;
//                                 var lgay = document.getElementById('lgax');
//                       if (!parseInt(statez)) {
//                           input = document.getElementById('search');
//                           searchBox = new google.maps.places.SearchBox(input);
//                searchBox.addListener('places_changed', function () {
//                     var places = searchBox.getPlaces();
//                     places.forEach(function(p) {
//                     if (!p.geometry)
//                         return null;
//                 //        console.log(p.geometry.location.lat());
//                 //        console.log(p.geometry.location.lng());
//             document.getElementById('lat').value=p.geometry.location.lat();
//             document.getElementById('lng').value=p.geometry.location.lng();

//     });
//   });
//                  } else {
//                  let num = parseInt(statez);
//                   (num == 100)? num=0:'';
//                  let option = document.createElement('option');
//                  option.innerHTML= state[num].state;
//                  statey.prepend(option);
//                  var options = document.getElementById("selectStatex").options;
//                  options[0].selected = true;


//                  let num2 = parseInt(lgaz);
//                  (num2 == 100)? num2=0:'';
//                  let option2 = document.createElement('option');
//                  option2.innerHTML = state[num].lgas[num2];
//                  lgay.prepend(option2);
//                     var options2 = document.getElementById("lgax").options;
//                  options2[0].selected = true;
//                  }
//                 }


 function createMap() {
        var options = {
                types: ['(cities)'],
                componentRestrictions: {
                    country: 'NG'
                }
            };
                input = document.getElementById('search');
              var  autocomplete = new google.maps.places.Autocomplete(input, options);
            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                                var places = autocomplete.getPlaces();

                            //        console.log(p.geometry.location.lat());
                            //        console.log(p.geometry.location.lng());
                document.getElementById('lat').value = place.geometry.location.lat();
                document.getElementById('lng').value = place.geometry.location.lng();


            });

 }

 var stat;
                    var select = document.getElementById('selectState');
                    if(select){
                    for (let index = 0; index < state.length; index++) {
                        const element = state[index];
                        var option = document.createElement('option');
                        option.value = index;
                        option.innerHTML = state[index].state;
                        stat = state[index].state;
                        select.appendChild(option);
                    }}

                    $('#selectState').change(function(e){
                    var select = document.getElementById('selectState').value;
                    var lga = document.getElementById('lga');
                    lga.innerHTML = '';
                    var optionz = document.createElement('option');
                        optionz.innerHTML = 'select one';
                        lga.appendChild(optionz);
                    for (let index = 0; index < state[select].lgas.length; index++) {
                        var option = document.createElement('option');
                        option.value = state[select].lgas[index];
                        option.innerHTML = state[select].lgas[index];
                        lga.appendChild(option);
                    }
                    })


            //   })
                </script>
@endsection
