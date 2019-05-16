<table class="table table-responsive w3-table" style="width: 100%">
    <tr>
        <th width="8%">ลำดับ</th>
        <th width="25%">รูป</th>
        <th width="35%">ชื่อ</th>
        <th width="10%">จำนวน</th>
        <th width="10%">ราคา/หน่วย</th>
        <th width="10%">ราคารวม</th>
    </tr>
    <?php $total_all=0; ?>
    @foreach($order as $key => $row)
        <tr>
            <td>{!! $key + 1!!}</td>
            <td><img src="{!! asset($row->join_product->photo) !!}" alt="" width="15%"></td>
            <td>{!! $row->join_product->name_product !!}</td>
            <td>{!! $row->amount !!}</td>
            <td>{!! number_format($row->join_product->price,2) !!}</td>
            <td>{!! number_format($row->total_price,2) !!}</td>
        </tr>
        <?php
        $total_all += $row->total_price;
        ?>
    @endforeach
    <tr>
        <td colspan="5" style="text-align: right;">รวม</td>
        <td>{!! number_format($total_all,2) !!}</td>
    </tr>
</table>