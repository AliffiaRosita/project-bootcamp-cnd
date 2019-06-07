<script>
    $(function() {
        const targetUrl = '{{ url("admin/categories") }}';

        // initialize datatable
        $('#datatable').DataTable();

        // aksi saat form add di submit
        $("form").on('submit', function(e) {
            e.preventDefault();

            var form = $(this);
            var url = form.attr('action');

            $.ajax({
                type: "POST",
                url: url,
                data: new FormData($(this)[0]),
                dataType: 'JSON',
                contentType: false,
                processData: false,
                success: function(res) {
                    // sembunyikan modal
                    $('#modal-form').modal('hide');

                    // tampilkan pesan dari response message
                    swal("Sukses", res.message, "success");

                    // terapkan aksi berdasar tipe
                    if (res.type == 'add') {
                        addNewRow();
                    } else if (res.type == 'update') {
                        setRowData(res.id);
                    } else {
                        removeRow(res.id);
                    }
                },
                error: function(xhr) {
                    let errorText = '';
                    $.each(xhr.responseJSON.errors, function(key, value) {
                        errorText += value + ' / ';
                    });

                    swal("Gagal!", errorText, "warning");
                }
            });
        });

        // aksi saat button add di klik
        $('.add-data').on('click', function(e) {
            // ubah judulnya
            $('.modal-title').text('Tambah Data');

            // reset inputan
            $('#name').val('');
            $('#description').val('');
            $('#pict').val('');
            $('#picture').attr('src','https://via.placeholder.com/300x150');

            // set add url dan disable method put
            $('#form-add').attr('action', targetUrl);
            $('input[name="_method"]').prop('disabled', true);

            e.preventDefault();
        });

        // aksi saat button edit saat di klik
        $('.edit-data').on('click', function(e) {
            // tampilkan modal dan ubah judulnya
            e.preventDefault();
            $('#modal-form').modal('show');
            $('.modal-title').text('Ubah Data');

            var id = $(this).attr('data-id');
            var urlEdit = targetUrl+'/'+id+'/edit';

            $.ajax({
                type: "GET",
                url: urlEdit,
                dataType: 'JSON',
                success: function(res) {
                    // sembunyikan modal
                    $('#name').val(res.name);
                    $('#description').val(res.description);
                    $('#picture').attr('src','/images/categories/'+res.images);

                },
                error: function(xhr) {
                    let errorText = '';
                    $.each(xhr.responseJSON.errors, function(key, value) {
                        errorText += value + ' / ';
                    });

                    swal("Gagal!", errorText, "warning");
                }
            });


            // set update url
            $('#form-add').attr('action',
                targetUrl +'/'+ id
            );

            $('input[name="_method"]').prop('disabled', false);


        });

        // aksi saat button delete di klik
        $('.delete-data').on('click', function(e) {
            // set delete url
            $('#form-delete').attr('action',
                $(this).attr('href')
            );

            // confirm dialog
            swal({
                title: "Peringatan!",
                text: "Data yang sudah terhapus tidak bisa dikembalikan.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    // submit form delete
                    $('#form-delete').submit();
                }
            });

            e.preventDefault();
        });
    });

    function addNewRow() {
        // ambil baris tabel terakhir
        const $lastRow = $('table tbody tr:last');
        const $cloneRow = $lastRow.clone();
        const lastNo = $cloneRow.find('td').eq(0).text();

        // ubah data kolom baris yg di clone
        $cloneRow.find('td').eq(0).text(
            parseInt(lastNo) + 1
        );
        $cloneRow.find('td').eq(1).text(
            $('#name').val()
        );
        $cloneRow.find('td').eq(2).text(
            $('#description').val()
        );

        // tambahkan baris yg di clone setelah baris terakhir
        $lastRow.after( $cloneRow );
    }

    function setRowData(id) {
        const $findRow = $('table tbody tr[data-id="'+ id +'"]');

        // ubah data kolom baris yg di update
        $findRow.find('td').eq(1).text(
            $('#name').val()
        );
        $findRow.find('td').eq(2).text(
            $('#description').val()
        );
    }

    function removeRow(id) {
        const $findRow = $('table tbody tr[data-id="'+ id +'"]');
        $findRow.remove();
    }
</script>
