@extends('Layout.Index')
@section('content')
    <div class="row">
        <div class="col-sm-12">

            @if($order)
                @foreach($order as $key => $row)
                    <div class="col-sm-3" style="background-color: grey; width: 150px;height: 150px; margin: 15px;padding: 10px; text-align: center;">
                        <p> {!! $row->order_tax !!}</p>
                        <br><br><br><br>
                        <button class="btn-success view-order-product" data-id="{!! $row->order_tax !!}"><li class="fa fa-eye"></li></button>
                        <a href="{!! url('/product/edit_order_product/'.$row->order_tax) !!}"><button class="btn-warning"><li class="fa fa-edit"></li></button></a>
                        {{--<button class="btn-primary order-product" data-id="{!! $row->order_tax !!}"><li class="fa fa-shopping-cart"></li></button>--}}
                    </div>
                @endforeach
            @else
                <div class="row">
                    <div class="col-sm-12">
                        ไม่พบข้อมูล
                    </div>
                </div>
            @endif
        </div>
    </div>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Modal view order product-->
    <div class="modal fade" id="order-view-product" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #9BA2AB;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color: #bbbfc3;">View Order Product</h4>
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
    <!-- End Modal view order product-->

    <!-- Modal view order product-->
    <div class="modal fade" id="edit-view-product" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #9BA2AB;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color: #bbbfc3;">View Order Product</h4>
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
    <!-- End Modal view order product-->
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
        $(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.view-order-product').on('click',function(){
               var id = $(this).data('id');
               $('#order-view-product').modal('show');
               $('.v-loading').show();
               $('#lead-content').empty();
               $.ajax({
                   url : '/product/view_order_product',
                   method : 'post',
                   dataType : 'html',
                   data : ({'id':id}),
                   success : function(e){
                       $('.v-loading').hide();
                       $('#lead-content').html(e);
                   },error : function(){
                       console.log('Error View Order Product');
                   }
               })
            });

            $('.edit-order-product').on('click',function(){
               var id = $(this).data('id');
                $('#edit-view-product').modal('show');
                $('.v-loading1').show();
                $('#lead-content1').empty();
                $.ajax({
                    url : '/product/edit_order_product',
                    method : 'post',
                    dataType : 'html',
                    data : ({'id':id}),
                    success : function(e){
                        $('.v-loading1').hide();
                        $('#lead-content1').html(e);
                    },error : function(){
                        console.log('Error Edit Order Product');
                    }
                })
            });


        });
    </script>

@endsection