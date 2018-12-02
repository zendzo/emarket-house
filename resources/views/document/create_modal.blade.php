  <div class="modal fade" id="documentModal" tabindex="-1" role="dialog" aria-labelledby="documentModal">
      <div class="modal-dialog">
          <div class="modal-content">
             <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">{{ $page_title or config('app.name') }}</h4>
             </div>
             <div class="modal-body">
                <form class="form-horizontal"  action="{{ route('document.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <input type="hidden" name="rumah_id" value="{{ $rumah->id }}">
                <div class="form-group{{ $errors->has('document_type_id') ? ' has-error' : '' }}">
                    <label for="document_type_id" class="col-sm-2 control-label">Jenis</label>
                    <div class="col-sm-10">
                    <select name="document_type_id" id="document_type_id" class="form-control">
                        @foreach ($documentType as $type)
                            <option value="{{ $type->id }}">{{ $type->name }} - ({{ $type->keterangan }})</option>
                        @endforeach
                    </select>
                    @if ($errors->has('document_type_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('document_type_id') }}</strong>
                        </span>
                    @endif
                    </div>
                </div><!-- form-group -->
                <div class="form-group{{ $errors->has('document') ? ' has-error' : '' }}">
                    <label for="document" class="col-sm-2 control-label">Lampiran</label>
                    <div class="col-sm-10">
                    <input class="form-control" type="file" name="document" id="document">
                    @if ($errors->has('document'))
                        <span class="help-block">
                            <strong>{{ $errors->first('document') }}</strong>
                        </span>
                    @endif
                    </div>
                </div><!-- form-group -->
                
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
