@if (session('success'))
    <script>
        swal({ title: 'Success!', text: 'บันทึกข้อมูลเรียบร้อยแล้ว', type: 'success'});
    </script>
@elseif (session('update'))
    <script>
        swal("Updated!", "แก้ไขข้อมูลเรียบร้อยแล้ว!", "success");
    </script>
@elseif (session('delete'))
    <script>
        swal({ title: 'Deleted!', text: 'ลบข้อมูลเรียบร้อยแล้ว', type: 'success'});
    </script>
@endif
