<!-- Page header -->
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4>
                <i class="fa {{ $icon }} mr-2"></i>
                <span class="font-weight-semibold font f-24"> {!! $name !!} </span>
            </h4>
        </div>
    </div>
    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            {{ Breadcrumbs::render() }}
        </div>
    </div>
</div>
<!-- /page header -->
