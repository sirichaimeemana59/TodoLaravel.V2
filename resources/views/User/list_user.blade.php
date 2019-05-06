@extends('Layout.Index')
@section('content')

    <p style="text-align: right;"><button class="btn-info btn-summary add-profile"><li class="fa fa-plus-square"></li>  เพิ่มผู้ใช้งาน</button></p>
    @include('User.list_user_element')

        <!-- Modal -->
        <div class="modal fade" id="edit-profile" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #9BA2AB;">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" style="color: #bbbfc3;">Edit Profile</h4>
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

    {{--Modal Delete--}}
    <div class="modal fade" id="delete-profile" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="background-color: #9BA2AB;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color: #bbbfc3;">Delete Profile</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row" style="text-align: center;">
                                <img width="50%" height="50%" src="{!! asset('https://article.images.consumerreports.org/prod/content/dam/CRO%20Images%202018/Electronics/November/CR-Electronics-InlineHero-How-to-Quit-Everything-and-Delete-Your-Data-11-18') !!}" alt="">
                            </div>
                            {!! Form::model(null,array('url' => array('/delete/profile'),'method'=>'post')) !!}
                            {{--<from action="{!! url('/delete/profile') !!}" method="post">--}}
                                <input type="hidden" id="id_hidden" name="id_hidden">
                                <br>
                                <div class="row" style="text-align: center;">
                                    <input type="submit" class="btn-info btn-primary" value="ยืนยัน">
                                    {{--<button class="btn-info btn-primary" type="submit">ยืนยัน</button>--}}
                                    <button class="btn-info btn-warning" type="reset">ยกเลิก</button>
                                </div>
                            {!! Form::close() !!}
                            {{--</from>--}}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--Modal add profile--}}
    <div class="modal fade add-profile" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #9BA2AB;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color: #bbbfc3;">Add Profile</h4>
                </div>
                <div class="modal-body">
                    {!! Form::model(null,array('url' => array('insert_profile/form'),'class'=>'form-horizontal','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.edit-profile').click(function () {
                var id = $(this).data('id');
                $('.v-loading').show();
                $('#lead-content').empty();
                $('#edit-profile').modal('show');
                $.ajax({
                    url : "update/user_profile",
                    method : 'post',
                    dataType: 'html',
                    data : ({'id':id}),
                    success: function (r) {
                        //console.log(r);
                        $('.v-loading').hide();
                        $('#lead-content').html(r);
                    },
                    error : function () {
                        console.log('aa');
                    }
                })
            });

            $('.delete-profile').click(function () {
                var id = $(this).data('id');
                //alert(id);
                $('#id_hidden').val(id);
            });
        });

        $('.add-profile').on('click',function(){
            $('.add-profile').modal('show');
        })
    </script>

    @endsection