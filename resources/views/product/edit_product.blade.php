{!! Form::model($product,array('url' => array('product/update_product'),'class'=>'form-horizontal','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}

<input type="hidden" name="id" value="{!! $product->id_product !!}">
<input type="hidden" name="photo_hidden" value="{!! $product->photo !!}">
<div class="form-group row">
    <div class="table-responsive" style="text-align: center;">
        <strong ><img src="{!! asset($product->photo) !!}" alt=""></strong>
    </div>
</div>
<div class="form-group row">
    <lable class="col-sm-2 control-label">ชื่อหนังสือ</lable>
    <div class="col-sm-4">
        {!! Form::text('name_product',null,array('class'=>'form-control','placeholder'=>'ชื่อหนังสือ','required')) !!}
    </div>

    <lable class="col-sm-2 control-label">ชื่อผู้แต่ง</lable>
    <div class="col-sm-4">
        {!! Form::text('name_create',null,array('class'=>'form-control','placeholder'=>'ชื่อผู้แต่ง','required')) !!}
    </div>
</div>

<div class="form-group row">
    <lable class="col-sm-2 control-label">ราคา</lable>
    <div class="col-sm-4">
        {!! Form::text('price',null,array('class'=>'form-control','placeholder'=>'ราคา','required')) !!}
    </div>

    <lable class="col-sm-2 control-label">จำนวน</lable>
    <div class="col-sm-4">
        {!! Form::text('amount',null,array('class'=>'form-control','placeholder'=>'จำนวน','required')) !!}
    </div>
</div>

<div class="form-group row">
    <lable class="col-sm-2 control-label">เนื้อหาโดยสรุป</lable>
    <div class="col-sm-4">
        <textarea name="detail" class="form-control" id="" cols="60" rows="10" style="margin: 0px -295.672px 0px 0px; width: 466px; height: 211px;">{!! $product['detail'] !!}</textarea>
    </div>
</div>

<div class="form-group row">
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