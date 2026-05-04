<h2>Items</h2>

<!-- Search Form -->
<form method="get" action="/items" style="margin-bottom: 1rem;">
    <input
        type="text"
        name="keyword"
        value="<?= esc($keyword ?? '') ?>"
        placeholder="Search by name or description..."
        style="padding: 6px 10px; width: 280px;"
    >
    <button type="submit" style="padding: 6px 14px;">Search</button>
    <?php if (!empty($keyword)): ?>
        <a href="/items" style="margin-left: 8px;">Clear</a>
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

<a href="/items/create">Add Item</a>

<table border="1">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Description</th>
    <th>Actions</th>
</tr>

<?php foreach ($items as $item): ?>
<tr>
    <td><?= $item['id'] ?></td>
    <td><?= $item['name'] ?></td>
    <td><?= $item['description'] ?></td>
    <td>
        <a href="/items/edit/<?= $item['id'] ?>">Edit</a>
        <a href="/items/delete/<?= $item['id'] ?>">Delete</a>
    </td>
</tr>
<?php endforeach; ?>
</table>

<h2>Create Item</h2>

<form method="post" action="/items/store">
    <?= csrf_field() ?>
    <input type="text" name="name" placeholder="Name" required>
    <textarea name="description" placeholder="Description"></textarea>
    <button type="submit">Save</button>
</form>