@extends('admin.admin_master')
@section('admin')


  <div class="container-xxl flex-grow-1 container-p-y">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
              <h4 class="fw-bold    "><span class="text-muted fw-light">Hospital /</span> view</h4>

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
                     <h5 class="card-header">Edit Hospital</h5>
                        <div class="accordion-body">
                                <div class="alert alert-primary alert-dismissible" role="alert">
                        We advice you fill your address in city / landmark closest to you in situation were your home address does not appear in the google search
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                            <form
                            action="{{route('update.hospital',$hospital->id)}}"
                            method="post"
                            enctype="multipart/form-data"
                            >
                                @csrf
                        <div class="mb-3 row">
                        <label for="html5-text-input" class="col-md-2 col-form-label">Name</label>
                        <div class="col-md-6">
                          <input class="form-control"
                            value="{{$hospital->name}}"
                          name="name" type="text" placeholder="name of hospital"required id="html5-text-input" />
                        </div>
                        </div>

                        <div class="mb-3 row">
                        <label for="html5-text-input" class="col-md-2 col-form-label">address</label>
                        <div class="col-md-6">
                          <input class="form-control"
                          value="{{$hospital->address}}"
                          name="address" type="text"required placeholder="address" id="search" />

                        </div>
                        </div>

                        <div class="mb-3 row">
                        <label for="html5-text-input" class="col-md-2 col-form-label">Latitude</label>
                        <div class="col-md-6">
                         <input class="form-control"
                         value="{{$hospital->latitude}}"
                         required type="text" value="" required name="lat" id="lat">

                        </div>
                        </div>

                        <div class="mb-3 row">
                        <label for="html5-text-input" class="col-md-2 col-form-label">Longitude</label>
                        <div class="col-md-6">
                          <input required class="form-control"
                          value="{{$hospital->longitude}}"
                          type="text" value='' required name="lng" id="lng">
                        </div>
                        </div>

                        <div class="mb-3 row">
                        <label for="html5-text-input" class="col-md-2 col-form-label">email</label>
                        <div class="col-md-6">
                          <input class="form-control"
                            value="{{$hospital->email}}"
                          name="email" type="email" placeholder="email@gmail.com"required id="html5-text-input" />
                        </div>
                        </div>

                        <div class="mb-3 row">
                        <label for="html5-text-input" class="col-md-2 col-form-label">phone number</label>
                        <div class="col-md-6">
                          <input class="form-control"
                          value="{{$hospital->phoneNumber}}"
                          name="phone" type="tel" placeholder="098327634467"required id="html5-text-input" />
                        </div>
                        </div>

                        <div class="mb-3 row">
                        <label for="html5-text-input" class="col-md-2 col-form-label">Hospital image</label>
                        <div class="col-md-6">
                            <input
                                class="form-control"
                              type="file"
                              name="image"
                              value="{{$hospital->image}}"
                              autofocus required

                            />                        </div>
                        </div>

                        <div class="mb-3 row">
                        <label for="html5-text-input" class="col-md-2 col-form-label">State</label>
                        <div class="col-md-6">
                            <select autofocus required class="form-control"  name="state" id="selectState">
                                <option value="">select one</option>
                            </select>
                        </div>
                        </div>
                        <div class="mb-3 row">
                        <label for="html5-text-input" class="col-md-2 col-form-label">L.G.A</label>
                        <div class="col-md-6">
                            <select autofocus required class="form-control"  name="lga" id="lga">
                                <option value="">select one</option>
                            </select>
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
