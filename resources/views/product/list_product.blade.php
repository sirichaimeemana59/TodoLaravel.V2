@extends('Layout.Index')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <p style="text-align:right"><button class="btn btn-primary add-product"><li class="fa fa-product-hunt"></li> เพิ่มสินค้า</button></p>
        </div>
    </div>

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
                        <th width="*">Action</th>
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
        </div>
    </div>
    @endsection
@section('script')
    @endsection