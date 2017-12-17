@extends('Admin.master')
@section('main_content')

<div class="row blank-page">
<div class="card">
<div class="card-block">
<ol>Dashboard / Employee List</ol>
<span style="float: right">
    <button  id="btn_add" name="btn_add" class="btn btn-primary">
        <i class="icon-plus"></i>&nbsp;
        Add Employee
    </button>
</span>
</div>
<div class="row">
<div class="col-xs-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">Total Employee List</h4>
<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
<div class="heading-elements">
    <ul class="list-inline mb-0">
        <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
        <li><a data-action="reload"><i class="icon-reload"></i></a></li>
        <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
        <li><a data-action="close"><i class="icon-cross2"></i></a></li>
    </ul>
</div>
</div>
<div class="card-body collapse in">
<div class="card-block card-dashboard">
   
</div>
<div class="table-responsive">
     <table class="display table">
        <thead class="thead-inverse">
            <tr>
                <th width="5%">Sl</th>
                <th width="5%">Details</th>
                <th width="20%">F Name</th>
                <th width="35%">P Address</th>
                <th width="35%">Mobile No</th>
               <th width="10%">Action
               <th width="">--
               </th>
            </tr>
        </thead>
  <tbody id="employee-list" name="employee-list">
          @php
            $i=1
          @endphp
            @foreach ($employees as $employee)
          <tr id="employee{{ $employee->id }}">
            <td>{{$i++}}</td>
            <td>
              <a class="btn btn-success" href="{{ url('employeed/'.$employee->id) }}">
                 <i class="icon-eye"></i>&nbsp;
              </a>
            </td>
            <td>{{$employee->employee_name}}</td>
            <td>
              {{$employee->present_address}}
            </td>
            <td>
              {{$employee->mobile_number}}
            </td>
            <td>
          <button class="btn btn-primary btn-detail open_modal" value="{{ $employee->id }}">
              <i class="icon-edit"></i>&nbsp;Edit
          </button>
        </td>
        <td>
      <button class="btn btn-danger btn-delete delete-employee" value="{{$employee->id}}" onclick="return confirm('Are You Sure To Deleted')">
              <i class="icon-remove"></i>&nbsp;Delete
      </button>
            </td>
              </tr>
            @endforeach
        </tbody>  
        
    </table>
    <!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title text-info" id="myModalLabel">
            <i class="fa fa-list"></i>&nbsp;Title</h4>
            
        </div>
        <div class="modal-body">
        <form id="frmProducts" name="frmProducts" class="form-horizontal" novalidate="" role="form">
            <div class="form-group">
             <label for="inputName" class="col-sm-4 control-label">Employee Name</label>
               <div class="col-sm-8">
                <input type="text" class="form-control has-error" id="employee_name" placeholder="Enter Employee Name" name="employee_name" value="">
               </div>
              
            </div>
<div style="clear: both;"></div>
            <div class="form-group">
             <label for="inputName" class="col-sm-4 control-label">Mother Name</label>
               <div class="col-sm-8">
                <input type="text" class="form-control has-error" id="mother_name" name="mother_name" placeholder="Enter Mother Name" value="">
               </div>
              
            </div>
            <div class="form-group">
             <label for="inputName" class="col-sm-4 control-label">Father Name</label>
               <div class="col-sm-8">
                <input type="text" class="form-control has-error" id="father_name" name="father_name" placeholder="Enter Father Name" value="">
               </div>
              
            </div>
            <div class="form-group">
             <label for="inputName" class="col-sm-4 control-label">Present Address</label>
               <div class="col-sm-8">
                <input type="text" class="form-control has-error" id="present_address" name="present_address" placeholder="Enter Present Address" value="">
               </div>
              
            </div>
            <div class="form-group">
             <label for="inputName" class="col-sm-4 control-label">Parmanent address</label>
               <div class="col-sm-8">
                <input type="text" class="form-control has-error" id="parmanent_address" name="parmanent_address" placeholder="Enter Parmanent Address" value="">
               </div>
              
            </div>
            <div class="form-group">
             <label for="inputName" class="col-sm-4 control-label">Designation </label>
               <div class="col-sm-8">
                <input type="text" class="form-control has-error" id="designation" name="designation" placeholder="Enter Designation Name" value="">
               </div>
              
            </div>
            <div class="form-group">
             <label for="inputName" class="col-sm-4 control-label">Department
             </label>
               <div class="col-sm-8">
                <input type="text" class="form-control has-error" id="department" name="department" placeholder="Enter Employee Name" value="">
               </div>
              
            </div>
            <div class="form-group">
             <label for="inputName" class="col-sm-4 control-label">Email Address</label>
               <div class="col-sm-8">
                <input type="text" class="form-control has-error" id="email" name="email" placeholder="Enter Email Address" value="">
               </div>
              
            </div>
            <div class="form-group">
             <label for="inputName" class="col-sm-4 control-label">Mobile Number</label>
               <div class="col-sm-8">
                <input type="text" class="form-control has-error" id="mobile_number" name="mobile_number" placeholder="Enter Mobile Number" value="">
               </div>
              
            </div>
{{--             <div class="form-group">
             <label for="inputName" class="col-sm-4 control-label">Joining Date</label>
               <div class="col-sm-8">
            <input type="date" class="form-control has-error" id="date" name="date" value="">
               </div>
              
            </div> --}}

            <div class="form-group">
             <label for="inputDetail" class="col-sm-4 control-label"></label>

          <input type="submit" name="btn-save" value="add" class="btn btn-primary m-3 p-1" id="btn-save">
                <input type="hidden" id="id" name="id" value="0">
            </div>
        </form>
        </div>
        
        <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">
        <span aria-hidden="true">
          <i class="fa fa-remove"></i>
           Close
         </span>
        </button>
       
        </div>
    </div>
  </div>
</div>
<!-- end modal div -->


  </div>


</div>
</div>
</div>
</div>



</div>

<meta name="_token" content="{!! csrf_token() !!}" />
      
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

  <script src="{{ asset('public/Admin/')}}/js/employee.js"></script>
</div>


 

@endsection