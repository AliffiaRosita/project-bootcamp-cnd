@extends('includes.adminlte.template', ['content_title' => 'Categories'])

@section('title') Halaman Kategori Postingan @endsection

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Kategori Postingan</h3>

            <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="card-body">
            {{-- add button --}}
            <a href="{{ url('admin/user/create') }}" class="btn btn-sm btn-success mb-3" >
                <i class="fa fa-plus"></i> Tambah
            </a>

            {{-- tabel data --}}
            <table class="table table-striped table-bordered" id="datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th style="min-width: 90px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->pengguna->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <a href="{{ url('admin/user/'.$user->id.'/edit') }}"  class="btn btn-sm btn-primary">
                                <i class="fa fa-edit"></i>
                            </a>
                        <form action="{{url('admin/user/'.$user->id)}}" class="d-inline" method="post" id="form-delete">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
