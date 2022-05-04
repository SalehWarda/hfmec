@extends('layouts.admin')

@section('title')

    {{trans('dashboard.HFMEC')}} - {{trans('dashboard.EditMember')}}

@endsection

@section('content')

    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{trans('dashboard.EditMember')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}"
                                                   class="default-color">{{trans('dashboard.Main')}}</a></li>
                    <li class="breadcrumb-item active">{{trans('dashboard.EditMember')}}</li>
                </ol>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">

                <div class="card-body">


                    <form method="post" action="{{route('admin.teams.update')}}" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <input type="hidden" name="id" value="{{$team->id}}">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label> {{trans('dashboard.MemberNameInArabic')}} :</label>

                                    <input type="text" name="name_ar" class="form-control" value="{{old('name_ar',$team->getTranslation('name','ar'))}}">

                                    @error('name_ar')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label> {{trans('dashboard.MemberNameInEnglish')}} :</label>

                                    <input type="text" name="name_en" class="form-control" value="{{old('name_en',$team->getTranslation('name','en'))}}">

                                    @error('name_en')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label> {{trans('dashboard.JobInArabic')}} :</label>

                                    <input type="text" name="job_ar" class="form-control" value="{{old('job_ar',$team->getTranslation('job','ar'))}}">

                                    @error('job_ar')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label> {{trans('dashboard.JobInEnglish')}} :</label>

                                    <input type="text" name="job_en" class="form-control" value="{{old('job_en',$team->getTranslation('job','en'))}}">

                                    @error('job_en')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>



                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> {{trans('dashboard.MemberDescriptionInArabic')}} :</label>

                                    <textarea name="description_ar" rows="3" class="form-control summernote">
                            {!! old('description_ar',$team->getTranslation('description','ar')) !!}
                              </textarea>
                                    @error('description_ar')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> {{trans('dashboard.MemberDescriptionInEnglish')}} :</label>

                                    <textarea name="description_en" rows="3" class="form-control summernote">
                            {!! old('description_en',$team->getTranslation('description','en')) !!}
                              </textarea>

                                    @error('description_en')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>


                        </div>



                        <div class="row pt-4">

                            <div class="col-12">

                                <label for="cover">{{trans('dashboard.MemberImage')}} :</label>
                                <br>
                                <div class="file-loading">
                                    <input type="file"  name="image" id="team-image" class="file-input-overview ">
                                    <span class="form-text text-muted">Image width should be 500px x 500px</span>


                                </div>
                                @error('image')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <br>
                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('dashboard.SaveChanges')}}
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

            $("#team-image").fileinput({

                theme: "fa",
                maxFileCount: 1,
                allowedFileTypes: ['image'],
                showCancel: true,
                showRemove: false,
                showUpload: false,
                overwriteInitial: false,
                initialPreview:[

                    "{{asset('assets/images/team/'.$team->image)}}",

                ],
                initialPreviewAsData:true,
                initialPreviewFileType: 'image',
                initialPreviewConfig:[

                    {
                        caption: "{{$team->image}}",
                        size:'1111',
                        width:"120px",
                        url:"{{route('admin.teams.removeImage',['team_id'=>$team->id, '_token'=>csrf_token()])}}",
                        key:{{$team->id}}
                    }
                ]



            });

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
