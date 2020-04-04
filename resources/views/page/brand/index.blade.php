@extends('layouts.app')
@section('title', 'Brand | ยี่ห้อรถ')
@section('content')
@include('template.header',['icon'=> 'icon-truck', 'name' => 'ยี่ห้อรถ'])
<div class="content">
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title font"> ข้อมูลยี่ห้อรถ </h5>
            <a href="{{ route('brand.create') }}" class="btn alpha-blue text-blue-800 border-blue-600 font" style="font-size:18px">
                <i class="icon-plus2 mr-2"></i> เพิ่มยี่ห้อรถ
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-striped datatable-brand">
                    <thead>
                        <tr class="bg-slate-600 text-center">
                            <th class="text-center">#</th>
                            <th>ลำดับ</th>
                            <th>ชื่อ</th>
                            <th>รูปภาพ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $k => $rs)
                        <tr>
                            <td class="text-center">{{ ++$k }}</td>
                            <td class="text-center" width="20%">
                                @if($min == $rs->sequence)
                                    <button
                                        class="btn btn-outline bg-success border-success text-success-800 btn-icon down"
                                        data-name="brand" data-no="{{ $rs->sequence }}"
                                        data-popup="tooltip"
                                        title="เลื่อนตำแหน่งลง"
                                        data-placement="top"
                                        id="top"
                                        data-original-title="top tooltip">
                                        <i class="icon-arrow-down12"></i>
                                    </button>
                                @elseif($min < $rs->sequence && $rs->sequence < $max)
                                    <button
                                        class="btn btn-outline bg-success border-success text-success-800 btn-icon up"
                                        data-name="brand" data-no="{{ $rs->sequence }}"
                                        data-popup="tooltip"
                                        title="เลื่อนตำแหน่งขึ้น"
                                        data-placement="bottom"
                                        id="bottom"
                                        data-original-title="bottom tooltip">
                                        <i class="icon-arrow-up12"></i>
                                    </button>
                                    <button
                                        class="btn btn-outline bg-success border-success text-success-800 btn-icon down"
                                        data-name="brand" data-no="{{ $rs->sequence }}"
                                        data-popup="tooltip"
                                        title="เลื่อนตำแหน่งลง"
                                        data-placement="top"
                                        id="top"
                                        data-original-title="top tooltip">
                                        <i class="icon-arrow-down12"></i>
                                    </button>
                                @else
                                    <button
                                        class="btn btn-outline bg-success border-success text-success-800 btn-icon up"
                                        data-name="brand" data-no="{{ $rs->sequence }}"
                                        data-popup="tooltip"
                                        title="เลื่อนตำแหน่งขึ้น"
                                        data-placement="bottom"
                                        id="bottom"
                                        data-original-title="bottom tooltip">
                                        <i class="icon-arrow-down12"></i>
                                    </button>
                                @endif
                            </td>
                            <td class="text-center">{{ $rs->name }}</td>
                            <td class="text-center">
                                <img src="{{ $rs->image }}" alt="" width="80" height="80" class="rounded img-responsive">
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$('.datatable-brand').DataTable({
    columnDefs: [{
        orderable: false,
        targets: [1,3]
    }],
    dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"p>',
    language: {
        search: '<span>ค้นหา : </span> _INPUT_',
        lengthMenu: '<span>แสดง : </span> _MENU_',
        paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
    }
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('.up').on('click',function(){
    var no   = $(this).data('no');
    var name = $(this).data('name');
    console.log(no)
    console.log(name)
    $.ajax({
        type: "PATCH",
        url: "/backend/sequence/up",
        data: {no : no, name : name},
        success: function(rs){
            swal("Success!", "ทำการเลื่อนตำแหน่งเรียบร้อยแล้ว", "success", {button:false});
            setTimeout(function() {
                location.reload();
            }, 1200);
		}
	});
});

$('.down').on('click',function(){
    var no   = $(this).data('no');
    var name = $(this).data('name');
    $.ajax({
        type: "PATCH",
        url: "/backend/sequence/down",
        data: {no : no, name : name},
        success: function(rs){
            console.log(rs)
            swal("Success!", "ทำการเลื่อนตำแหน่งเรียบร้อยแล้ว", "success",{button:false});
            setTimeout(function() {
                location.reload();
            }, 1200);
		}
	});
});
</script>
@endpush
