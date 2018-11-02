<div class="col-md-2 float-{{ trans('generic.float') }} col-1 pl-0 pr-0 collapse width show" id="sidebar">
    <div class="list-group border-0 card text-center text-md-left">
        <h3 class="list-group-item d-inline-block collapsed">{{ trans('sidebar.lookups') }}</h3>
        
        <a href="#academic" class="list-group-item d-inline-block collapsed" data-toggle="collapse" aria-expanded="false"><i class="fa fa-book"></i> <span class="d-none d-md-inline">{{ trans('sidebar.academics') }}</span></a>
        <div class="collapse" id="academic" data-parent="#sidebar">
            <a href="/AcademicYear" class="list-group-item" data-parent="#academic">{{ trans('sidebar.academic_year') }}</a>
            <a href="/Semester" class="list-group-item" data-parent="#academic">{{ trans('sidebar.semester') }}</a>
            <a href="/StudyLevel" class="list-group-item" data-parent="#academic">{{ trans('sidebar.level') }}</a>
            <a href="/StudyProgram" class="list-group-item" data-parent="#academic">{{ trans('sidebar.program') }}</a>
        </div>
        
        <a href="#facilities" class="list-group-item d-inline-block collapsed" data-toggle="collapse" aria-expanded="false"><i class="fa fa-book"></i> <span class="d-none d-md-inline">{{ trans('sidebar.facilities') }}</span></a>
        <div class="collapse" id="facilities" data-parent="#sidebar">
            <a href="/University" class="list-group-item" data-parent="#facilities">{{ trans('sidebar.university') }}</a>
            <a href="/Faculty" class="list-group-item" data-parent="#facilities">{{ trans('sidebar.faculty') }}</a>
            <a href="/Department" class="list-group-item" data-parent="#facilities">{{ trans('sidebar.department') }}</a>
            <a href="/Major" class="list-group-item" data-parent="#facilities">{{ trans('sidebar.major') }}</a>
            <a href="/Specialization" class="list-group-item" data-parent="#facilities">{{ trans('sidebar.specialization') }}</a>
        </div>
        
        <a href="#admission" class="list-group-item d-inline-block collapsed" data-toggle="collapse" aria-expanded="false"><i class="fa fa-book"></i> <span class="d-none d-md-inline">{{ trans('sidebar.admissions') }}</span></a>
        <div class="collapse" id="admission" data-parent="#sidebar">
            <a href="/AdmissionStatus" class="list-group-item" data-parent="#admission">{{ trans('sidebar.admission_status') }}</a>
            <a href="/AdmissionStudyStatus" class="list-group-item" data-parent="#admission">{{ trans('sidebar.admissions_study_status') }}</a>
            <a href="/Document" class="list-group-item" data-parent="#admission">{{ trans('sidebar.admission_documents') }}</a>
            <a href="/AdditionalCourse" class="list-group-item" data-parent="#admission">{{ trans('sidebar.additional_course') }}</a>
            <a href="/PaymentType" class="list-group-item" data-parent="#admission">{{ trans('sidebar.payment_type') }}</a>
        </div>

        <a href="#military" class="list-group-item d-inline-block collapsed" data-toggle="collapse" aria-expanded="false"><i class="fa fa-book"></i> <span class="d-none d-md-inline">{{ trans('sidebar.militaries') }}</span></a>
        <div class="collapse" id="military" data-parent="#sidebar">
            <a href="/MilitaryStatus" class="list-group-item" data-parent="#military">{{ trans('sidebar.military_status') }}</a>
            <a href="/MilitaryArea" class="list-group-item" data-parent="#military">{{ trans('sidebar.military_area') }}</a>
        </div>

        <a href="#generic" class="list-group-item d-inline-block collapsed" data-toggle="collapse" aria-expanded="false"><i class="fa fa-book"></i> <span class="d-none d-md-inline">{{ trans('sidebar.generics') }}</span></a>
        <div class="collapse" id="generic" data-parent="#sidebar">
            <a href="/Currency" class="list-group-item" data-parent="#generic">{{ trans('sidebar.currency') }}</a>
            <a href="/Gender" class="list-group-item" data-parent="#generic">{{ trans('sidebar.gender') }}</a>
            <a href="/Governorate" class="list-group-item" data-parent="#generic">{{ trans('sidebar.governorate') }}</a>
            <a href="/Nationality" class="list-group-item" data-parent="#generic">{{ trans('sidebar.ntionality') }}</a>
            <a href="/Religion" class="list-group-item" data-parent="#generic">{{ trans('sidebar.religion') }}</a>
        </div>


    </div>
</div>