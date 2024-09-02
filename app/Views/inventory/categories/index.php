<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <div class="card shadow-lg">
        <div class="card-body">
            <!-- Header with Title and Add Button -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="card-title mb-0">List of Categories</h4>
                <a class="btn btn-success btn-sm" href="<?= base_url() ?>inventory/categories/add">
                    <i class="fas fa-plus"></i> Add Category
                </a>
            </div>

            <!-- Table Responsive -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover shadow-sm" style="border-radius: 8px; border: 2px solid #dee2e6;">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Date Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($categories as $i => $category) : ?>    
                            <tr>
                                <td><?= ++$i ?></td>
                                <td><?= esc($category['name']) ?></td>
                                <td><?= esc($category['description']) ?></td>
                                <td><?= esc($category['created_at']) ?></td>
                                <td>
                                    <a class="btn btn-sm btn-primary" href="<?= base_url() ?>inventory/categories/edit?id=<?= md5($category['id'].'edit') ?>">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a class="btn btn-sm btn-danger" href="<?= base_url() ?>inventory/categories/delete?id=<?= md5($category['id'].'delete') ?>" onclick="return confirmDelete();">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </a>
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
        return confirm('Are you sure you want to delete this category? This action cannot be undone.');
    }
</script>

<?= $this->endSection() ?>
