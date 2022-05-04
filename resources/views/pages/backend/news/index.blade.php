@extends('layouts.admin')

@section('title')

    {{trans('dashboard.HFMEC')}} - {{trans('dashboard.CompanyNews')}}

@endsection
@section('content')

    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{trans('dashboard.CompanyNews')}} </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('dashboard.Main')}}</a></li>
                    <li class="breadcrumb-item active">{{trans('dashboard.CompanyNews')}}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- main body -->
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">


                    <div class="d-block d-md-flex justify-content-between">
                        <div class="d-block">
                            <h5 class="card-title pb-0 border-0">{{trans('dashboard.CompanyNews')}}</h5>
                        </div>

                        <div class="d-block d-md-flex justify-content-between">
                            <div class="d-block">
                                <a class="btn btn-success icon left"

                                   href="{{route('admin.news.create')}}">{{trans('dashboard.AddNews')}}<i class="fa fa-plus"></i></a>
                            </div>

                        </div>

                    </div>

{{--                    @include('pages.backend.news.filter.filter')--}}
                    <div class="table-responsive mt-15">
                        <table class="table center-aligned-table mb-0">
                            <thead>
                            <tr class="text-dark">
                                <th>{{trans('dashboard.NewsImage')}}</th>
                                <th>{{trans('dashboard.NewsTitle')}}</th>
                                <th>{{trans('dashboard.NewsContent')}}</th>
                                <th>{{trans('dashboard.Actions')}}</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                @forelse($news as $new)

                                    <td>
                                        @if($new->image)
                                            <img src="{{asset('assets/images/news/'.$new->image)}}" width="60" height="60" alt="New pic">
                                        @else
                                            <img src="{{asset('assets/images/news/noImage.jpg')}}" width="60" height="60" alt="New pic">
                                        @endif

                                    </td>

                                    <td>{!! \Illuminate\Support\Str::limit($new->title, 30,'...')  !!}</td>
                                    <td>{!! \Illuminate\Support\Str::limit($new->content, 30,'...')  !!}</td>

                                    <td>
                                        <a href="{{route('admin.news.edit',$new->id)}}"
                                           class="btn btn-info btn-sm" role="button" title="{{trans('dashboard.Edit')}}" aria-pressed="true"><i
                                                class="fa fa-edit"></i></a>
                                        <button type="button" class="btn btn-danger btn-sm"
                                                data-toggle="modal"
                                                data-target="#delete_new{{ $new->id }}" title="{{trans('dashboard.Delete')}}"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                            </tr>

{{--                            delete Modal Category--}}
                            <div class="modal fade" id="delete_new{{ $new->id }}" tabindex="-1" role="dialog"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <div class="modal-title">
                                                <div class="mb-30">

                                                    <h6> {{trans('dashboard.Delete')}}  {{$new->title}}</h6>

                                                </div>
                                            </div>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <form class="form" action="{{ route('admin.news.delete') }}"
                                                  method="post">
                                                @csrf
                                                @method('DELETE')

                                                <input type="hidden" name="delete_new_id" value="{{$new->id}}" id="id">

                                                <h6>{{trans('dashboard.AreSureOfTheDeletingProcess')}}: <span class="text-danger">{{$new->title}}</span></h6>


                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{trans('dashboard.Close')}}
                                                    </button>
                                                    <button type="submit"
                                                            class="btn btn-danger">{{trans('dashboard.Delete')}}</button>

                                                </div>
                                            </form>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">{{trans('dashboard.NoNewsFound')}}</td>
                                </tr>




                            @endforelse





                            </tbody>

                            <tfoot>
                            <tr>
                                <td colspan="4">
                                    <div class="float-right">

                                        {!! $news->links() !!}

                                    </div>

                                </td>
                            </tr>

                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>


@endsection
