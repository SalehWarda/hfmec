<div class="card-body">
    <form action="{{route('admin.projects')}}" method="get">
        <div class="row">
            <div class="col-2">
                <div class="form-group">
                    <input type="text" name="keyword" value="{{old('keyword',request()->input('keyword'))}}" class="form-control" placeholder="{{trans('dashboard.SearchHere')}}">

                </div>

            </div>
            <div class="col-2">
                <div class="form-group">
                    <select name="status" class="custom-select my-1 mr-sm-2">
                        <option value="">---</option>
                        <option value="1" {{old('status',request()->input('status')) == '1' ? 'selected' : ''}}>{{trans('dashboard.Completed')}}</option>
                        <option value="0" {{old('status',request()->input('status')) == '0' ? 'selected' : ''}}>{{trans('dashboard.Ongoing')}}</option>

                    </select>

                </div>

            </div>
            <div class="col-2">
                <div class="form-group">
                    <select name="sort_by" class="custom-select my-1 mr-sm-2">
                        <option value="">---</option>
                        <option value="name" {{old('sort_by',request()->input('sort_by')) == 'name' ? 'selected':''}}>{{trans('dashboard.Name')}}</option>

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
