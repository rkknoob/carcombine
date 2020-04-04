@extends('layouts.app')
@section('title', 'Contact | รายการที่ติดต่อ')
@section('content')
@include('template.header',['icon'=> 'icon-list', 'name' => 'รายการที่ติดต่อ'])
<div class="content">
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title font"> รายการที่ติดต่อ </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-striped datatable-contact">
                    <thead>
                        <tr class="bg-slate-600 text-center">
                            <th class="text-center">#</th>
                            <th>ชื่อ</th>
                            <th>เบอร์โทร</th>
                            <th>อีเมล์</th>
                            <th>วันที่/เวลา</th>
                            <th>กระทำ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $k => $rs)
                        <tr>
                            <td class="text-center">{{ ++$k }}</td>
                            <td class="text-center">{{ $rs->first_name }} {{ $rs->last_name }}</td>
                            <td class="text-center">{{ $rs->tel }}</td>
                            <td class="text-center">{{ $rs->email }}</td>
                            <td class="text-center">{{ date_thai($rs->created_at, true) }}</td>
                            <td class="text-center">
                                @include('template.pattern.action', ['name'=> 'contact', 'id' => $rs->id])
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
$('.datatable-contact').DataTable({
    columnDefs: [{
        orderable: false,
        targets: [5]
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
