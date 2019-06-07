@extends('includes.adminlte.template', ['content_title' => 'Posts'])

@section('title') Halaman Post @endsection

@section('content')
    {{-- check validation errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <h3>Terjadi Kesalahan!</h3>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Postingan</h3>

            <div class="card-tools">
                <a href="{{ url('admin/posts') }}" class="btn btn-sm btn-secondary">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>
                <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ url('admin/posts') }}" method="post" enctype="multipart/form-data">
                @csrf

                {{-- image upload area --}}
                <div class="form-group">
                    <label for="cover">Foto Sampul</label>
                    <div>
                        <img src="https://via.placeholder.com/200x200" alt="preview image" class="img-thumbnail" id="preview-image">
                    </div>
                    <input type="file" class="form-control" name="cover" id="cover">
                </div>
                {{-- end area --}}

                <div class="form-group">
                    <label for="name">Nama Lengkap <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Nama Kategori..." required>
                </div>
                <div class="form-group">
                    <label for="status_draft">Jenis Kelamin</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="perempuan" {{ old('jenis_kelamin') == 'perempuan' ? 'checked' : '' }}>
                            <label class="form-check-label" for="perempuan">Perempuan</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="pria" value="pria" {{ old('jenis_kelamin') == 'pria' ? 'checked' : '' }}>
                            <label class="form-check-label" for="pria">Pria</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat </label>
                    <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat.."></textarea>
                </div>

                <div class="form-group">
                    <label for="status_draft">Role</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="role" id="pengguna" value="pengguna" {{ old('role') == 'pengguna' ? 'checked' : '' }}>
                            <label class="form-check-label" for="pengguna">Pengguna</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="role" id="admin" value="admin" {{ old('role') == 'admin' ? 'checked' : '' }}>
                            <label class="form-check-label" for="admin">Admin</label>
                        </div>
                    </div>
                </div>
                <button type="reset" class="btn btn-danger">
                    <i class="fa fa-times"></i> Reset
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-send"></i> Simpan
                </button>
            </form>
        </div>
    </div>

@endsection

@push('js')
    {{-- select2 js --}}
    <script src="{{ asset('plugins/select2/select2.min.js') }}"></script>

    {{-- summernote js --}}
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>

    <script>
        $(function() {
            // initialize summernote
            $('#content').summernote({
                placeholder: 'Tuliskan isi konten disini...',
                height: 200
            });

            // initialize select2
            $('#categories, #users').select2({
                placeholder: 'Pilih:'
            });

            $('#cover').on('change', function() {
                readURL(this);
            });
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#preview-image').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush






