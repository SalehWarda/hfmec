@extends('layouts.admin')

@section('title')

    {{trans('dashboard.HFMEC')}} - {{trans('dashboard.AddUser')}}

@endsection

@section('content')




    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{trans('dashboard.AddUser')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}"
                                                   class="default-color">{{trans('dashboard.Main')}}</a></li>
                    <li class="breadcrumb-item active">{{trans('dashboard.AddUser')}}</li>
                </ol>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">

                <div class="card-body">


                    <form method="post" action="{{route('admin.users.store')}}" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('dashboard.FullNameInArabic')}} :</label>

                                    <input type="text" name="name_ar" class="form-control" value="{{old('name_ar')}}">

                                    @error('name_ar')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('dashboard.FullNameInEnglish')}} :</label>

                                    <input type="text" name="name_en" class="form-control" value="{{old('name_en')}}">

                                    @error('name_en')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>


                        </div>


                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> {{trans('dashboard.Mobile')}} :</label>

                                    <input type="text" name="mobile" class="form-control" value="{{old('mobile')}}">

                                    @error('mobile')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> {{trans('dashboard.Email')}} :</label>

                                    <input type="email" name="email" class="form-control" value="{{old('email')}}">

                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">{{trans('dashboard.Role')}} :</label>
                                    <br>
                                    <select class="form-control form-control-lg mb-15" name="role_id">

                                        <option selected disabled> {{trans('dashboard.Choose')}}...</option>

                                        @foreach($roles as $role)
                                            <option value="{{$role->id}}" {{old('role_id') == $role->id ? 'selected' : null}}>{{$role->name}}</option>

                                        @endforeach

                                    </select>
                                    @error('role_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('dashboard.Password')}} :</label>

                                    <input type="password" name="password" class="form-control" value="{{old('password')}}">

                                    @error('password')
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

@endsection
