<div class="modal fade" id="photoModal" tabindex="-1" role="dialog" aria-labelledby="photoModal">
    <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span></button>
              <h4 class="modal-title">{{ $page_title or config('app.name') }}</h4>
           </div>
           <div class="modal-body">
              <form class="form-horizontal"  action="{{ route('admin.role.store') }}" method="POST">
                      {{ csrf_field() }}
        
                      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-sm-2 control-label">@lang('application.role name')</label>
        
                        <div class="col-sm-10">
                          <input id="name" name="name" type="text" class="form-control" placeholder="@lang('application.role name')" value="{{ old('name') }}" required>
        
                          @if ($errors->has('name'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('name') }}</strong>
                              </span>
                          @endif
                        </div>
                      </div>
              
           </div>
           <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">@lang('application.close')</button>
              <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> @lang('application.save')</button>
           </div>
        </div>
        <!-- /.modal-content -->
        </div>
        </form>
</div>
