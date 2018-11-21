@extends('layouts.frontend')

@section('content')
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
                    <a href="{{ route('perumahan.show', $perumahan->id) }}" class="btn btn-info"><i class="fa fa-search"></i> Lihat</a>
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