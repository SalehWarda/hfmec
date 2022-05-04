@extends('layouts.admin')

@section('title')

    {{trans('dashboard.HFMEC')}} - {{trans('dashboard.ExpertiseSummary')}}

@endsection


@section('content')




        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="mb-0">{{trans('dashboard.ExpertiseSummary')}}</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}"
                                                       class="default-color">{{trans('dashboard.Main')}}</a></li>
                        <li class="breadcrumb-item active">{{trans('dashboard.ExpertiseSummary')}}</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- main body -->
        <div class="row">
            <div class="col-xl-12 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">


                        <div class="row">
                            <div class="col-xl-12 mb-30">
                                <div class="card card-statistics h-100">

                                    <div class="card-body">


                                        <form method="post" action="{{route('admin.expertise.summary.update')}}" autocomplete="off" enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')

                                            <input type="hidden" name="id" value="{{$es->id}}">

                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="es_ar">{{trans('dashboard.ExpertiseSummaryInArabic')}} :</label>

                                                        <textarea name="es_ar" rows="3" class="form-control summernote">{!! old('es_ar',$es->getTranslation('es','ar'))  !!}</textarea>

                                                        @error('es_ar')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="es_en"> {{trans('dashboard.ExpertiseSummaryInEnglish')}} :</label>

                                                        <textarea name="es_en" rows="3" class="form-control summernote">{!! old('es_en',$es->getTranslation('es','en')) !!}</textarea>

                                                        @error('es_en')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row pt-4">

                                                <div class="col-12">

                                                    <label for="image">{{trans('dashboard.ExpertiseSummaryImage')}} :</label>
                                                    <br>
                                                    <div class="file-loading">
                                                        <input type="file"  name="image" id="es-image" class="file-input-overview ">
                                                        <span class="form-text text-muted">Image width should be 500px x 500px</span>


                                                    </div>
                                                    @error('image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                            </div>
                                            <br>
                                            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('dashboard.ExpertiseSummaryImage')}}</button>


                                        </form>


                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>



        </div>






        @endsection

        @section('script')

            <script>
                $(function (){
                    $("#es-image").fileinput({
                        theme: "fa",
                        maxFileCount: 1,
                        allowedFileTypes: ['image'],
                        showCancel: true,
                        showRemove: false,
                        showUpload: false,
                        overwriteInitial: false,
                        initialPreview:[
                            "{{asset('assets/images/about/'.$es->image)}}",
                        ],
                        initialPreviewAsData:true,
                        initialPreviewFileType: 'image',
                        initialPreviewConfig:[
                            {
                                caption: "{{$es->image}}",
                                size:'1111',
                                width:"120px",
                                url:"{{route('admin.expertise.summary.removeImage',['es_id'=>$es->id, '_token'=>csrf_token()])}}",
                                key:{{$es->id}}
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
