 const site_url = "http://127.0.0.1:8000/";
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});
 $('body').on('keyup','#search', function(){
    let text = $('#search').val();
    let state = $("#selectState").val();
    let lga = $('#lga').val();
    var data;
    let viewData = $("#searchOrder");
     if(text.length > 1){
        $.ajax({
            data: { search: text },
            url: site_url + "search/hospital",
            method: "post",
            beforeSend: function (request) {
                return request.setRequestHeader(
                    "XSRF-TOKEN",
                    "meta[name='csrf-token']"
                );
            },
            success: function (result) {
                console.log(result);
                $("#searchOrder").html('');

                 $("#searchOrder").append(result);

            result.forEach(element => {
                if (element.hasOwnProperty("email")) {
                    var row = `<tr>
                    <td class="d-none">${element.id}</td>
                    <td data-bs-toggle="modal"
                      data-bs-target="#exLargeModal2"
                      id="details2">Hospital Name: <b>${element.name}  </b>
                    Hospital Address: <b>${element.address} </b>  <br>
                    <small>Hospital Phone Number: <b>${element.phoneNumber}  </b> State ${element.state} L.G.A ${element.lga} </small>
                    </td>
                    </tr>`;
                    data += row;
                }
 });
                  viewData.append(data);
            },
        });

     }
     if (text.length < 1) $("#searchOrder").html('');
 })

 let dropdown2 = $("#order-body2");
  $(".table tbody").on("click", "#details2", function (e) {
      e.preventDefault();
      var driversList = document.getElementById("order-body2");

      driversList.innerHTML = "";
      var tablerow = $(this).closest("tr");
      var dataInColumn1 = tablerow.find("td:eq(0)").text();
    //   console.log(dataInColumn1);
      $.get(
        //   "http://127.0.0.1:8000/api/get-orederDetails?order_id=" +
        //       dataInColumn1,
            "https://dispatchaapp.com.ng/api/get-orederDetails?order_id=" +
                dataInColumn1,
          function (data, status) {
              //lgas retrived

              // console.log(data)
              $.each(data.data, function (key, entry) {
                  // console.log(entry.orderState);
                  var row = `
                <div class="modal-header" >
                              <h5 class="modal-title" id="exampleModalLabel4"><b>Order Number #:  </b> <span> ${
                                  entry.orderNumber
                              }</span><br> <b> Order status</b> <span>${
                      entry.orderState
                  }</span></h5>

                              <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                              ></button>
                            </div>
                            <div class="modal-body" >

                              <div class="row g-2">
                                <div class="col-6 mb-0 border rounded p-2">
                                  <label for="emailExLarge" class="form-label pb-2">Deliver To</label>
                                  <h6>${entry.deliver_to.name}</h6>
                                  <h6>${entry.deliver_to.address}</h6>
                                  <h6>${entry.deliver_to.phoneNumber}</h6>
                                </div>
                                <div class="col-6 mb-0 border rounded p-2">
                                  <label for="emailExLarge" class="form-label pb-2">Pick Up From</label>
                                    <h6>${entry.pickup.name}</h6>
                                    <h6>${entry.pickup.address}</h6>
                                    <h6>${entry.deliver_to.phoneNumber}</h6>
                                </div>
                                <div class="col-12 mb-0 border  rounded p-2">
                                  <label for="dobExLarge" class="form-label">Order</label><br>


                                        <hr>
                                    <h6>Tax <span style="float: right">${
                                        entry.costing.tax
                                    }</span></h6>
                                    <h6>Delivery Fees <span style="float: right">${
                                        entry.costing.deliveryFee
                                    }</span></h6>
                                    <h6>Delivery Tips <span style="float: right">${
                                        entry.costing.tip
                                    }</span></h6>
                                    <h6>Discount <span style="float: right">${
                                        entry.costing.discountAmount
                                    }</span></h6>
                                    <h6>Total <span style="float: right">${
                                        entry.costing.totalCost
                                    }</span></h6>
                                </div>
                                <div class="col-12 mb-0 border rounded p-2">
                               <label for="dobExLarge" class="form-label">Delivery Details</label><br><br>
                              <h6> Placed: <span> ${
                                  entry.activity_log.placementTime
                              }</span> <b class="offset-6">Driver: </b> <span>${
                      entry.assignedcarrierId != null &&
                      entry.assigned_carrier != null
                          ? entry.assigned_carrier.name
                          : ""
                  }</span></h6>
                              <h6> Requested Delivery: <span> ${
                                  entry.activity_log.expectedDeliveryTime
                              }</span> </h6>
                              <h6> Accepted: <span> ${
                                  entry.activity_log.startTime
                              }</span> </h6>
                              <h6> Delivery: <span> ${
                                  entry.activity_log.arrivedTime
                              }</span> </h6>
                              <h6  > Completed: <span> ${
                                  entry.activity_log.deliveryTime
                              }</span> </h6>

                              <h6>Delivery Instruction: </h6><span>${
                                  entry.deliveryInstruction
                              }</span>
                                </div>
                                <div class="col-12 mb-0 border rounded p-2">
                               <label for="dobExLarge" class="form-label">Payment Details</label><br><br>
                              <h6> Payment Method: <span> ${
                                  entry.paymentMethod
                              }  </span> </h6>
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Close
                              </button>
                            </div>
                    `;
                  dropdown2.append(row);
              });
          }
      );
  });

