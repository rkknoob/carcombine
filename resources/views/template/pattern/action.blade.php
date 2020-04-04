<div class="list-icons">
    <a href="{{ route($name.'.show', $id) }}" data-popup="tooltip" title="รายละเอียด" data-placement="bottom" class="btn btn-primary" title="ดูข้อมูล">
        <i class="icon-eye"></i>
    </a>
    {{-- <a class="btn btn-warning btn-edit" href="{{ route($name.'.edit',$id) }}" data-popup="tooltip" title="แก้ไข" data-placement="bottom">
        <i class="icon-pencil7"></i>
    </a>
    <button class="btn btn-danger  btn-del" data-id="{{ $id }}" data-popup="tooltip" title="ลบ" data-placement="bottom">
        <i class="icon-trash"></i>
    </button> --}}
    {{-- {{ Form::open(['method' => 'DELETE', 'route' => [$name.'.destroy', $id], 'id'=>'delete-'.$id])}} {{ Form::close() }} --}}
</div>
