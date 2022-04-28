@extends('layouts.admin')

@section('title')

    المشاريع

@endsection

@section('content')

    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">إضافة مشروع</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}"
                                                   class="default-color">الرئيسية</a></li>
                    <li class="breadcrumb-item active">إضافة مشروع</li>
                </ol>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">

                <div class="card-body">


                    <form method="post" action="{{route('admin.projects.store')}}" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label> إسم المشروع بالعربية :</label>

                                    <input type="text" name="name_ar" class="form-control" value="{{old('name_ar')}}">

                                    @error('name_ar')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label> إسم المشروع بالإنجليزية :</label>

                                    <input type="text" name="name_en" class="form-control" value="{{old('name_en')}}">

                                    @error('name_en')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>




                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="status">الحالة :</label>
                                    <br>
                                    <select class="form-control form-control-lg mb-15" name="status">

                                        <option selected disabled> إختر...</option>
                                        <option value="1" {{old('status') == '1' ? 'selected' : null}}>مكتمل</option>
                                        <option value="0" {{old('status') == '0' ? 'selected' : null}}>تحت العمل</option>

                                    </select>
                                    @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>


                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label> إسم العميل :</label>

                                    <input type="text" name="client" class="form-control" value="{{old('client')}}">

                                    @error('client')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label> تاريخ البداية :</label>

                                    <input type="date" name="commencement_date" class="form-control" value="{{old('commencement_date')}}">

                                    @error('commencement_date')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label> الموقع الجغرافي :</label>

                                    <input type="text" name="location" class="form-control" value="{{old('location')}}">

                                    @error('location')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>




                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="service_id">نوع الخدمة :</label>
                                    <br>
                                    <select id="service_id" class="form-control form-control-lg mb-15" name="service_id">

                                        <option selected disabled> إختر...</option>
                                        @foreach($services as $service)
                                            <option value="{{$service->id}}" {{old('service_id') == $service->id ? 'selected' : null}}>
                                                {{$service->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('service_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>


                        </div>

                        <div class="row">
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label> وصف المشروع بالعربية :</label>

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
                                    <label> وصف المشروع بالإنجليزية :</label>

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

                                <label for="project-images">صور المشروع :</label>
                                <br>
                                <div class="file-loading">
                                    <input type="file" multiple="multiple" name="images[]" id="project-images" class="file-input-overview ">
                                    <span class="form-text text-muted">Image width should be 500px x 500px</span>


                                </div>
                                @error('image')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <br>
                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">حفظ
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

            $("#project-images").fileinput({

                theme: "fa",
                maxFileCount: 5,
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
