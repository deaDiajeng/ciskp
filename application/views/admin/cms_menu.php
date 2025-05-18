<div class="container mt-5">
    <h2>CMS Menu Settings</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Menu</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($menu_settings as $menu): ?>
            <tr>
                <td><?= ucfirst($menu['menu_name']); ?></td>
                <td><?= $menu['is_active'] ? 'Aktif' : 'Nonaktif'; ?></td>
                <td>
                    <form action="<?= base_url('CMSMenu/toggle') ?>" method="post">
                        <input type="hidden" name="menu" value="<?= $menu['menu_name']; ?>">
                        <input type="hidden" name="status" value="<?= $menu['is_active'] ? 0 : 1; ?>">
                        <button type="submit" class="btn btn-<?= $menu['is_active'] ? 'danger' : 'success' ?>">
                            <?= $menu['is_active'] ? 'Nonaktifkan' : 'Aktifkan'; ?>
                        </button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
