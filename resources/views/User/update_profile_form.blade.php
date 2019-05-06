    <div class="row from-control col-sm-9">
{!! Form::model($profile,array('url' => array('update/profile'),'class'=>'form-horizontal','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}

        <input type="hidden" name="id" value="{!! $profile->id !!}">
        <input type="hidden" name="photo_hidden" value="{!! $profile->photo !!}">
<div class="form-group row">
    <div class="table-responsive" style="text-align: center;">
        <strong ><img src="{!! asset($profile->photo) !!}" alt=""></strong>
    </div>
</div>
        
 <div class="form-group row">
    <lable class="col-sm-2 control-label">First Name</lable>
    <div class="col-sm-4">
        {!! Form::text('firstname',null,array('class'=>'form-control','placeholder'=>'First Name','required')) !!}
    </div>

    <lable class="col-sm-2 control-label">Last Name</lable>
    <div class="col-sm-4">
        {!! Form::text('lastname',null,array('class'=>'form-control','placeholder'=>'Last Name','required')) !!}
    </div>
</div>

<div class="form-group row">
    <lable class="col-sm-2 control-label">Birthday</lable>
    <div class="col-sm-4">
        {!! Form::date('birthday',null,array('class'=>'form-control')) !!}
    </div>

    <lable class="col-sm-2 control-label">Photo</lable>
    <div class="col-sm-4">
        {!! Form::file('photo',null,array('class'=>'form-control')) !!}
    </div>
</div>

<div class="form-group row float-center" style="text-align: center; ">
    <div class="col-sm-12">
        <button class="btn-info btn-primary" type="submit">Save</button>
        <button class="btn-info btn-warning" type="reset">Reset</button>
    </div>
</div>
{!! Form::close() !!}
    </div>