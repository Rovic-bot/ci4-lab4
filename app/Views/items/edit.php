<h2>Edit Item</h2>

<form method="post" action="/items/update/<?= $item['id'] ?>">
    <?= csrf_field() ?>
    <input type="text" name="name" value="<?= esc($item['name']) ?>" placeholder="Name" required>
    <textarea name="description" placeholder="Description"><?= esc($item['description']) ?></textarea>
    <button type="submit">Update</button>
</form>

<a href="/items">Back to list</a>
