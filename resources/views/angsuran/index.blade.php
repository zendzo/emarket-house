@extends('layouts.master')

@section('content')
    <div class="row">
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
                    <th>Property</th>
                    <th>Pemesan</th>
                    <th>Kode</th>
                    <th>Tanggal Pemb.</th>
                    <th>Tanggal. Temp</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>#</th>
                  </tr>
                  @foreach ($angsurans as $angsuran)
                      <tr>
                        <td>{{ $angsuran->id }}</td>
                        <td>
                          <a href="{{ route('admin.rumah.show', $angsuran->rumah->id) }}">{{ $angsuran->rumah->perumahan->name." Blok ".$angsuran->rumah->block."/".$angsuran->rumah->number }}</a>
                        </td>
                        <td>{{ $angsuran->rumah->bookedBy ? $angsuran->rumah->bookedBy->username : '' }}</td>
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
                            <a href="{{ $angsuran->getFirstMediaUrl('angsuran') }}" class="btn btn-primary btn-xs"><i class="fa fa-search"></i></a>
                            <form action="{{ route('angsuran.update', $angsuran->id) }}" method="POST" style="display: inline;">
                              @csrf
                              @method('PATCH')
                              <input type="hidden" name="angsuran_id" value="{{ $angsuran->id }}">
                              <button class="btn btn-primary btn-xs {{ $angsuran->verified ? 'disabled':''}}" type="submit"><i class="fa fa-check"></i></button>
                            </form>
                        </td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="box-footer clearfix">
              {{ $angsurans->links() }}
            </div>
          </div>
    </div>
    </div>
@endsection