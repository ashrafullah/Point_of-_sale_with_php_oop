  var url = "http://localhost/POS_LICT_BATCH4/employee";
 
    //display modal form for product editing
    $(document).on('click','.open_modal',function(){
        var id = $(this).val();
    
        $.get(url + '/' + id, function (data) {
            //success data
            console.log(data);
            $('#id').val(data.id);
            $('#e_name').val(data.e_name);
            $('#m_name').val(data.m_name);
            $('#f_name').val(data.f_name);
            $('#p_address').val(data.p_address);
            $('#per_address').val(data.per_address);
            $('#designation').val(data.designation);
            $('#department').val(data.department);
            $('#mobile_number').val(data.mobile_number);
            $('#email').val(data.email);
            $('#date').val(data.date);
            $('#btn-save').val("Update");
            $('#modal').modal('show');


        }) 
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
            e_name: $('#e_name').val(),
            m_name: $('#m_name').val(),
            f_name: $('#f_name').val(),
            p_address: $('#p_address').val(),
            per_address: $('#per_address').val(),
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
        if (state == "Update"){
            type = "PUT"; //for updating existing resource
            my_url += '/' + id;
        }
        console.log(formData);
    var postData = new FormData($("#frmProducts")[0]);

$.ajax({
    type: type,
    cache:false,
    url: my_url,
    data: postData,
    processData: false,
    contentType: false,
    dataType: 'json',
    //  beforeSend:function(){
    //   $("#btn-save").val('Updated Post');
    //   // $("#btn_add").val('Added Post');

    // },
    success: function (data) {

        console.log(data);
        var i=1;
          

        var post = '<tr style="color:green;text-transform:uppercase" id="post' 
        + data.id + '"><td>' 
        + i++ + '</td><td>' 
        + data.ptitle + '</td><td>' 
        + data.cname + '</td><td>' 
        + data.pcontent + '</td><td>' 
        + data.status + '</td><td>'
        + data.image + '</td>';
        post += '<td><button class="btn btn-success btn-detail open_modal" value="' + data.id + '"><i class="fa fa-edit"></i>&nbsp;Edit</button>';
        post += ' <button class="btn btn-danger btn-delete delete-post" value="' + data.id + '"><i class="fa fa-remove"></i>&nbsp;Delete</button></td></tr>';
        if (state == "Add"){ //if user added a new record
            
            $('#post-list').append(post);
             toastr.info('Post Created Successfully.', 'Success Alert', {timeOut: 5000});
        }else{ //if user updated an existing record
            $("#post" + id).replaceWith( post ).val();
             toastr.success('Post Updated Successfully.', 'Success Alert', {timeOut: 5000});
        }
        $('#frmProducts').trigger("reset");
        $('#modal').modal('hide');
       
    },
    error: function (data) {
        console.log('Error:', data);
    }
});
    });