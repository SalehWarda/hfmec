<div class="card-body">
    <form action="{{route('admin.careers')}}" method="get">
        <div class="row">
            <div class="col-2">
                <div class="form-group">
                    <input type="text" name="keyword" value="{{old('keyword',request()->input('keyword'))}}" class="form-control" placeholder=" {{trans('dashboard.SearchHere')}}
">

                </div>

            </div>
{{--            <div class="col-2">--}}
{{--                <div class="form-group">--}}
{{--                    <select name="status" class="custom-select my-1 mr-sm-2">--}}
{{--                        <option value="">---</option>--}}
{{--                        <option value="1" {{old('status',request()->input('status')) == '1' ? 'selected' : ''}}>Active</option>--}}
{{--                        <option value="0" {{old('status',request()->input('status')) == '0' ? 'selected' : ''}}>Inactive</option>--}}

{{--                    </select>--}}

{{--                </div>--}}

{{--            </div>--}}
            <div class="col-2">
                <div class="form-group">
                    <select name="sort_by" class="custom-select my-1 mr-sm-2">
                        <option value="">---</option>
                        <option value="full_name" {{old('sort_by',request()->input('sort_by')) == 'full_name' ? 'selected':''}}>
                            {{trans('dashboard.FullName')}}</option>

                    </select>

                </div>

            </div>

            <div class="col-2">
                <div class="form-group">
                    <select name="order_by" class="custom-select my-1 mr-sm-2">
                        <option value="">---</option>
                        <option value="asc" {{old('order_by',request()->input('order_by')) == 'asc' ? 'selected':''}}>ASC</option>
                        <option value="desc" {{old('order_by',request()->input('order_by')) == 'desc' ? 'selected':''}}>DESC</option>
                    </select>

                </div>

            </div>

            <div class="col-2">
                <div class="form-group">
                    <select name="limit_by" class="custom-select my-1 mr-sm-2">
                        <option value="">---</option>
                        <option value="10" {{old('limit_by',request()->input('limit_by')) == '10' ? 'selected':''}}>10</option>
                        <option value="20" {{old('limit_by',request()->input('limit_by')) == '20' ? 'selected':''}}>20</option>
                        <option value="50" {{old('limit_by',request()->input('limit_by')) == '50' ? 'selected':''}}>50</option>
                        <option value="100" {{old('limit_by',request()->input('limit_by')) == '100' ? 'selected':''}}>100</option>
                    </select>

                </div>

            </div>

            <div class="col-2">
                <div class="form-group ">
                    <button type="submit" name="submit" class="btn btn-info ml-70"><i class="fa fa-search"></i> {{trans('dashboard.Search')}} </button>
                </div>
            </div>
        </div>


    </form>

</div>
