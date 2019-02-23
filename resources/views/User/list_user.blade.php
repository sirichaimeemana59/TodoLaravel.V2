@extends('Layout.Index')
@section('content')

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
    @endsection

@section('script')
    <script src="{!! url('https://code.jquery.com/jquery-3.3.1.min.js') !!}"></script>
    <script>
        $(function(){
//            $('.edit-profile').click(function () {
//                console.log('aa');
//            });
            $('.edit-profile').click(function () {
                var id = $(this).data('id');
                //alert(id);
                $('.v-loading').show();
                $('#lead-content').empty();
                //console.log();
                $.ajax({
                    url : "/update/user_profile",
                    method : 'post',
                    dataType: 'html',
                    data : ({'id':id}),
                    success: function (r) {
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
        })
    </script>

    @endsection