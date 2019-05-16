@extends('Layout.Index')
@section('content')
    <div class="row">
        <div class="col-sm-12">

            @if($product)
                <table class="table table-responsive w3-table" style="width: 100%">
                    <tr>
                        <th width="8%">ลำดับ</th>
                        <th width="25%">รูป</th>
                        <th width="35%">ชื่อ</th>
                        <th width="10%">จำนวน</th>
                        <th width="10%">ราคา</th>
                        <th width="*">Add To Cart</th>
                    </tr>
                    @foreach($product as $key => $row)
                        <tr>
                            <td>{!! $key + 1!!}</td>
                            <td><img src="{!! asset($row->photo) !!}" alt="" width="15%"></td>
                            <td>{!! $row->name_product !!}</td>
                            <td>{!! $row->amount !!}</td>
                            <td>{!! $row->price !!}</td>
                            <td>
                                <button class="btn-info btn-primary order-product" data-id="{!! $row->id_product !!}" data-name="{!! $row->name_product !!}" data-price="{!! $row->price !!}" data-photo="{!! $row->photo !!}"><li class="fa fa-shopping-cart"></li></button>
                            </td>
                        </tr>
                    @endforeach
                </table>
            @else
                <div class="row">
                    <div class="col-sm-12">
                        ไม่พบข้อมูล
                    </div>
                </div>
            @endif
            {!! Form::model(null,array('url' => array('product/order_product/insert'),'class'=>'form-horizontal','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
            <table class="table table-responsive itemTables">
                <tr>
                    <th width="15%">รูป</th>
                    <th>ชื่อ</th>
                    <th>จำนวน</th>
                    <th>ราคา/หน่วย</th>
                    <th>ราคาสุทธิ</th>
                    <th>Action</th>
                </tr>
                <?php $total_all=0; ?>
                @foreach($order as $key => $row)
                    <tr>
                        <td><img src="{!! asset($row->join_product->photo) !!}" alt="" width="15%"></td>
                        <td>{!! $row->join_product->name_product !!}</td>
                        <td><input type="number" class="price_total" name="amount" min="1" max="10" value="{!! $row->amount !!}"></td>
                        <td>{!! $row->join_product->price !!} <input type="hidden" class="price_product" value="{!! $row->join_product->price !!}"></td>
                        <td><input type="text" name="result" class="result" readonly value="{!! $row->total_price !!}"></td>
                        <td><a class="btn btn-danger delete-order"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    <?php
                    $total_all += $row->total_price;
                    ?>
                    <input class="tLineTotal" name="" type="hidden" value="{!! $row->total_price  !!}">
                @endforeach

            </table>
            <table class="table table-responsive">
                <tr>
                    <th width="15%"></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <tr class="total">
                    <td colspan="3">รวม</td>
                    <td style="text-align: right;"><input type="text" class="total"  readonly  value="{!! $total_all  !!}"> <input type="hidden" class="_total"></td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td style="text-align: right;"><button class="btn-info btn-primary btn-lg" type="submit"><li class="fa fa-shopping-cart"></li> Add To Cart</button></td>
                </tr>
            </table>
            {!! Form::close() !!}
        </div>
    </div>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

            $('.order-product').on('click',function(){
                var id = $(this).data('id');
                var name = $(this).data('name');
                var photo = $(this).data('photo');
                var price = $(this).data('price');



                var data = ['<tr class="itemRow">',
                    '<td><img src="'+photo+'" alt="" width="25%"></td>',
                    '<td><span>'+name+'</span><input type="hidden" name="id_product[]" value="'+id+'"><input type="hidden" name="name_product[]" value="'+name+'"></td>',
                    '<td><input type="number" class="price_total" name="amount[]" min="1" max="10"></td>',
                    '<td><span>'+price+'</span><input type="hidden" name="price[]" class="price_product" value="'+price+'"></td>',
                    '<td><input type="text" name="result[]" class="result" readonly></td>',
                    '<td><a class="btn btn-danger delete-order"><i class="fa fa-trash"></i></a></td>',
                ];

                data.push(
                    '<td><div class="text-right">' +
                    '<span class="colTotal"></span> </div><input class="tLineTotal" name="" type="hidden"></td>','</tr>');
                data = data.join('');

                $('.itemTables').append(data);

            });

            $('.itemTables').on("click", '.delete-order', function() {
                //alert('aaa');
                $(this).closest('tr.itemRow').remove();
                //return false;
                calTotal();

            });

            $('.itemTables').on("change", '.price_total', function() {
                var price = $(this).val();
                var price_product = $('.price_product').val();
                //console.log(price_product);
                var total = price*price_product;
                //$('body').parents('tr').find('.result').val(total);
                $(this).parents('tr').find('.result').val(total.toFixed(2));
                $('.total').val('0.00');
                $(this).parents('tr').find('.tLineTotal').val(total);
                calTotal();
                //console.log(total);
            });

            function calTotal(){
                var Total = 0;
                $('.tLineTotal').each(function () {
                    if ( $(this).val() !== "" ) {
                        t = Number($(this).val());
                        Total += t;

                        //var _Total = $.number(Total,2);
                        $('.total').val(Total.toFixed(2));
                    }
                });
            }

        });
    </script>

@endsection