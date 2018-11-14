@extends('layouts.master')

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Data Rumah</h3>
    </div>
    <div class="box-body">
      <table class="table table-bordered">
        <tbody>
          <tr>
            <th>#</th>
            <th>Type</th>
          </tr>
      @foreach ($rumahType as $type)
          <tr>
            <td style="width: 10px;">{{ $type->id }}</td>
            <td>{{ $type->type }}</td>
            <td>
              <a href="{{ route('admin.rumah.show', $type->id) }}" class="btn btn-xs btn-primary"><i class="fa fa-search"></i> Detail</a>
            </td>
          </tr>
      @endforeach
    </tbody>
    </table>
    </div>
    <div class="box-footer clearfix">
      <a href="{{ route('admin.rumah.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
    </div>
  </div>
@endsection