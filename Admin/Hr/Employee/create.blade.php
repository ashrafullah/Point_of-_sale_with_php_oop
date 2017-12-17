@extends('Admin.master')
@section('main_content')

<div class="row blank-page">
<div class="card">
<div class="card-block">
<ol>Dashboard / Add Employee</ol>
</div>


<div class="row match-height tex-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-round-controls">
                Add Employee</h4>
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
                <div class="card-block">

        <form class="form-horizontal" method="POST" action="{{ route('employee.store') }}">
                        {{ csrf_field() }}
            <div class="form-body">

                <div class="form-group{{ $errors->has('em_name') ? ' has-error' : '' }}">
                    <label for="em_name">Employee Name 
                    <span class=" text-danger">*</span>
                    </label>
                    <input type="text" id="em_name" class="form-control round" {{ old('em_name') }}  name="em_name" placeholder="Enter Employee Name">
                     @if ($errors->has('em_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('em_name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('f_name') ? ' has-error' : '' }}">
                    <label for="f_name">Fathers Name 
                    <span class=" text-danger">*</span>
                    </label>
                    <input type="text" id="f_name" class="form-control round" {{ old('f_name') }} placeholder="Enter Fathers Name"  name="f_name">
            @if ($errors->has('f_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('f_name') }}</strong>
                </span>
            @endif
                </div>
                <div class="form-group{{ $errors->has('m_name') ? ' has-error' : '' }}">
                    <label for="m_name">Mothers Name 
                    <span class=" text-danger">*</span>
                    </label>
                    <input type="text" id="m_name" class="form-control round" {{ old('m_name') }} placeholder="Enter Mothers Name" name="m_name">
            @if ($errors->has('m_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('m_name') }}</strong>
                </span>
            @endif
                </div>
                <div class="form-group{{ $errors->has('p_address') ? ' has-error' : '' }}">
                    <label for="p_address">Present Address
                    <span class=" text-danger">*</span>
                    </label>
                    <input type="text" id="p_address" class="form-control round" {{ old('p_address') }} placeholder="Enter Present Address" name="p_address">
            @if ($errors->has('p_address'))
                <span class="help-block">
                    <strong>{{ $errors->first('p_address') }}</strong>
                </span>
            @endif
                </div>

                <div class="form-group{{ $errors->has('per_address') ? ' has-error' : '' }}">
                    <label for="per_address">
                    Permanent Address<span class=" text-danger">*</span></label>
                    <input type="text" id="per_address" class="form-control round" placeholder="Enter Permanent Address" name="per_address">
     @if ($errors->has('per_address'))
                <span class="help-block">
                    <strong>
        {{ $errors->first('per_address') }}
                    </strong>
                </span>
            @endif
                </div>


                <div class="form-group{{ $errors->has(' e_designation') ? ' has-error' : '' }}">
                    <label for="e_designation">
                     Employee Designation <span class=" text-danger">*</span></label>
                     <input type="text" id="e_designation" class="form-control round" placeholder="Enter Employee Designation" name="e_designation" class="form-control round">
                    @if ($errors->has(' e_designation'))
                <span class="help-block">
                    <strong>
                {{ $errors->first(' e_designation') }}
                            </strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has(' department') ? ' has-error' : '' }}">
                    <label for="department">Department<span class=" text-danger">*</span></label>
                    <input type="text" name="department" class="form-control" placeholder="Enter Name of the department">
                    @if ($errors->has('department'))
                <span class="help-block">
                    <strong>
                {{ $errors->first('department') }}
                            </strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has(' mobile') ? ' has-error' : '' }}">
                <label for="mobile">Mobile Number<span class=" text-danger">*</span></label>
                <input type="number" name="mobile" class="form-control" placeholder="Enter Mobile Number">
                    @if ($errors->has('mobile'))
                <span class="help-block">
                    <strong>
                {{ $errors->first('mobile') }}
                            </strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has(' email') ? ' has-error' : '' }}">
                <label for="email">Email<span class=" text-danger">*</span></label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email Address">
                    @if ($errors->has('email'))
                <span class="help-block">
                    <strong>
                {{ $errors->first('email') }}
                            </strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has(' joining_date') ? ' has-error' : '' }}">
                <label for="date">Date Of Join<span class=" text-danger">*</span></label>
                <input type="date" name="joining_date" class="form-control">
                    @if ($errors->has('joining_date'))
                <span class="help-block">
                    <strong>
                {{ $errors->first('joining_date') }}
                            </strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-actions">
                <button type="button" class="btn btn-warning mr-1">
                    <i class="icon-cross2"></i> Cancel
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class="icon-check2"></i> Add Item
                </button>
            </div>
        </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>



@endsection