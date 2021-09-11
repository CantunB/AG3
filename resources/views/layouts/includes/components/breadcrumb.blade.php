 <!-- start page title -->
 <div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    @if(isset($title))
                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{ $title }}</a></li>
                    @endif
                    @if(isset($subtitle))
                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{ $subtitle }}</a></li>
                    @endif
                    @if (isset($teme))
                    <li class="breadcrumb-item active">{{ $teme }}</li>
                    @endif
                </ol>
            </div>
            @if (isset($teme))
                <h4 class="page-title">{{ $teme }}</h4>
            @endif
        </div>
    </div>
</div>
<!-- end page title -->
