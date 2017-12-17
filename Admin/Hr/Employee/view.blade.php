@extends('Admin.master')
@section('main_content')

<div class="row blank-page">
<div class="card">
<div class="card-block">
<ol>Dashboard / View Of Employee</ol>

</div>

<div class="row">
<div class="col-xs-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">View Of Employee</h4>
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
   <h3 class="text-info">
    Details Of
    {{$employee_det_id->employee_name}}
    </h3>

    <span style="float: right; padding: 5px">
        <a href="{{ url('employee') }}" class="btn btn-info">
        <i class="icon-list"></i>
            Back To Employee List
        </a>
    </span>
</div>

<div class="row">
    <div class="col-md-5">
        <div class="left">
    <ul>
        <li>Full Name</li>
        <li>Mother Name</li>
        <li>Father Name</li>
        <li>Present Address</li>
        <li>Permanent Address</li>
        <li>Designation</li>
        <li>Department</li>
        <li>Mobile No</li>
        <li>Email Address</li>
        <li>Joining Date</li>
    </ul>
    </div>

    </div>        
    <div class="col-md-6">
        <div class="right">
      <ul>
        <li>{{$employee_det_id->employee_name}}</li>
        <li>{{$employee_det_id->mother_name}}</li>
        <li>{{$employee_det_id->father_name}}</li>
        <li>{{$employee_det_id->present_address}}</li>
        <li>{{$employee_det_id->parmanent_address}}</li>
        <li>{{$employee_det_id->designation}}</li>
        <li>{{$employee_det_id->department}}</li>
        <li>{{$employee_det_id->mobile_number}}</li>
        <li>{{$employee_det_id->email}}</li>
        <li>
{{ date('F d, Y', strtotime($employee_det_id->created_at)) }}
        </li>
    </ul>
</div>
    </div> 
  

</div>
</div>
</div>
</div>
</div>
</div>


</div>



@endsection