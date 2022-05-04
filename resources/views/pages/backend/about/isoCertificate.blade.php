@extends('layouts.admin')

@section('title')

    {{trans('dashboard.HFMEC')}} - {{trans('dashboard.ISOCertificates')}}

@endsection


@section('content')




        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="mb-0">{{trans('dashboard.ISOCertificates')}}</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}"
                                                       class="default-color">{{trans('dashboard.Main')}}</a></li>
                        <li class="breadcrumb-item active">{{trans('dashboard.ISOCertificates')}}</li>
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


                                        <form method="post" action="{{route('admin.isoCertificates.update')}}" autocomplete="off" enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')

                                            <input type="hidden" name="id" value="{{$iso->id}}">

                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="iso_ar">{{trans('dashboard.ISOCertificatesInArabic')}} :</label>

                                                        <textarea name="iso_ar" rows="3" class="form-control summernote">{!! old('iso_ar',$iso->getTranslation('iso','ar'))  !!}</textarea>

                                                        @error('iso_ar')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="imsPolicy_en"> {{trans('dashboard.ISOCertificatesInEnglish')}} :</label>

                                                        <textarea name="iso_en" rows="3" class="form-control summernote">{!! old('iso_en',$iso->getTranslation('iso','en')) !!}</textarea>

                                                        @error('iso_ar')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row pt-4">

                                                <div class="col-12">

                                                    <label for="image">{{trans('dashboard.ISOCertificatesImages')}} :</label>
                                                    <br>
                                                    <div class="file-loading">
                                                        <input type="file" multiple name="images[]" id="iso-images" class="file-input-overview ">
                                                        <span class="form-text text-muted">Image width should be 500px x 500px</span>


                                                    </div>
                                                    @error('image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                            </div>
                                            <br>
                                            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('dashboard.SaveChanges')}}</button>


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
                    $("#iso-images").fileinput({
                        theme: "fa",
                        maxFileCount: 5,
                        allowedFileTypes: ['image'],
                        showCancel: true,
                        showRemove: false,
                        showUpload: false,
                        overwriteInitial: false,
                        initialPreview: [
                            @if($iso->media()->count() > 0)
                                @foreach($iso->media as $media)
                                "{{ asset('assets/images/about/' . $media->file_name) }}",
                            @endforeach
                            @endif
                        ],
                        initialPreviewAsData: true,
                        initialPreviewFileType: 'image',
                        initialPreviewConfig: [
                                @if($iso->media()->count() > 0)
                                @foreach($iso->media as $media)
                            {
                                caption: "{{ $media->file_name }}",
                                size: '{{ $media->file_size }}',
                                width: "120px",
                                url: "{{ route('admin.isoCertificates.removeImage', ['image_id' => $media->id, 'iso_id' => $iso->id, '_token' => csrf_token()]) }}",
                                key: {{ $media->id }}
                            },
                            @endforeach
                            @endif
                        ]
                    }).on('filesorted', function (event, params) {
                        console.log(params.previewId, params.oldIndex, params.newIndex, params.stack);
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
