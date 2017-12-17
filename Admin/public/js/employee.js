var url = "http://localhost/POS_LICT_BATCH4/index_customer.php";
    //display modal form for product editing
    $(document).on('click','.open_modal',function(){
        var id = $(this).val();
        $.get(url + '/' + id, function (data) {
            //success data
         console.log(data);
        $('#id').val(data.id);
        $('#customer_code').val(data.customer_code); 
        $('#customer_name').val(data.customer_name);
        $('#customer_image').val(data.customer_image);
        $('#status').val(data.status);
        $('#btn-save').val("update");
        $('#myModal').modal('show');
         $('.modal-title').text("Update Customer Information");
        }); 
    });

//display modal form for creating new product
$('#btn_add').click(function(){
    $('#btn-save').val("add");
    $('#frmProducts').trigger("reset");
    $('#myModal').modal('show');
    $('.modal-title').text("Added Employee Information");



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
        employee_name: $('#employee_name').val(),
        mother_name: $('#mother_name').val(),
        father_name: $('#father_name').val(),
        present_address: $('#present_address').val(),
    parmanent_address: $('#parmanent_address').val(),
        designation: $('#designation').val(),
        department: $('#department').val(),
        mobile_number: $('#mobile_number').val(),
        email: $('#email').val(),
        date: $('#date').val(),
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

        var employee = '<tr style="color:blue;transition:0.3s" id="employee' + data.id + '"></tr>';

        if (state == "add"){ //if user added a new record
            $('#employee-list').append(employee);
             toastr.info('Employee Created Successfully.', 'Success Alert', {timeOut: 5000});
             window.location.reload(true,10000);
        }else{ //if user updated an existing record
            $("#employee" + id).replaceWith( employee );
             toastr.success('Employee Updated Successfully.', 'Success Alert', {timeOut: 500000});
              window.location.reload(true);
        }
        $('#frmProducts').trigger("reset");
        $('#myModal').modal('hide');
       
    },
    error: function (data) {
        console.log('Error:', data);
    }
});

});