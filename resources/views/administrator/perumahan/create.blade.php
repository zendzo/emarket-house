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
              <h3 class="box-title">Upload Data Perumahann</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ route('admin.perumahan.store') }}" method="POST">
              @csrf
              @method('POST')
              <div class="box-body">
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}"">
                  <label for="name" class="col-sm-2 control-label">Nama Perum.</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Judul Lowongan Pekerjaan">
                    @if ($errors->has('name'))
                          <span class="help-block">
                              <strong>{{ $errors->first('name') }}</strong>
                          </span>
                      @endif
                  </div>
                </div> <!-- form-group -->
                  <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}"">
                    <label for="address" class="col-sm-2 control-label">Alamat Perum.</label>
                    <div class="col-sm-10">
                      <textarea name="address" placeholder="Alamat Perumahan" style="width: 100%; height: 50px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('address') }}</textarea>
                      @if ($errors->has('address'))
                            <span class="help-block">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                        @endif
                    </div>
                  </div> <!-- form-group -->
                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}"">
                  <label for="description" class="col-sm-2 control-label">Deskripsi</label>
                  <div class="col-sm-10">
                    <textarea name="description" class="textarea" placeholder="Deskripsi Perumahan" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('description') }}</textarea>
                    @if ($errors->has('description'))
                          <span class="help-block">
                              <strong>{{ $errors->first('description') }}</strong>
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