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
                    <th>Verifikasi</th>
                    <th>Bayar</th>
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
                        <td>{{ $angsuran->tanggal_tempo->format('d-m-Y') }}</td>
                        <td>{{ $angsuran->total }}</td>
                        <td>
                          @if ($angsuran->verified)
                              <span class="badge bg-green"><i class="fa fa-check"></i> sudah verifikasi</span>
                          @else
                          <span class="badge bg-red"><i class="fa fa-ban"></i> belum verifikasi</span>
                          @endif
                        </td>
                        <td>
                          @if ($angsuran->paid)
                              <span class="badge bg-green"><i class="fa fa-check"></i> sudah bayar</span>
                          @else
                          <span class="badge bg-red"><i class="fa fa-ban"></i> belum bayar</span>
                          @endif
                        </td>
                        <td>
                            <a href="{{ $angsuran->getFirstMediaUrl('angsuran') }}" class="btn btn-primary btn-xs"><i class="fa fa-search"></i></a>
                            @if (auth()->user()->role_id === 1)
                            @if ($angsuran->paid)
                            <form action="{{ route('admin.paid.angsuran', $angsuran->id) }}" method="POST" style="display: inline;">
                              @csrf
                              @method('POST')
                              <input type="hidden" name="angsuran_id" value="{{ $angsuran->id }}">
                              <button class="btn btn-primary btn-xs {{ $angsuran->verified ? 'disabled':''}}" type="submit"><i class="fa fa-check"></i></button>
                            </form>
                            @endif
                              @if (!$angsuran->paid)
                                <a href="{{ route('admin.send.to', $angsuran->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-envelope"></i></a>
                              @endif
                            @endif
                        </td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="box-footer clearfix">
              {{ $angsurans->links() }}
              <a href="{{ route('admin.send.all') }}" class="btn btn-primary"><i class="fa fa-envelope"></i> Kirim Semua Taggihan</a>
            </div>
          </div>
    </div>
    </div>
@endsection