<script>
    $(document).ready(function() {
        $('.btn-edit').on('click', function() {
            const id = $(this).data('id');
            const name = $(this).data('name');
            const achievement = $(this).data('achievement');
            const image = $(this).data('image');

            $('#capaianModalLabel').text('Edit Capaian');
            $('#form-achievement').attr('action', '<?= base_url('Agenda/update') ?>');
            $('#id_achievement').val(id);
            $('#name').val(name);
            $('#achievement').val(achievement);
            $('#old_image').val(image);

            // Tampilkan preview gambar lama
            const imageUrl = '<?= base_url('uploads/capaian/') ?>' + image;
            $('#preview-old-image').attr('src', imageUrl).show();
        });

        $('#capaianModal').on('hidden.bs.modal', function() {
            $('#form-capaian')[0].reset();
            $('#form-capaian').attr('action', '<?= base_url('capaian/save') ?>');
            $('#capaianModalLabel').text('Tambah Capaian');
            $('#id_achievement').val('');
            $('#old_image').val('');
            $('#preview-old-image').attr('src', '').hide();
        });
    });
</script>