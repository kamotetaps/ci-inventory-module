<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <div class="card shadow-lg">
        <div class="card-body">
            <!-- Header with Title and Add Button -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="card-title mb-0">People and Item Assignments</h4>
                <a class="btn btn-success btn-sm" href="<?= base_url() ?>inventory/assignments/add">
                    <i class="fas fa-plus"></i> Assign
                </a>
            </div>

            <!-- Table Responsive -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover shadow-sm" style="border-radius: 8px;">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>#</th>
                            <th>Item</th>
                            <th>Assigned To</th>
                            <th>Serial/Item Number</th>
                            <th>Date Assigned</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($items as $i => $item) : ?>    
                            <tr>
                                <td><?= ++$i ?></td>
                                <td><?= esc($item['item_name']) ?></td>
                                <td><?= esc($item['last_name']) ?>, <?= esc($item['first_name']) ?></td>
                                <td><?= esc($item['serial_number']) ?></td>
                                <td><?= esc($item['assigned_at']) ?></td>
                                <td>
                                    <?php
                                    $status = esc($item['status']);
                                    $badgeClass = '';

                                    switch ($status) {
                                        case 'assigned':
                                            $badgeClass = 'badge bg-primary'; // Blue
                                            break;
                                        case 'in_use':
                                            $badgeClass = 'badge bg-warning'; // Yellow
                                            break;
                                        case 'returned':
                                            $badgeClass = 'badge bg-success'; // Green
                                            break;
                                        case 'in_repair':
                                            $badgeClass = 'badge bg-danger'; // Red
                                            break;
                                        default:
                                            $badgeClass = 'badge bg-secondary'; // Grey for unknown statuses
                                    }
                                    ?>

                                    <span class="<?= $badgeClass ?>"><?= ucfirst($status) ?></span>
                                </td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="<?= base_url() ?>inventory/assignments/edit?id=<?= md5($item['id'].'edit') ?>">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="<?= base_url(); ?>inventory/assignments/delete?id=<?= md5($item['id']."delete"); ?>" method="POST" style="display:inline;" onsubmit="return confirmDelete();">
                                        <input type="hidden" name="id" value="<?= esc($item['id']); ?>">
                                        <button class="btn btn-danger btn-sm" type="submit">
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
