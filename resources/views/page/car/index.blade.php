@extends('layouts.app')
@section('title', 'Car | ข้อมูลรถ')
@section('content')
@include('template.header',['icon'=> 'icon-car2', 'name' => 'ข้อมูลรถ'])
<div class="content">
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title font"> ข้อมูลรถ </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-striped datatable-car">
                    <thead>
                        <tr class="bg-slate-600 text-center">
                            <th class="text-center">#</th>
                            <th> ID </th>
                            <th width="30%"> ยี่ห้อรถ </th>
                            <th> รุ่น </th>
                            <th width="20%">กระทำ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $k => $rs)
                        <tr>
                            <td class="text-center">{{ ++$k }}</td>
                            <td class="text-center">{{ $rs->CarEvaID        }}</td>
                            <td class="text-center">{{ $rs->CarBrandName    }}</td>
                            <td class="text-center">{{ $rs->CarBrandGenName }}</td>
                            <td class="text-center">
                                @include('template.pattern.action', ['name'=> 'car', 'id' => $rs->CarEvaID])
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
$('.datatable-car').DataTable({
    columnDefs: [{
        orderable: false,
        targets: [4]
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
