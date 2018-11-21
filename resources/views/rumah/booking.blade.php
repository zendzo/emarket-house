<div class="modal fade" id="bookingModal" tabindex="-1" role="dialog" aria-labelledby="bookingModal">
    <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span></button>
              <h4 class="modal-title">{{ $page_title or config('app.name') }}</h4>
           </div>
           <div class="modal-body">
              <form class="form-horizontal"  action="{{ route('admin.booking.rumah') }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('POST')
              <input type="hidden" name="rumah_id" value="{{ $rumah->id }}">
              <div class="form-group{{ $errors->has('total') ? ' has-error' : '' }}">
                  <label for="total" class="col-sm-2 control-label">Pembeli</label>
                  <div class="col-sm-10">
                  <select name="booked_by" id="booked_by" class="form-control select2">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->username }}</option>
                    @endforeach
                  </select>
                  @if ($errors->has('total'))
                      <span class="help-block">
                          <strong>{{ $errors->first('total') }}</strong>
                      </span>
                  @endif
                  </div>
              </div><!-- form-group -->
           </div>
           <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">@lang('application.close')</button>
              <button type="submit" class="btn btn-primary"><i class="fa fa-money"></i> @lang('application.save')</button>
           </div>
        </div>
        <!-- /.modal-content -->
        </div>
    </form>
</div>
