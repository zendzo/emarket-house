@extends('layouts.master')

@section('content')
    <div class="row">
      @foreach ($perumahans as $perumahan)
          <div class="col-md-4">
            <div class="box box-solid">
              <div class="box-header with-border">
                <i class="fa fa-home"></i>
  
                <h3 class="box-title">{{ $perumahan->name }} ({{ $perumahan->rumahs->count() }} unit)</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <p class="text-center">{{ $perumahan->address }}</p>
                  <p>{!! $perumahan->description !!}</p>
                  <a href="{{ route('admin.perumahan.show', $perumahan->id) }}" class="btn btn-info"><i class="fa fa-search"></i> Lihat</a>
                  <a href="{{ route('admin.perumahan.edit', $perumahan->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                  <a href="{{ route('admin.rumah.create') }}" class="btn btn-warning"><i class="fa fa-plus"></i> Tambah Unit</a>
              </div>
              <!-- /.box-body -->
            </div>
          </div>
      @endforeach
    </div>
    <div class="row">
        <div class="col-sm-12 text-center">
            {{ $perumahans->links() }}
        </div>
    </div>
@endsection