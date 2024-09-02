<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <div class="card shadow-lg">
        <div class="card-body">
            <!-- Header with Title and Add Button -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="card-title mb-0">List of Items</h4>
                <a class="btn btn-success btn-sm" href="<?= base_url() ?>inventory/items/add">
                    <i class="fas fa-plus"></i> Add Item
                </a>
            </div>

            <!-- Table Responsive -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover shadow-sm" style="border-radius: 8px; border: 2px solid #dee2e6;">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>#</th>
                            <th>Category</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($items as $i => $item) : ?>    
                            <tr>
                                <td><?= ++$i ?></td>
                                <td><?= esc($item['category_name']) ?></td>
                                <td><?= esc($item['name']) ?></td>
                                <td><?= esc($item['description']) ?></td>
                                <td><?= esc($item['quantity']) ?></td>
                                <td><?= esc($item['price']) ?></td>
                                <td>
                                    <a class="btn btn-sm btn-primary" href="<?= base_url() ?>inventory/items/edit?id=<?= md5($item['id'].'edit') ?>">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="<?= base_url(); ?>inventory/items/delete?id=<?= md5($item['id']."delete"); ?>" method="POST" onsubmit="return confirmDelete();" style="display:inline;">
                                        <input type="hidden" name="id" value="<?= esc($item['id']); ?>">
                                        <button class="btn btn-sm btn-danger" type="submit">
                                            <i class="fas fa-trash-alt"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>  
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmDelete() {
        return confirm('Are you sure you want to delete this item? This action cannot be undone.');
    }
</script>
<?= $this->endSection() ?>
