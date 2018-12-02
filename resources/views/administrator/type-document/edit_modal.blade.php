<div class="modal-dialog">
    <div class="modal-content">
       <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
          <h4 class="box-title">{{ $page_title or config('app.name') }}</h4>
       </div>
       <div class="modal-body">
          <form class="form-horizontal"  action="{{ route('admin.type-document.update',$type->id) }}" method="POST">
             {{ csrf_field() }}
             {{ method_field('PATCH') }}
    
             <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-sm-2 control-label">Type</label>
    
                <div class="col-sm-10">
                <input id="name" name="name" type="text" class="form-control"  value="{{ $type->name }}" required>
    
                @if ($errors->has('name'))
                      <span class="help-block">
                         <strong>{{ $errors->first('name') }}</strong>
                      </span>
                @endif
                </div>
             </div>
             <div class="form-group{{ $errors->has('keterangan') ? ' has-error' : '' }}">
                  <label for="keterangan" class="col-sm-2 control-label">Ketarangan</label>
      
                  <div class="col-sm-10">
                  <input id="keterangan" name="keterangan" type="text" class="form-control"  value="{{ $type->keterangan }}" required>
      
                  @if ($errors->has('keterangan'))
                        <span class="help-block">
                           <strong>{{ $errors->first('keterangan') }}</strong>
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