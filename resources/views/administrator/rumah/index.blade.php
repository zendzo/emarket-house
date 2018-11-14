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
              <th>Perumahan</th>
              <th>Type</th>
              <th>Blok</th>
              <th>Nomor</th>
              <th>Subidi</th>
              <th>Harga</th>
              <th>Pemesan</th>
              <th>Dokumen Pemesan</th>
              <th>Aksi</th>
            </tr>
        @foreach ($rumahs as $rumah)
            <tr>
              <td><a href="{{ route('admin.perumahan.show', $rumah->perumahan->id) }}">{{ $rumah->perumahan->name }}</a></td>
              <td>{{ $rumah->rumahType->type }}</td>
              <td>{{ $rumah->block }}</td>
              <td>{{ $rumah->number }}</td>
              <td>
                @if ($rumah->subsidi === 'subsidi')
                <span class="badge bg-green">{{ $rumah->subsidi }}</span>
                @endif
              </td>
              <td>{{ $rumah->harga }}</td>
              <td>
                @if ($rumah->bookedBy)
                <a href="{{ route('admin.user.show', $rumah->bookedBy->id) }}">
                  {{ $rumah->bookedBy->username }}
                </a>
                @else
                <span class="badge bg-red">Kosong</span>
                @endif
              </td>
              <td>
                @if ($rumah->approved_document)
                <span class="badge bg-green">disetujui</span>
                @else
                <span class="badge bg-yellow">belum disetujui</span>
                @endif
              </td>
              <td>
                <a href="{{ route('admin.rumah.show', $rumah->id) }}" class="btn btn-xs btn-primary"><i class="fa fa-search"></i> Detail</a>
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