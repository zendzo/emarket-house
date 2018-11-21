@extends('layouts.frontend')

@section('content')
    <div class="row">
      <div class="col-md-12">
        <div class="box box-solid">
          <div class="box-header with-border">
            <i class="fa fa-home"></i>

            <h3 class="box-title">{{ $perumahan->name }}</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
              <p class="text-center">{{ $perumahan->address }}</p>
              <p>{!! $perumahan->description !!}</p>
          </div>
          <div class="box-footer clearfix">
              
          </div>
          <!-- /.box-body -->
        </div>
      </div>
      <div class="col-md-12">
        @foreach ($perumahan->rumahs as $rumah)
        <div class="col-md-6">
          <div class="box box-solid">
            <div class="box-header with-border">
              <i class="fa fa-home"></i>
  
              <h3 class="box-title">(Blok.{{ $rumah->block }} No.{{ $rumah->number }})</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <p class="text-center">{{ $perumahan->address }}</p>
                <table class="table table-bordered">
                  <tbody>
                    <tr>
                      <th>Type</th>
                      <th>Subsidi</th>
                      <th>Harga</th>
                      <th>Pemesan</th>
                      <th>Dokumen</th>
                    </tr>
                    <tr>
                      <td>{{$rumah->rumahType->type}}</td>
                      <td>{{$rumah->subsidi}}</td>
                      <td>{{$rumah->harga}}</td>
                      <td><span class="badge bg-light-blue">{{$rumah->bookedBy ? $rumah->bookedBy->username : 'Kosong' }}</span></td>
                      <td>
                        @if ($rumah->document_approved)
                        <span class="badge bg-green">disetujui</span>
                        @else
                        <span class="badge bg-red">belum disetujui</span>
                        @endif
                      </td>
                    </tr>
                  </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                <a href="{{ route('rumah.show', $rumah->id) }}" class="btn btn-info"><i class="fa fa-search"></i> Lihat</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
@endsection