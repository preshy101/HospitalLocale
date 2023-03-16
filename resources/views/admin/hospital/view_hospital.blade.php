@extends('admin.admin_master')
@section('admin')

<h4 class="fw-bold    "><span class="text-muted fw-light">Hospital /</span> view</h4>
<div class="w-100" style="background-color: aqua; height: 400px" >
    Map
</div>
  <div class="container-xxl flex-grow-1 container-p-y">


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

                   <div class="  card    my-3">

                <img class="card-img-top img-fluid" style="height: 300px; width: 100%" src="{{url('./upload/hospital/'.$hospital->image)}}" alt="Card image cap" />


                <div class="accordion-body">
                        <div class="mb-3 row">

                            <h1 class="display-1">{{$hospital->name}} </h1>

                        </div>

                        <div class="mb-3 row">
                            <h4>{{$hospital->address}} </h4>

                        </div>

                        <div class="mb-3 row">
                            <h4> {{$hospital->email}}</h4>


                        </div>

                        <div class="mb-3 row">
                            <h4>
                                {{$hospital->phoneNumber}}
                            </h4>


                        </div>



                        <div class="mb-3 row">
                        <h6>{{$hospital->state}}</h6>
                        </div>
                        <div class="mb-3 row">
                           <h6>{{$hospital->lga}}</h6>
                        </div>




                        </div>
                      </div>

                      @if ($department->name != '')

                      <div class="card my-3">
                        <div class="card-body">
                            <h4 class="card-header">Department</h4>
                            <div class="my-3 row">
                                <div class="col-4">

                                    <img class="card-img-top img-fluid " style="height: 200px; width: 200px" src="{{url('./upload/department/'.$department->image)}}" alt="Card image cap" />
                                </div>
                            <div class="col">

                        <h5>{{$department->name}}</h5>

                        <div class="my-1 row">
                        <h5>{{$department->shortDescription}}</h5>
                        </div>
                        <div class="my-1 row">
                        <h5>{{$department->longDescription}}</h5>
                        </div>
</div>
                        </div>
                      </div>
                      @endif

                      @if ($doctor)

                      <div class="card mt-3" style="margin-top: 30px">
                        <div class="card-body">
                            <h4 class="card-header">Doctor</h4>
 <div class="my-3 row">
    <div class="col-4">

        <img class="card-img-top img-fluid" style="height: 200px; width: 200px" src="{{url('./upload/doctor/'.$doctor->image)}}" alt="Card image cap" />
    </div>
<div class="col">

                        <h5>{{$doctor->name}}</h5>

                        <div class="my-1 row">
                        <h5>{{$doctor->title}}</h5>
                        </div>
                        <div class="my-1 row">
                        <h5>{{$doctor->description}}</h5>
                        </div>
                        <div class="my-1 row">
                        <a href="{{$doctor->socialLink1}}">Link 1</a>
                        <a href="{{$doctor->socialLink2}}">Link 2</a>
                        <a href="{{$doctor->socialLink3}}">Link 3</a>
                        <a href="{{$doctor->socialLink4}}">Link 4</a>
                        </div>
</div>
                        </div>
                      </div>
                      @endif

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
