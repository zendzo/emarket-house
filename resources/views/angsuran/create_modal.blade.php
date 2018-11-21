<div class="modal fade" id="angsuranModal" tabindex="-1" role="dialog" aria-labelledby="angsuranModal">
        <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                  <h4 class="modal-title">{{ $page_title or config('app.name') }}</h4>
               </div>
               <div class="modal-body">
                  <form class="form-horizontal"  action="{{ route('angsuran.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('POST')
                  <input type="hidden" name="rumah_id" value="{{ $rumah->id }}">
                  <input type="hidden" name="kode" value="{{ strtoupper(str_random(8)) }}">
                  <div class="form-group{{ $errors->has('total') ? ' has-error' : '' }}">
                      <label for="total" class="col-sm-2 control-label">Nominal</label>
                      <div class="col-sm-10">
                      <input class="form-control" type="text" name="total" id="total">
                      @if ($errors->has('total'))
                          <span class="help-block">
                              <strong>{{ $errors->first('total') }}</strong>
                          </span>
                      @endif
                      </div>
                  </div><!-- form-group -->
                  <div class="form-group{{ $errors->has('tanggal_bayar') ? ' has-error' : '' }}">
                        <label for="tanggal_bayar" class="col-sm-2 control-label">Tgl Pemb.</label>
                        <div class="col-sm-10">
                        <input class="form-control" type="text" name="tanggal_bayar" id="tanggal_bayar">
                        @if ($errors->has('tanggal_bayar'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tanggal_bayar') }}</strong>
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
  