@extends('layouts.master')

@section('script')
<script src="{{ asset('AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<script>
  $(function () {
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
</script>
@endsection

@section('css')
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
@endsection

@section('content')
    <div class="row">
       <!-- right column -->
       <div class="col-sm-offset-1 col-md-10">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Input Unit Rumah</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ route('admin.rumah.update', $rumah->id) }}" method="POST">
              @csrf
              @method('PATCH')
              <div class="box-body">
                <div class="form-group{{ $errors->has('perumahan_id') ? ' has-error' : '' }}"">
                  <label for="perumahan_id" class="col-sm-2 control-label">Nama Perum.</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="perumahan_id" id="perumahan_id">
                      @foreach ($listPerumahan as $perumahan)
                          <option value="{{ $perumahan->id }}">{{ $perumahan->name }}</option>
                      @endforeach
                    </select>
                    @if ($errors->has('perumahan_id'))
                          <span class="help-block">
                              <strong>{{ $errors->first('perumahan_id') }}</strong>
                          </span>
                      @endif
                  </div>
                </div> <!-- form-group -->
                <div class="form-group{{ $errors->has('rumah_type_id') ? ' has-error' : '' }}"">
                  <label for="rumah_type_id" class="col-sm-2 control-label">Tipe Rumah.</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="rumah_type_id" id="rumah_type_id">
                        @foreach ($rumahType as $type)
                            <option value="{{ $type->id }}">{{ $type->type }}</option>
                        @endforeach
                      </select>
                    @if ($errors->has('address'))
                          <span class="help-block">
                              <strong>{{ $errors->first('address') }}</strong>
                          </span>
                      @endif
                  </div>
                </div> <!-- form-group -->
                  <div class="form-group{{ $errors->has('block') ? ' has-error' : '' }}"">
                      <label for="block" class="col-sm-2 control-label">Blok</label>
                      <div class="col-sm-10">
                        <input class="form-control" type="text" name="block" id="block" value="{{ $rumah->block }}">
                        @if ($errors->has('block'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('block') }}</strong>
                              </span>
                          @endif
                      </div>
                    </div> <!-- form-group -->
                    <div class="form-group{{ $errors->has('subsidi') ? ' has-error' : '' }}"">
                        <label for="subsidi" class="col-sm-2 control-label">Subsidi</label>
                        <div class="col-sm-10">
                          <select name="subsidi" id="subsidi" class="form-control">
                            <option value="subsidi" {{ $rumah->subsidi ? 'selected' : ''}}>Rumah Subsidi</option>
                            <option value="tidak" {{ $rumah->subsidi ? '' : 'selected'}}>Rumah Tidak Subsidi</option>
                          </select>
                          @if ($errors->has('subsidi'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('subsidi') }}</strong>
                                </span>
                            @endif
                        </div>
                      </div> <!-- form-group -->
                      <div class="form-group{{ $errors->has('document_approved') ? ' has-error' : '' }}"">
                            <label for="document_approved" class="col-sm-2 control-label">Dok. Pengajuan</label>
                            <div class="col-sm-10">
                              <select name="document_approved" id="document_approved" class="form-control">
                                <option value="1" {{ $rumah->document_approved ? 'selected':'' }}>Lengkap</option>
                                <option value="0" {{ $rumah->document_approved ? '':'selected' }}>Belum</option>
                              </select>
                              @if ($errors->has('document_approved'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('document_approved') }}</strong>
                                    </span>
                                @endif
                            </div>
                          </div> <!-- form-group -->
                  <div class="form-group{{ $errors->has('number') ? ' has-error' : '' }}"">
                    <label for="number" class="col-sm-2 control-label">Nomor</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="text" name="number" id="number" value="{{ $rumah->number }}">
                      @if ($errors->has('number'))
                            <span class="help-block">
                                <strong>{{ $errors->first('number') }}</strong>
                            </span>
                        @endif
                    </div>
                  </div> <!-- form-group -->
                  <div class="form-group{{ $errors->has('harga') ? ' has-error' : '' }}"">
                    <label for="harga" class="col-sm-2 control-label">Harga</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="text" name="harga" id="harga" value="{{ $rumah->harga }}">
                      @if ($errors->has('harga'))
                            <span class="help-block">
                                <strong>{{ $errors->first('harga') }}</strong>
                            </span>
                        @endif
                    </div>
                  </div> <!-- form-group -->              
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info"><i class="fa fa-upload"></i> Upload</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
    </div>
@endsection