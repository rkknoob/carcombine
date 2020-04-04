@extends('layouts.app')
@section('title', 'Interested | รายการที่สนใจ')
@section('content')
@include('template.header',['icon'=> 'icon-star-full2', 'name' => 'รายการที่สนใจ'])
<div class="content">
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title font"> ข้อมูลรายการที่สนใจ </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-striped datatable-Interested">
                    <thead>
                        <tr class="bg-slate-600 text-center">
                            <th class="text-center">#</th>
                            <th>ชื่อ</th>
                            <th>เบอร์โทร</th>
                            <th>อีเมล์</th>
                            <th>ข้อมูลรถ</th>
                            <th>สถานะ</th>
                            <th>วันที่/เวลา</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $k => $rs)
                        <tr>
                            <td class="text-center">{{ ++$k }}</td>
                            <td>{{ $rs->Name }}</td>
                            <td class="text-center">{{ $rs->Phone }}</td>
                            <td class="text-left">{{ $rs->Email }}</td>
                            <td class="text-left">
                                <a href="{{ route('car.show', $rs->CarEvaID) }}">
                                    {{ $rs->cars['CarBrandName'] }} {{ $rs->cars['CarBrandGenName'] }}
                                </a>
                            </td>
                            <td class="text-center font f-20">
                                @switch($rs->Status)
                                    @case("New")
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
$('.datatable-Interested').DataTable({
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
</script>
@endpush
