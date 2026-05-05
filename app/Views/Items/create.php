<div class="container mt-4">
    <h2>Create Item</h2>
    <form method="post" action="<?= base_url('items/store') ?>">
        <?= csrf_field() ?>
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="<?= base_url('items') ?>" class="btn btn-secondary">Cancel</a>
    </form>
</div>