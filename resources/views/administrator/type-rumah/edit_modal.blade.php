<div class="modal-dialog">
    <div class="modal-content">
       <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
          <h4 class="box-title">{{ $page_title or config('app.name') }}</h4>
       </div>
       <div class="modal-body">
          <form class="form-horizontal"  action="{{ route('admin.type-rumah.update',$type->id) }}" method="POST">
             {{ csrf_field() }}
             {{ method_field('PATCH') }}
    
             <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                <label for="type" class="col-sm-2 control-label">Type</label>
    
                <div class="col-sm-10">
                <input id="type" name="type" type="text" class="form-control"  value="{{ $type->type }}" required>
    
                @if ($errors->has('type'))
                      <span class="help-block">
                         <strong>{{ $errors->first('type') }}</strong>
                      </span>
                @endif
                </div>
             </div>
             {{-- </form> should be here --}}
       </div>
       <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">@lang('application.close')</button>
          <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> @lang('application.save')</button>
       </div>
    </div>
    <!-- /.modal-content -->
    </div>
    </form>