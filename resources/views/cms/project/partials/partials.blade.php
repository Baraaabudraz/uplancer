<div class="d-flex align-items-center">
    @if($row->images)
        <!--begin::Thumbnail-->
        <a href="#" class="symbol symbol-50px">
            <span class="symbol-label" style="background-image:url({{Storage::url($row->thumbnail)}});"></span>
        </a>
    @else
        <a href="#" class="symbol symbol-50px">
            <span class="symbol-label" style="background-image:url({{asset('assets/media/avatars/blank.png')}});"></span>
        </a>
    @endif

    <!--end::Thumbnail-->
    <div class="ms-5">
        <!--begin::Title-->
        <a href="{{ route('projects.edit',$row->id) }}" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-cms-project-filter="project_name">{{ $row->name }}</a>
        <!--end::Title-->
    </div>
    </div>

