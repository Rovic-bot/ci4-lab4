<div class="container mt-4">
    <h2 class="mb-3">Items</h2>

    <!-- Search Form -->
    <form method="get" action="/items" class="d-flex gap-2 mb-3">
        <input type="text" name="keyword" value="<?= esc($keyword ?? '') ?>" placeholder="Search by name or description..." class="form-control w-25">
        <button type="submit" class="btn btn-primary">Search</button>
        <?php if (!empty($keyword)): ?>
            <a href="/items" class="btn btn-secondary">Clear</a>
        <?php endif; ?>
    </form>

    <?php if (!empty($keyword)): ?>
        <p>
            <?php if (count($items) > 0): ?>
                Found <strong><?= count($items) ?></strong> result(s) for "<strong><?= esc($keyword) ?></strong>"
            <?php else: ?>
                No results found for "<strong><?= esc($keyword) ?></strong>"
            <?php endif; ?>
        </p>
    <?php endif; ?>

    <a href="/items/create" class="btn btn-success mb-3">Add Item</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item): ?>
            <tr>
                <td><?= $item['id'] ?></td>
                <td><?= $item['name'] ?></td>
                <td><?= $item['description'] ?></td>
                <td>
                    <a href="/items/edit/<?= $item['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="/items/delete/<?= $item['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="mt-3">
        <?= $pager->links() ?>
    </div>
</div>