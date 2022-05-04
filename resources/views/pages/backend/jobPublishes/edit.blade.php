@extends('layouts.admin')

@section('title')

    {{trans('dashboard.HFMEC')}} - {{trans('dashboard.EditJobs')}}

@endsection

@section('content')

    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{trans('dashboard.EditJobs')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}"
                                                   class="default-color">{{trans('dashboard.Main')}}</a></li>
                    <li class="breadcrumb-item active">{{trans('dashboard.EditJobs')}}</li>
                </ol>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">

                <div class="card-body">


                    <form method="post" action="{{route('admin.jobs.update')}}" autocomplete="off" >
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="id" value="{{$job->id}}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> {{trans('dashboard.TitleJobInArabic')}} :</label>

                                    <input type="text" required name="title_ar" class="form-control" value="{{old('title_ar',$job->getTranslation('title','ar'))}}">

                                    @error('title_ar')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> {{trans('dashboard.TitleJobInEnglish')}} :</label>

                                    <input type="text" required name="title_en" class="form-control" value="{{old('title_en',$job->getTranslation('title','en'))}}">

                                    @error('title_en')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>




                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> {{trans('dashboard.ContentJobInArabic')}} :</label>

                                    <textarea name="content_ar" required rows="3" class="form-control summernote">
                            {!! old('content_ar',$job->getTranslation('content','ar')) !!}
                              </textarea>
                                    @error('content_ar')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> {{trans('dashboard.ContentJobInEnglish')}} :</label>

                                    <textarea name="content_en" required rows="3" class="form-control summernote">
                            {!! old('content_en',$job->getTranslation('content','en')) !!}
                              </textarea>

                                    @error('content_en')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>


                        </div>




                        <br>
                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('dashboard.Save')}}
                        </button>


                    </form>


                </div>
            </div>
        </div>
    </div>


@endsection


@section('script')

    <script>
        $(function (){


            $('.summernote').summernote({

                tabsize: 2,
                height: 200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        })

    </script>
@endsection
