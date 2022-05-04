@extends('layouts.admin')

@section('title')

    صلاحيات المستخدمين

@endsection

@section('content')

    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">تعديل صلاحية</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}"
                                                   class="default-color">الرئيسية</a></li>
                    <li class="breadcrumb-item active">تعديل صلاحية</li>
                </ol>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">

                <div class="card-body">


                    <form method="post" action="{{route('admin.roles.update')}}" autocomplete="off">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="id" value="{{$role->id}}">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label> إسم الصلاحية بالعربية :</label>

                                    <input type="text" name="name_ar" class="form-control" value="{{old('name_ar',$role->getTranslation('name','ar'))}}">

                                    @error('name_ar')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label> إسم الصلاحية بالإنجليزية :</label>

                                    <input type="text" name="name_en" class="form-control" value="{{old('name_en',$role->getTranslation('name','en'))}}">

                                    @error('name_en')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>




                        </div>
                        <br>  <br>

                        <div class="row">

                            @foreach(config('general.permissions') as $name => $value)
                                <div class="custom-control custom-checkbox col-sm-3">
                                    <input id="role{{$loop->iteration}}" type="checkbox" class="custom-control-input" name="permissions[]" value="{{$name}}" {{in_array($name, $role->permissions) ? 'checked' : ''}}>{{$value}}

                                    <label class="custom-control-label" for="role{{$loop->iteration}}">
                                    </label>
                                </div>
                            @endforeach



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


