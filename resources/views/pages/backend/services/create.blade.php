@extends('layouts.admin')

@section('title')

    {{trans('dashboard.HFMEC')}} - {{trans('dashboard.AddNewService')}}

@endsection

@section('content')

    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{trans('dashboard.AddNewService')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}"
                                                   class="default-color">{{trans('dashboard.Main')}}</a></li>
                    <li class="breadcrumb-item active">{{trans('dashboard.AddNewService')}}</li>
                </ol>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">

                <div class="card-body">


                    <form method="post" action="{{route('admin.services.store')}}" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label> {{trans('dashboard.ServiceNameInArabic')}} :</label>

                                    <input type="text" name="name_ar" class="form-control" value="{{old('name_ar')}}">

                                    @error('name_ar')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label> {{trans('dashboard.ServiceNameInEnglish')}} :</label>

                                    <input type="text" name="name_en" class="form-control" value="{{old('name_en')}}">

                                    @error('name_en')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="status">{{trans('dashboard.Status')}} :</label>
                                    <br>
                                    <select class="form-control form-control-lg mb-15" name="status">

                                        <option selected disabled>  {{trans('dashboard.Choose')}}...</option>
                                        <option value="1" {{old('status') == '1' ? 'selected' : null}}>??????</option>
                                        <option value="0" {{old('status') == '0' ? 'selected' : null}}>?????? ??????</option>

                                    </select>
                                    @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>


                        </div>

                        <div class="row">
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label> {{trans('dashboard.ServiceDescriptionInArabic')}} :</label>

                                    <textarea name="description_ar" rows="3" class="form-control summernote">
                            {!! old('description_ar') !!}
                              </textarea>
                                    @error('description_ar')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> {{trans('dashboard.ServiceDescriptionInEnglish')}} :</label>

                                    <textarea name="description_en" rows="3" class="form-control summernote">
                            {!! old('description_en') !!}
                              </textarea>

                                    @error('description_en')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>


                        </div>



                        <div class="row pt-4">

                            <div class="col-12">

                                <label for="cover">{{trans('dashboard.ServiceImage')}} :</label>
                                <br>
                                <div class="file-loading">
                                    <input type="file"  name="image" id="service-image" class="file-input-overview ">
                                    <span class="form-text text-muted">Image width should be 500px x 500px</span>


                                </div>
                                @error('image')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
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

            $("#service-image").fileinput({

                theme: "fa",
                maxFileCount: 1,
                allowedFileTypes: ['image'],
                showCancel: true,
                showRemove: false,
                showUpload: false,
                overwriteInitial: false



            })

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
