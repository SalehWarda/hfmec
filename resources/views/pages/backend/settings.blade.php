@extends('layouts.admin')

@section('title')

    {{trans('dashboard.HFMEC')}} - {{trans('dashboard.Profile')}}

@endsection

@section('content')

    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{trans('dashboard.Settings')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="default-color">{{trans('dashboard.Home')}}</a></li>
                    <li class="breadcrumb-item active">{{trans('dashboard.Settings')}}</li>
                </ol>
            </div>
        </div>
    </div>


    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <form enctype="multipart/form-data" method="post" action="{{route('admin.settings.updatee')}}">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="id" value="{{$settings->id}}">
                        <div class="row">
                            <div class="col-md-6 border-right-2 border-right-blue-400">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label font-weight-semibold">{{trans('dashboard.Office_name')}}<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input name="office_name" value="{{$settings->office_name}}" required
                                               type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label font-weight-semibold">{{trans('dashboard.Office_Abbreviation')}}<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input name="office_abbreviation" value="{{$settings->office_abbreviation}}" required
                                               type="text" class="form-control">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label font-weight-semibold">{{trans('dashboard.Mobile')}}</label>
                                    <div class="col-lg-9">
                                        <input name="mobile" value="{{$settings->mobile}}" type="text"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label font-weight-semibold">{{trans('dashboard.Email')}}</label>
                                    <div class="col-lg-9">
                                        <input name="email" value="{{$settings->email}}" type="email" class="form-control"
                                               >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label font-weight-semibold">{{trans('dashboard.Office_Address')}}<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input  name="address" value="{{$settings->address}}" type="text" class="form-control"
                                               >
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label font-weight-semibold">{{trans('dashboard.Office_LogoB')}}</label>
                                    <div class="col-lg-9">
                                        <div class="mb-3">
                                            <img style="width: 100px" height="100px" src="{{asset('assets/images/logo/'.$settings->logo)}}" alt="">
                                        </div>
                                        <input name="logo" accept="image/*" type="file" class="file-input"
                                               data-show-caption="false" data-show-upload="false" data-fouc>
                                        <p class="text-danger">يفضل أن يكون حجمه (120 * 600)</p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label font-weight-semibold">{{trans('dashboard.Office_LogoS')}}</label>
                                    <div class="col-lg-9">
                                        <div class="mb-3">
                                            <img style="width: 100px" height="100px" src="{{asset('assets/images/logo/'.$settings->logo1)}}" alt="">
                                        </div>
                                        <input name="logo2" accept="image/*" type="file" class="file-input"
                                               data-show-caption="false" data-show-upload="false" data-fouc>

                                        <p class="text-danger">يفضل أن يكون حجمه (70 * 250)</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>


                        <div class="row pt-4">

                            <div class="col-12">

                                <label for="cover">{{trans('dashboard.Image')}} :</label>
                                <br>
                                <div class="file-loading">
                                    <input type="file"  name="loginImage" id="login-image" class="file-input-overview ">
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
    <!-- row closed -->

@endsection

@section('script')

    <script>
        $(function (){

            $("#login-image").fileinput({

                theme: "fa",
                maxFileCount: 1,
                allowedFileTypes: ['image'],
                showCancel: true,
                showRemove: false,
                showUpload: false,
                overwriteInitial: false,
                initialPreview:[

                    "{{asset('assets/backend/images/'.$settings->loginImage)}}",

                ],
                initialPreviewAsData:true,
                initialPreviewFileType: 'image',
                initialPreviewConfig:[

                    {
                        caption: "{{$settings->loginImage}}",
                        size:'1111',
                        width:"120px",
                        url:"{{route('admin.removeLoginImage',['login_id'=>$settings->id, '_token'=>csrf_token()])}}",
                        key:{{$settings->id}}
                    }
                ]



            });

        })

    </script>
@endsection

