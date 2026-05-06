<div class="container mt-4">
    <h2>Edit Item</h2>
    <form method="post" action="<?= base_url('items/update/' . $item['id']) ?>">
        <?= csrf_field() ?>
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="<?= esc($item['name']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control"><?= esc($item['description']) ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="<?= base_url('items') ?>" class="btn btn-secondary">Cancel</a>
    </form>
</div>