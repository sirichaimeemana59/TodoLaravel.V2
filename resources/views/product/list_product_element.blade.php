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
                    <button class="btn-info btn-primary view-product" data-id="{!! $row->id_product !!}"><li class="fa fa-eye"></li></button>
                    <button class="btn-info btn-warning edit-product" data-id="{!! $row->id_product !!}"><li class="fa fa-edit"></li></button>
                    <button class="btn-info btn-danger delete-product" data-toggle="modal" data-target="#delete-profile" data-id="{!!$row->id_product!!}"><li class="fa fa-trash"></li></button>
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