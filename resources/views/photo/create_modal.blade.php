<div class="modal fade" id="photoModal" tabindex="-1" role="dialog" aria-labelledby="photoModal">
        <div class="modal-dialog">
                <div class="modal-content">
                   <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span></button>
                      <h4 class="modal-title">{{ $page_title or config('app.name') }}</h4>
                   </div>
                   <div class="modal-body">
                      <form class="form-horizontal"  action="{{ route('admin.photo-rumah.store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      @method('POST')
                      <input type="hidden" name="rumah_id" value="{{ $rumah->id }}">
                      <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-sm-2 control-label">Ket.</label>
                            <div class="col-sm-10">
                            <input class="form-control" type="text" name="description" id="description">
                            @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                            </div>
                        </div><!-- form-group -->
                      <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                          <label for="photo" class="col-sm-2 control-label">Lampiran</label>
                          <div class="col-sm-10">
                          <input class="form-control" type="file" name="photo" id="photo">
                          @if ($errors->has('photo'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('photo') }}</strong>
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
