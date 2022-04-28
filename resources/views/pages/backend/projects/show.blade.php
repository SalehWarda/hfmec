@extends('layouts.admin')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">تفاصيل أكثر</h6>

        </div>




        <div class="d-flex">

            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>إسم المشروع</th>
                            <td>{{$project->name}}</td>
                        </tr>
                        <tr>
                            <th>نوع الخدمة </th>
                            <td>{{ $project->service->name }}</td>
                        </tr>
                        <tr>
                            <th>العميل</th>
                            <td>{{$project->client}}</td>
                        </tr>

                        <tr>
                            <th>الموقع الجغرافي</th>
                            <td>{{$project->client}}</td>

                        </tr>

                        <tr>
                            <th>تاريخ البداية</th>
                            <td>{{$project->commencement_date}}</td>
                        </tr>

                        <tr>

                            <th>حالة المشروع</th>
                            <td>{!! $project->statusWithLabel() !!}</td>
                        </tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">وصف المشروع</h6>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <td>{!! $project->description !!}</td>

                </tr>
                </thead>

            </table>
        </div>
    </div>



    <div class="row">



        @foreach($project->media as $media)

        <div class="col-lg-4 mb-4 mb-lg-0 d-flex">


                <img
                    src="{{asset('assets/images/projects/'.$media->file_name)}}"
                    width="200" height="200"  class="w-100 shadow-1-strong rounded mb-4 ml-4" alt="{{$project->name}}"
                />



        </div>

        @endforeach
    </div>



@endsection
