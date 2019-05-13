@extends('Layout.Index')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <p style="text-align:right"><button class="btn btn-primary add-product"><li class="fa fa-product-hunt"></li> เพิ่มสินค้า</button></p>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            @include('product.list_product_element')
        </div>
    </div>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--Modal add profile--}}
    <div class="modal fade add-product-modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #9BA2AB;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color: #bbbfc3;">Add Product</h4>
                </div>
                <div class="modal-body">
                    {!! Form::model(null,array('url' => array('product/insert_product'),'class'=>'form-horizontal','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
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
                            <textarea name="detail" class="form-control" id="" cols="60" rows="10" style="margin: 0px -295.672px 0px 0px; width: 466px; height: 211px;"></textarea>
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{--End Modal add profile--}}

    <!-- Modal edit product-->
    <div class="modal fade" id="edit-product" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #9BA2AB;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color: #bbbfc3;">Edit Product</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div id="lead-content" class="form">

                            </div>
                        </div>
                    </div>
                    <span class="v-loading">กำลังค้นหาข้อมูล...</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <!-- End Modal edit product-->

    <!-- Modal view product-->
    <div class="modal fade" id="view-product" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #9BA2AB;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color: #bbbfc3;">Edit Product</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div id="lead-content1" class="form">

                            </div>
                        </div>
                    </div>
                    <span class="v-loading1">กำลังค้นหาข้อมูล...</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <!-- End Modal view product-->
    @endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        $(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.add-product').on('click',function(){
                $('.add-product-modal').modal('show');
            });

            $('.edit-product').on('click',function(){
               var id = $(this).data('id');
                $('.v-loading').show();
                $('#lead-content').empty();
                $('#edit-product').modal('show');
                $.ajax({
                   url : '/product/edit_product',
                   method : 'post',
                   dataType : 'html',
                   data : ({'id':id}),
                   success : function(e){
                       $('.v-loading').hide();
                       $('#lead-content').html(e);
                   } ,error : function(){

                    }
                });
            });

            $('.view-product').on('click',function(){
               var id = $(this).data('id');
                $('.v-loading').show();
                $('#lead-content1').empty();
                $('#view-product').modal('show');
                $.ajax({
                    url : '/product/view_product',
                    method : 'post',
                    dataType : 'html',
                    data : ({'id':id}),
                    success : function(e){
                        $('.v-loading1').hide();
                        $('#lead-content1').html(e);
                    } ,error : function(){

                    }
                });
            });

            $('.delete-product').on('click',function(){
               var id = $(this).data('id');
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete)=> {
                    if (willDelete) {
                        setTimeout(function() {
                                     $.post("/product/delete_product", {
                                             id: id
                                         }, function(e) {
                                        swal("Poof! Your imaginary file has been deleted!", {
                                            icon: "success",
                                        }).then(function(){
                                            window.location.href ='/product/add_product'
                                        });
                                         });
                                     }, 50);
                    } else {
                        swal("Your imaginary file is safe!");
                        }
            });
            });
        });
    </script>
    @endsection