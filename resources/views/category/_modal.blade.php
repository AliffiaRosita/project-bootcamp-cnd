<div class="modal fade" tabindex="-1" role="dialog" id="modal-form">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="{{ url('admin/categories') }}" enctype="multipart/form-data" method="post" id="form-add">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Nama Kategori <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Nama Kategori..." required>
                </div>
                <div class="form-group">
                    <label for="description">Deksripsi <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="description" id="description" placeholder="Deskripsi Kategori..."></textarea>
                </div>
                <div class="form-group">
                    <label for="pict">Foto Cover <span class="text-danger">*</span></label>
                    <br>
                    <img src="https://via.placeholder.com/300x150" height="150px" width="300px" id="picture" class="img-thumbnail" alt="preview image">
                    <input type="file" name="cover_image" id="pict" class="form-control mt-1" placeholder="Choose Picture..">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">
                    Simpan Data
                </button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Batal
                </button>
            </div>
        </form>
      </div>
    </div>
</div>

@push('js')
<script>
    $(function(){
        $('#pict').on('change', function() {
                readURL(this);
            });

        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#picture').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
});
</script>
@endpush
