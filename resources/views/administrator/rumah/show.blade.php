@extends('layouts.master')

@section('css')
<link rel="stylesheet" href="{{ asset('AdminLTE/plugins/datepicker/datepicker3.css') }}"/>
@endsection

@section('script')
<script src="{{ asset('AdminLTE/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<script>
  $('#tanggal_bayar').datepicker({
    format: 'd-m-yyyy'
  });
</script>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-home"></i>

          <h3 class="box-title">{{ $rumah->perumahan->name }} (Blok : {{ $rumah->block}}/Nomor : {{ $rumah->number }})</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <p><b>{{ $rumah->perumahan->address }}</b></p>
            <a href="#" class="btn btn-large btn-info"><i class="fa fa-user"></i> {{ $rumah->bookedBy ? $rumah->bookedBy->username : "Belum Ada Pembeli" }}</a>
            <p>{!! $rumah->perumahan->description !!}</p>
        </div>
        <div class="box-footer clearfix">
            <a href="{{ route('admin.rumah.edit', $rumah->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
            {{-- upload angsuran --}}
            <a href="#"  data-toggle="modal" data-target="#angsuranModal" class="btn btn-primary"><i class="fa fa-money"></i> Upload Angsuran</a>
            @include('angsuran.create_modal')
            {{-- upload document --}}
            <a href="#" data-toggle="modal" data-target="#documentModal" class="btn btn-primary"><i class="fa fa-files-o"></i> Upload Dokumen</a>
            @include('document.create_modal')
            {{-- upload photo --}}
            <a href="#" data-toggle="modal" data-target="#photoModal" class="btn btn-danger"><i class="fa fa-camera-retro"></i> Upload Photo</a>
            @include('photo.create_modal')
        </div>
        <!-- /.box-body -->
      </div>
    </div>
    <div class="col-md-6">
        <div class="box box-solid">
          <div class="box-header with-border">
            <h3 class="box-title">Carousel</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class=""></li>
                <li data-target="#carousel-example-generic" data-slide-to="1" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
              </ol>
              <div class="carousel-inner">
                <div class="item active left">
                  <img class="img-responsive" src="http://placehold.it/900x500/39CCCC/ffffff&amp;text=I+Love+Bootstrap" alt="First slide">

                  <div class="carousel-caption">
                    First Slide
                  </div>
                </div>
                <div class="item next left">
                  <img class="img-responsive" src="http://placehold.it/900x500/3c8dbc/ffffff&amp;text=I+Love+Bootstrap" alt="Second slide">

                  <div class="carousel-caption">
                    Second Slide
                  </div>
                </div>
                <div class="item">
                  <img class="img-responsive" src="http://placehold.it/900x500/f39c12/ffffff&amp;text=I+Love+Bootstrap" alt="Third slide">

                  <div class="carousel-caption">
                    Third Slide
                  </div>
                </div>
              </div>
              <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                <span class="fa fa-angle-left"></span>
              </a>
              <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                <span class="fa fa-angle-right"></span>
              </a>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <div class="col-md-6">
          <div class="box box-success">
              <div class="box-header">
                <h3 class="box-title">Dokumen Pelengkap</h3>
              </div>
              <div class="box-body">
                <table class="table table-bordered">
                  <tbody>
                    <tr>
                      <th>Jenis</th>
                      <th>Satus</th>
                      <th>#</th>
                    </tr>
                      @foreach ($rumah->documents as $document)
                        <tr>
                          <td>{{ $document->type->name }}</td>
                          <td>
                            @if ($document->approved)
                              <span class="badge bg-green">diverifikasi</span>
                            @else
                            <span class="badge bg-red">belum diverifikasi</span>
                            @endif
                          </td>
                          <td>
                            <a href="{{ $document->getFirstMediaUrl('document') }}" class="btn btn-primary btn-xs"><i class="fa fa-search"></i></a>
                            <a href="{{ $document->getFirstMediaUrl('document') }}" class="btn btn-primary btn-xs"><i class="fa  fa-check"></i></a>
                          </td>
                        </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>
            </div>
      </div>
      <div class="col-md-12">
          <div class="box box-success">
              <div class="box-header">
                <h3 class="box-title">Dokumen Angsuran</h3>
              </div>
              <div class="box-body">
                <table class="table table-bordered">
                  <tbody>
                    <tr>
                      <th>No</th>
                      <th>Kode</th>
                      <th>Tanggal Pemb.</th>
                      <th>Tanggal. Temp</th>
                      <th>Total</th>
                      <th>Status</th>
                      <th>#</th>
                    </tr>
                    @foreach ($rumah->angsurans as $key => $angsuran)
                        <tr>
                          <td>{{ $key += 1 }}</td>
                          <td>{{ $angsuran->kode }}</td>
                          <td>{{ $angsuran->tanggal_bayar }}</td>
                          <td>{{ $angsuran->tanggal_tempo }}</td>
                          <td>{{ $angsuran->total }}</td>
                          <td>
                            @if ($angsuran->verified)
                                <span class="badge bg-green"><i class="fa fa-check"></i> sudah verifikasi</span>
                            @else
                            <span class="badge bg-red"><i class="fa fa-ban"></i> belum verifikasi</span>
                            @endif
                          </td>
                          <td>
                              <a href="{{ $angsuran->getFirstMediaUrl('angsuran') }}" class="btn btn-primary btn-xs"><i class="fa fa-search"></i></a>
                              <a href="{{ $angsuran->getFirstMediaUrl('angsuran') }}" class="btn btn-primary btn-xs"><i class="fa  fa-check"></i></a>
                          </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
      </div>
</div>
@endsection