@extends('layouts.admin')

@section('title')

    المشاريع

@endsection
@section('content')

    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">المشاريع </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">الرئيسية</a></li>
                    <li class="breadcrumb-item active">المشاريع</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- main body -->
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">


                    <div class="d-block d-md-flex justify-content-between">
                        <div class="d-block">
                            <h5 class="card-title pb-0 border-0">المشاريع</h5>
                        </div>

                        <div class="d-block d-md-flex justify-content-between">
                            <div class="d-block">
                                <a class="btn btn-success icon left"

                                   href="{{route('admin.projects.create')}}">إضافة مشروع جديدة <i class="fa fa-plus"></i></a>
                            </div>

                        </div>

                    </div>

                    @include('pages.backend.projects.filter.filter')
                    <div class="table-responsive mt-15">
                        <table class="table center-aligned-table mb-0">
                            <thead>
                            <tr class="text-dark">
                                <th>الصورة</th>
                                <th>الإسم</th>
                                <th>العميل</th>
                                <th>الخدمة</th>
                                <th>تاريخ البداية</th>
                                <th>الحالة</th>
                                <th>العمليات</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                @forelse($projects as $project)

                                    <td>
                                        @if($project->firstMedia)
                                            <img src="{{asset('assets/images/projects/'.$project->firstMedia->file_name)}}" width="60" height="60" alt="{{$project->name}}">
                                        @else
                                            <img src="{{asset('assets/images/projects/noImage.jpg')}}" width="60" height="60" alt="{{$project->name}}">
                                        @endif

                                    </td>
                                    <td>{{$project->name}}</td>
                                    <td>{{$project->client}}</td>
                                    <td>{{$project->service->name}}</td>
                                    <td>{{$project->commencement_date}}</td>
                                    <td>{{$project->status() }}</td>

                                    <td>
                                        <a href="{{route('admin.projects.edit',$project->id)}}"
                                           class="btn btn-info btn-sm" role="button" title="Edit" aria-pressed="true"><i
                                                class="fa fa-edit"></i></a>
                                        <a href="{{route('admin.projects.show',$project->id)}}"
                                           class="btn btn-warning btn-sm" role="button" title="Show" aria-pressed="true"><i
                                                class="fa fa-eye"></i></a>
                                        <button type="button" class="btn btn-danger btn-sm"
                                                data-toggle="modal"
                                                data-target="#delete_project{{ $project->id }}" title="Delete"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                            </tr>

{{--                            delete Modal Category--}}
                            <div class="modal fade" id="delete_project{{ $project->id }}" tabindex="-1" role="dialog"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <div class="modal-title">
                                                <div class="mb-30">

                                                    <h6> حذف  {{$project->name}}</h6>

                                                </div>
                                            </div>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <form class="form" action="{{ route('admin.projects.delete') }}"
                                                  method="post">
                                                @csrf
                                                @method('DELETE')

                                                <input type="hidden" name="delete_project_id" value="{{$project->id}}" id="id">

                                                <h6>هل أنت متأكد من عملية الحذف: <span class="text-danger">{{$project->name}}</span></h6>


                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">إغلاق
                                                    </button>
                                                    <button type="submit"
                                                            class="btn btn-danger">حذف</button>

                                                </div>
                                            </form>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">No Projects found</td>
                                </tr>




                            @endforelse





                            </tbody>

                            <tfoot>
                            <tr>
                                <td colspan="9">
                                    <div class="float-right">

                                        {!! $projects->links() !!}

                                    </div>

                                </td>
                            </tr>

                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            </div>
            </div>



@endsection
