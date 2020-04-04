@extends('layouts.app')
@section('title', 'Wishlist | ข้อมูลรถที่สนใจ')
@section('content')
@include('template.header',['icon'=> 'icon-bookmark', 'name' => 'ข้อมูลรถที่สนใจ'])
<div class="content">
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title font"> ข้อมูลรายการที่สนใจ </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-striped datatable-wishlist">
                    <thead>
                        <tr class="bg-slate-600 text-center">
                            <th class="text-center">#</th>
                            <th>ชื่อ</th>
                            <th>เบอร์โทร</th>
                            <th>อีเมล์</th>
                            <th>ยี่ห้อและรุ่น</th>
                            <th>ปี</th>
                            <th>เกียร์</th>
                            <th>สถานะ</th>
                            <th>วันที่/เวลา</th>
                            <th>ค้นหารถที่ตรงกัน</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $k => $rs)
                        <tr>
                            <td class="text-center">{{ ++$k }}</td>
                            <td>{{ $rs->name }}</td>
                            <td class="text-center">{{ $rs->tel }}</td>
                            <td class="text-left">{{ $rs->email }}</td>
                            <td class="text-left">{{ $rs->brand }} {{ $rs->model }}</td>
                            <td class="text-center">{{ $rs->year  }}</td>
                            <td class="text-center">{{ $rs->gear  }}</td>
                            <td class="text-center font f-20">
                                @switch($rs->status)
                                @case("new")
                                <span class="badge bg-primary">New</span>
                                @break
                                @case("Wait")
                                <span class="badge bg-warning">Busy</span>
                                @break
                                @case("Busy")
                                <span class="badge bg-danger">Busy</span>
                                @break
                                @case("Booking")
                                <span class="badge bg-success">Booking</span>
                                @break
                                @endswitch
                            </td>
                            <td class="text-center">{{ date_thai($rs->created_at, TRUE) }}</td>
                            <td class="text-center">
                                <button
                                    data-toggle="modal"
                                    data-target="#modal_default"
                                    data-popup="tooltip"
                                    title="ค้นหา"
                                    data-placement="bottom"
                                    class="btn btn-primary"
                                    title="ดูข้อมูล"
                                    data-brand = "{{ $rs->brand }}"
                                    data-model = "{{ $rs->model }}"
                                    data-year  = "{{ $rs->year }}"
                                    data-gear  = "{{ $rs->gear }}"
                                >
                                <i class="icon-search4"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                <div id="modal_default" class="modal fade" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content" style="width: 850px;left: -15%;">
                            <div class="modal-header">
                                <h5 class="modal-title"> ข้อมูลรถที่ตรงกัน </h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <table id="tableSearch" class="table table-hover table-bordered table-striped">
                                     <thead>
                                        <tr class="bg-slate-800 text-center">
                                            <th class="text-center">#</th>
                                            <th> No. </th></th>
                                            <th> ยี่ห้อ </th>
                                            <th> รุ่น </th>
                                            <th> ปี </th>
                                            <th> เกียร์ </th>
                                            <th> สี </th>
                                            <th> ตัวเครื่อง </th>
                                            <th> ไมล์ </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-link font-thai" data-dismiss="modal"> ปิดหน้าต่าง </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.datatable-wishlist').DataTable({
        columnDefs: [{
            orderable: false,
            targets: []
        }],
        dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"p>',
        language: {
            search: '<span>ค้นหา : </span> _INPUT_',
            lengthMenu: '<span>แสดง : </span> _MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
        }
    });

    $('#modal_default').on('show.bs.modal', function (event) {
        var button    = $(event.relatedTarget)
        var brand     = button.data('brand')
        var model     = button.data('model')
        var year      = button.data('year')
        var gear      = button.data('gear')
        var text  = "";
        $.ajax({
            type: "PATCH",
            url: "/backend/wishlist/search",
            data: {brand : brand, model : model, year : year, gear : gear},
            success: function(rs){
                $.each(rs, function( index, value ) {
                    text += "<tr class='text-center'>";
                    text += "<td>"+ (++index) +"</td>"
                    text += "<td>"+ value.CarEvaID +"</td>"
                    text += "<td>"+ value.CarBrandName +"</td>"
                    text += "<td>"+ value.CarBrandGenName +"</td>"
                    text += "<td>"+ value.CarYear +"</td>"
                    text += "<td>"+ value.CarGearID +"</td>"
                    text += "<td>"+ value.CarColorName +"</td>"
                    text += "<td>"+ value.CarEngine +"</td>"
                    text += "<td>"+ numberWithCommas(value.CarMile) +"</td>"
                    text += "</tr>";
                });
                $('#tableSearch tbody').append(text);
            }
        });
    })

    $('#modal_default').on('hide.bs.modal', function (event) {
        $("#tableSearch tbody").html("");
    })

    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
</script>
@endpush
