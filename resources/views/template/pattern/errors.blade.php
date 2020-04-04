@if($errors->any())
<div class="alert alert-danger">
    @foreach ($errors->all() as $error)
    <p class="font fs-20">{!! $error !!}</p>
    @endforeach
</div>
@endif
