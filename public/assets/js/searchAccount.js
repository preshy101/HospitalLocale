//  const site_urlz = "http://127.0.0.1:8000/";
 const site_urlz = "https://dispatchaapp.com.ng/";
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});
 $('body').on('keyup','#search2', function(){
    let text = $('#search2').val();
    // alert(text)
    var data;
    let viewData = $("#searchOrder2");
     if(text.length > 4){
        $.ajax({
            data: { search: text },
            url: site_urlz + "search/account",
            method: "post",
            beforeSend: function (request) {
                return request.setRequestHeader(
                    "XSRF-TOKEN",
                    "meta[name='csrf-token']"
                );
            },
            success: function (result) {
                console.log(result);
                $("#searchOrder2").html("");
                //  $("#searchOrder").append(result);
                result.forEach((element) => {
                    if (element.hasOwnProperty("category")) {
                        var row = `<tr>

                    <td > Name: <b>${element.name}  ${element.lastName} </b>
                      <br>
                    <small> Phone Number: <b>${element.phoneNumber}  </b> - ${element.email} </small>
                    </td>
                    <td > <a href="${site_urlz+'search/account/for-order/'+element.id}"> <i class="bx bx-right-arrow-alt"></i> </a>   </td>
                    </tr>`;
                        data += row;
                    }
                });
                viewData.append(data);
            },
        });



     }
     if (text.length < 3) $("#searchOrder2").html('');
 })



