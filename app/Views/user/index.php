<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="card shadow-lg">
        <div class="card-body">
            <!-- Header with Title and Add Button -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="card-title mb-0">List of Users</h4>
                <a class="btn btn-success btn-sm" href="<?= base_url() ?>user/add">
                    <i class="fas fa-plus"></i> Add User
                </a>
            </div>

            <!-- Table Responsive -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover w-100" style="border-radius: 8px; border: 2px solid #dee2e6;">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>#</th>
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Username</th>
                            <th>Date Registered</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($UserData as $i => $user) : ?>    
                            <tr>
                                <td><?= ++$i ?></td>
                                <td><?= esc(ucwords(strtolower($user->LastName))) ?></td>
                                <td><?= esc(ucwords(strtolower($user->FirstName))) ?></td>
                                <td><?= esc(ucwords(strtolower($user->MiddleName))) ?></td>
                                <td><?= esc($user->Username) ?></td>
                                <td><?= esc($user->EntryDate) ?></td>
                                <td>
                                    <a class="btn btn-sm btn-primary" href="<?= base_url() ?>user/edit?id=<?= md5($user->UserID.'edit')?>">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a class="btn btn-sm btn-danger" href="<?= base_url(); ?>user/delete?id=<?= md5($user->UserID.'delete'); ?>">
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

<?= $this->endSection() ?>
