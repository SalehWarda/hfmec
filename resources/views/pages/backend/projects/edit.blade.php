@extends('layouts.admin')

@section('title')

    {{trans('dashboard.HFMEC')}} - {{trans('dashboard.EditProject')}}

@endsection

@section('content')

    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{trans('dashboard.EditProject')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}"
                                                   class="default-color">{{trans('dashboard.Main')}}</a></li>
                    <li class="breadcrumb-item active">{{trans('dashboard.EditProject')}}</li>
                </ol>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">

                <div class="card-body">


                    <form method="post" action="{{route('admin.projects.update')}}" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <input type="hidden" name="id" value="{{$project->id}}">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><strong>{{trans('dashboard.ProjectNameInArabic')}}</strong>  :</label>

                                    <input type="text" name="name_ar" class="form-control" value="{{old('name_ar',$project->getTranslation('name','ar'))}}">

                                    @error('name_ar')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label ><strong> {{trans('dashboard.ProjectNameInEnglish')}}</strong> :</label>

                                    <input type="text" name="name_en" class="form-control" value="{{old('name_en',$project->getTranslation('name','en'))}}">

                                    @error('name_en')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>




                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="status"><strong>{{trans('dashboard.Status')}}</strong> :</label>
                                    <br>
                                    <select class="form-control form-control-lg mb-15" name="status">

                                        <option selected disabled> {{trans('dashboard.Choose')}}...</option>
                                        <option value="1" {{old('status',$project->status) == '1' ? 'selected' : null}}>{{trans('dashboard.Completed')}}</option>
                                        <option value="0" {{old('status',$project->status) == '0' ? 'selected' : null}}>{{trans('dashboard.Ongoing')}}</option>

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
                                    <label> <strong>{{trans('dashboard.Client')}}</strong>  :</label>

                                    <input type="text" name="client" class="form-control" value="{{old('client',$project->client)}}">

                                    @error('client')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label> <strong>{{trans('dashboard.CommencementDate')}}</strong> :</label>

                                    <input type="date" name="commencement_date" class="form-control" value="{{old('commencement_date',$project->commencement_date)}}">

                                    @error('commencement_date')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>  <strong> {{trans('dashboard.Location')}}</strong> :</label>

                                    <input type="text" name="location" class="form-control" value="{{old('location',$project->location)}}">

                                    @error('location')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>




                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="service_id"><strong>{{trans('dashboard.Service')}} </strong> :</label>
                                    <br>
                                    <select id="service_id" class="form-control form-control-lg mb-15" name="service_id">

                                        <option selected disabled> {{trans('dashboard.Choose')}}...</option>
                                        @foreach($services as $service)
                                            <option value="{{$service->id}}" {{old('service_id',$project->service_id) == $service->id ? 'selected' : null}}>
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
                                    <label> <strong>{{trans('dashboard.ProjectDescriptionInArabic')}}</strong>  :</label>

                                    <textarea name="description_ar" rows="3" class="form-control summernote">
                            {!! old('description_ar',$project->getTranslation('description','ar')) !!}
                              </textarea>
                                    @error('description_ar')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> <strong>{{trans('dashboard.ProjectDescriptionInEnglish')}}</strong>  :</label>

                                    <textarea name="description_en" rows="3" class="form-control summernote">
                            {!! old('description_en',$project->getTranslation('description','en')) !!}
                              </textarea>

                                    @error('description_en')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>


                        </div>



                        <div class="row">

                            <div class="col-8">

                                <label for="project-images"><strong>{{trans('dashboard.ProjectImages')}}</strong>  :</label>
                                <br>
                                <div class="file-loading">
                                    <input type="file" multiple="multiple" name="images[]" id="project-images" class="file-input-overview ">
                                    <span class="form-text text-muted">Image width should be 500px x 500px</span>


                                </div>
                                @error('image')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-4">

                                <label for="project-images"><strong>{{trans('dashboard.clientImage')}}</strong> :</label>
                                <br>
                                <div class="file-loading">
                                    <input type="file" name="client_image" id="client-image" class="file-input-overview ">
                                    <span class="form-text text-muted">Image width should be 500px x 500px</span>


                                </div>
                                @error('client_image')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <br>
                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('dashboard.SaveChanges')}} </button>


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
                overwriteInitial: false,
                initialPreview: [
                    @if($project->media()->count() > 0)
                        @foreach($project->media as $media)
                        "{{ asset('assets/images/projects/' . $media->file_name) }}",
                    @endforeach
                    @endif
                ],
                initialPreviewAsData: true,
                initialPreviewFileType: 'image',
                initialPreviewConfig: [
                        @if($project->media()->count() > 0)
                        @foreach($project->media as $media)
                    {
                        caption: "{{ $media->file_name }}",
                        size: '{{ $media->file_size }}',
                        width: "120px",
                        url: "{{ route('admin.projects.removeImage', ['image_id' => $media->id, 'project_id' => $project->id, '_token' => csrf_token()]) }}",
                        key: {{ $media->id }}
                    },
                    @endforeach
                    @endif
                ]
            }).on('filesorted', function (event, params) {
                console.log(params.previewId, params.oldIndex, params.newIndex, params.stack);
            });
            $("#client-image").fileinput({

                theme: "fa",
                maxFileCount: 1,
                allowedFileTypes: ['image'],
                showCancel: true,
                showRemove: false,
                showUpload: false,
                overwriteInitial: false,
                initialPreview:[

                    "{{asset('assets/images/client/'. $project->client_image)}}",

                ],
                initialPreviewAsData:true,
                initialPreviewFileType: 'image',
                initialPreviewConfig:[

                    {
                        caption: "{{$project->client_image}}",
                        size:'1111',
                        width:"120px",
                        url:"{{route('admin.client.removeImage',['client_id'=>$project->id, '_token'=>csrf_token()])}}",
                        key:{{$project->id}}
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
