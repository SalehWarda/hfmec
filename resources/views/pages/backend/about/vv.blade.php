@extends('layouts.admin')

@section('title')

   الرؤيا والقيم

@endsection


@section('content')




        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="mb-0"> الرؤيا والقيم</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}"
                                                       class="default-color">الرئيسية</a></li>
                        <li class="breadcrumb-item active"> الرؤيا والقيم</li>
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


                                        <form method="post" action="{{route('admin.vv.update')}}" autocomplete="off" enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')

                                            <input type="hidden" name="id" value="{{$vv->id}}">

                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="vv_ar">الرؤيا والقيم بالعربية :</label>

                                                        <textarea name="vv_ar" rows="3" class="form-control summernote">{!! old('vv_ar',$vv->getTranslation('vv','ar'))  !!}</textarea>

                                                        @error('vv_ar')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="vv_en"> الرؤيا والقيم بالإنجليزية :</label>

                                                        <textarea name="vv_en" rows="3" class="form-control summernote">{!! old('vv_en',$vv->getTranslation('vv','en')) !!}</textarea>

                                                        @error('vv_en')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row pt-4">

                                                <div class="col-12">

                                                    <label for="image">صورة المقدمة :</label>
                                                    <br>
                                                    <div class="file-loading">
                                                        <input type="file"  name="image" id="vv-image" class="file-input-overview ">
                                                        <span class="form-text text-muted">Image width should be 500px x 500px</span>


                                                    </div>
                                                    @error('image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                            </div>
                                            <br>
                                            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">حفظ التغييرات</button>


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
                    $("#vv-image").fileinput({
                        theme: "fa",
                        maxFileCount: 1,
                        allowedFileTypes: ['image'],
                        showCancel: true,
                        showRemove: false,
                        showUpload: false,
                        overwriteInitial: false,
                        initialPreview:[
                            "{{asset('assets/images/about/'.$vv->image)}}",
                        ],
                        initialPreviewAsData:true,
                        initialPreviewFileType: 'image',
                        initialPreviewConfig:[
                            {
                                caption: "{{$vv->image}}",
                                size:'1111',
                                width:"120px",
                                url:"{{route('admin.vv.removeImage',['vv_id'=>$vv->id, '_token'=>csrf_token()])}}",
                                key:{{$vv->id}}
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
