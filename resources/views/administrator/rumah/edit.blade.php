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
            <form class="form-horizontal" action="{{ route('admin.rumah.store') }}" method="POST">
              @csrf
              @method('POST')
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
                <div class="form-group{{ $errors->has('total_unit') ? ' has-error' : '' }}"">
                    <label for="total_unit" class="col-sm-2 control-label">Jumlah Unit</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="text" name="total_unit" id="total_unit">
                      @if ($errors->has('total_unit'))
                            <span class="help-block">
                                <strong>{{ $errors->first('total_unit') }}</strong>
                            </span>
                        @endif
                    </div>
                  </div> <!-- form-group -->
                  <div class="form-group{{ $errors->has('block') ? ' has-error' : '' }}"">
                      <label for="block" class="col-sm-2 control-label">Blok</label>
                      <div class="col-sm-10">
                        <input class="form-control" type="text" name="block" id="block">
                        @if ($errors->has('block'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('block') }}</strong>
                              </span>
                          @endif
                      </div>
                    </div> <!-- form-group -->
                    <div class="form-group{{ $errors->has('subsidi') ? ' has-error' : '' }}"">
                        <label for="subsidi" class="col-sm-2 control-label">Jumlah Unit</label>
                        <div class="col-sm-10">
                          <select name="subsidi" id="subsidi" class="form-control">
                            <option value="subsidi">Rumah Subsidi</option>
                            <option value="tidak">Rumah Tidak Subsidi</option>
                          </select>
                          @if ($errors->has('subsidi'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('subsidi') }}</strong>
                                </span>
                            @endif
                        </div>
                      </div> <!-- form-group -->
                  <div class="form-group{{ $errors->has('unit_start') ? ' has-error' : '' }}"">
                    <label for="unit_start" class="col-sm-2 control-label">No. Pertama</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="text" name="unit_start" id="unit_start">
                      @if ($errors->has('unit_start'))
                            <span class="help-block">
                                <strong>{{ $errors->first('unit_start') }}</strong>
                            </span>
                        @endif
                    </div>
                  </div> <!-- form-group -->
                  <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}"">
                    <label for="price" class="col-sm-2 control-label">Harga</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="text" name="price" id="price">
                      @if ($errors->has('price'))
                            <span class="help-block">
                                <strong>{{ $errors->first('price') }}</strong>
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