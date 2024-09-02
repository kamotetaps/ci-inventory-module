<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <div class="card shadow-lg">
        <div class="card-body">
            <!-- Header with Title and Add Button -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="card-title mb-0">List of Suppliers</h4>
                <a class="btn btn-success btn-sm" href="<?= base_url() ?>inventory/suppliers/add">
                    <i class="fas fa-plus"></i> Add Supplier
                </a>
            </div>

            <!-- Table Responsive -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover shadow-sm" style="border-radius: 8px; border: 2px solid #dee2e6;">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($suppliers as $i => $supplier) : ?>    
                            <tr>
                                <td><?= $i + 1 ?></td>
                                <td><?= esc($supplier['name']) ?></td>
                                <td><?= esc($supplier['contact']) ?></td>
                                <td><?= esc($supplier['phone']) ?></td>
                                <td><?= esc($supplier['email']) ?></td>
                                <td><?= esc($supplier['address']) ?></td>
                                <td>
                                    <a class="btn btn-sm btn-primary" href="<?= base_url() ?>inventory/suppliers/edit?id=<?= md5($supplier['id'].'edit')?>">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="<?= base_url(); ?>inventory/suppliers/delete?id=<?= md5($supplier['id'].'delete'); ?>" method="POST" onsubmit="return confirmDelete();" class="d-inline-block">
                                        <input type="hidden" name="id" value="<?= esc($supplier['id']); ?>">
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
        return confirm('Are you sure you want to delete this supplier? This action cannot be undone.');
    }
</script>
<?= $this->endSection() ?>
