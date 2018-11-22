@extends('layouts.master')

@section('content')
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Dokumen Pelengkap</h3>
            </div>
            <div class="box-body">
              <table class="table table-bordered">
                <tbody>
                  <tr>
                    <th>Id</th>
                    <th>Property</th>
                    <th>Pemesan</th>
                    <th>Jenis</th>
                    <th>Satus</th>
                    <th>#</th>
                  </tr>
                    @foreach ($documents as $document)
                      <tr>
                        <td>{{ $document->id }}</td>
                        <td>
                            <a href="{{ route('admin.rumah.show', $document->rumah->id) }}">{{ $document->rumah->perumahan->name." Blok ".$document->rumah->block."/".$document->rumah->number }}</a>
                          </td>
                          <td>{{ $document->rumah->bookedBy ? $document->rumah->bookedBy->username : '' }}</td>
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
                          <form action="{{ route('document.update', $document->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="angsuran_id" value="{{ $document->id }}">
                            <button class="btn btn-primary btn-xs {{ $document->approved ? 'disabled':''}}" type="submit"><i class="fa fa-check"></i></button>
                          </form>
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