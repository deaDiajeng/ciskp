<script>
    $(document).ready(function() {
        $('.btn-edit').on('click', function() {
            const id = $(this).data('id');
            const title = $(this).data('title');
            const keterangan = $(this).data('keterangan');
            const date = $(this).data('date');
            const image = $(this).data('image');

            $('#agendaModalLabel').text('Edit Agenda');
            $('#form-agenda').attr('action', '<?= base_url('Agenda/update') ?>');
            $('#id_agenda').val(id);
            $('#title').val(title);
            $('#keterangan').val(keterangan);
            $('#date').val(date);
            $('#old_image').val(image);

            // Tampilkan preview gambar lama
            const imageUrl = '<?= base_url('uploads/agenda/') ?>' + image;
            $('#preview-old-image').attr('src', imageUrl).show();
        });

        $('#agendaModal').on('hidden.bs.modal', function() {
            $('#form-agenda')[0].reset();
            $('#form-agenda').attr('action', '<?= base_url('Agenda/save') ?>');
            $('#agendaModalLabel').text('Tambah Agenda');
            $('#id_agenda').val('');
            $('#old_image').val('');
            $('#preview-old-image').attr('src', '').hide();
        });
    });
</script>