var url = "http://localhost/POS_LICT_BATCH4/giftcard";
    //display modal form for product editing
    $(document).on('click','.open_modal',function(){
        var id = $(this).val();
        $.get(url + '/' + id, function (data) {
            //success data
         console.log(data);
        $('#id').val(data.id);
        $('#card_no').val(data.card_no); 
        $('#value').val(data.value);
        $('#expiry_date').val(data.date);
        $('#btn-save').val("update");
        $('#myModal').modal('show');
        $('.modal-title').text("Update Giftcard Information");
        }); 
    });

//display modal form for creating new product
$('#btn_add').click(function(){
    $('#btn-save').val("add");
    $('#frmProducts').trigger("reset");
    $('#myModal').modal('show');
    $('.modal-title').text("Added Giftcard Information");



});
//delete product and remove it from list
 $(document).on('click','.delete-employee',function(){
        var id = $(this).val();
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        $.ajax({
            type: "DELETE",
            url: url + '/' + id,
            success: function (data) {
                console.log(data);
                $("#employee" + id).remove();
                toastr.error('Employee Deleted Successfully.', 'Success Alert', {timeOut: 5000});
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
//create new product / update existing product
$("#btn-save").click(function (e) {
    $.ajaxSetup({
        headers: {
    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')

        }
    })
    e.preventDefault(); 
    var formData = {
        card_no: $('#card_no').val(),
        value: $('#value').val(),
        date: $('#expiry_date').val(),
    }
    //used to determine the http verb to use [add=POST], [update=PUT]
    var state = $('#btn-save').val();
    var type = "POST"; //for creating new resource
    var id = $('#id').val();
    var my_url = url;
    if (state == "update"){
        type = "PUT"; //for updating existing resource
        my_url += '/' + id;
    }
    console.log(formData);

$.ajax({
    type: type,
    url: my_url,
    data: formData,
    // data = JSON.parse(data),
    dataType: 'json',
    success: function (data) {
        console.log(data);

        var giftcard = '<tr style="color:blue;transition:0.3s" id="employee' + data.id + '"></tr>';

        if (state == "add"){ //if user added a new record
            $('#giftcard-list').append(giftcard);
             toastr.info('Giftcard Created Successfully.', 'Success Alert', {timeOut: 5000});
              window.location.reload(50000);
        }else{ //if user updated an existing record
            $("#giftcard" + id).replaceWith( giftcard );
             toastr.success('Giftcard Updated Successfully.', 'Success Alert', {timeOut: 500000});
               alert('Are You Sure to Upated');
               window.location.reload(50000);

        }
        $('#frmProducts').trigger("reset");
        $('#myModal').modal('hide');
       
    },
    error: function (data) {
        console.log('Error:', data);
    }
});

});