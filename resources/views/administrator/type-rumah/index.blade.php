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
            <th>Action</th>
          </tr>
      @foreach ($rumahType as $type)
          <tr>
            <td style="width: 10px;">{{ $type->id }}</td>
            <td>{{ $type->type }}</td>
            <td width="20%">
                <a class="btn btn-xs btn-info" href="{{ route('admin.type-rumah.show',$type->id) }}">
                   <span class="fa fa-info fa-fw"></span>
                </a>
                <a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#roleModalEdit-{{ $type->id }}" href="#">
                   <span class="fa fa-pencil fa-fw"></span>
                </a>
                <!-- Modal Form Edit-->
                <div class="modal fade" id="roleModalEdit-{{ $type->id }}" tabindex="-1" role="dialog" aria-labelledby="roleModalEdit-{{ $type->id }}">
                   @include('administrator.type-rumah.edit_modal')
                </div>
                   <form method="POST" action="{{ route('admin.role.destroy',$type->id) }}" accept-charset="UTF-8" style="display:inline">
                   {{ method_field('DELETE') }}
                   {{ csrf_field() }}
                   <button type="submit" class="btn btn-xs btn-danger">
                      <span class="fa fa-close fa-fw"></span>
                   </button>
                </form>
             </td>
          </tr>
      @endforeach
    </tbody>
    </table>
    </div>
     <div class="box-footer clearfix">
        <a class="btn btn-success" data-toggle="modal" data-target="#roleModal" href="#"><span class="fa fa-plus fa-fw"></span>&nbsp;@lang('application.add new record')</a>   
      </div>

      <!-- Modal Form -->
      <div class="modal fade" id="roleModal" tabindex="-1" role="dialog" aria-labelledby="roleModal">
         @include('administrator.type-rumah.create_modal')
      </div>
  </div>
@endsection