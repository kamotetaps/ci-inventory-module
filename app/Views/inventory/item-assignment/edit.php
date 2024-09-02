<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="card mx-auto shadow-lg" style="max-width: 50rem;">
        <div class="card-body">
            <h1 class="mb-4">Edit Assigned To</h1>

            <?php if (isset($validation)): ?>
                <div class="alert alert-danger">
                    <?= $validation->listErrors() ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url(); ?>inventory/assignments/edit?id=<?= md5($category['id']."edit"); ?>" method="POST">
                <input type="hidden" name="id" value="<?= esc($category['id']); ?>">
                
                <div class="form-group mb-3">
                    <label for="item_id">Item:</label>
                    <select name="item_id" id="item_id" class="form-control">
                        <option value="">Select Item</option>
                        <?php if (!empty($itemLists) && is_array($itemLists)): ?>
                            <?php foreach ($itemLists as $item): ?>
                                <option value="<?= esc($item['id']) ?>" <?= $item['id'] == $category['item_id'] ? 'selected' : '' ?>>
                                    <?= esc($item['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option value="">No items available</option>
                        <?php endif; ?>
                    </select>
                    <p class="text-danger"><?= validation_show_error('item_id') ?></p>
                </div>

                <div class="form-group mb-3">
                    <label for="user_id">User:</label>
                    <select name="user_id" id="user_id" class="form-control">
                        <option value="">Select User</option>
                        <?php if (!empty($userLists) && is_array($userLists)): ?>
                            <?php foreach ($userLists as $user): ?>
                                <option value="<?= esc($user->UserID) ?>" <?= $user->UserID == $category['user_id'] ? 'selected' : '' ?>>
                                    <?= esc($user->LastName . ', ' . $user->FirstName) ?>
                                </option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option value="">No users available</option>
                        <?php endif; ?>
                    </select>
                    <p class="text-danger"><?= validation_show_error('user_id') ?></p>
                </div>

                <div class="form-group mb-3">
                    <label for="serial_number">Serial Number:</label>
                    <input type="text" class="form-control" id="serial_number" name="serial_number" value="<?= set_value('serial_number', $category['serial_number']) ?>">
                    <p class="text-danger"><?= validation_show_error('serial_number') ?></p>
                </div>

                <div class="form-group mb-3">
                    <label for="photo">Photo URL:</label>
                    <input type="text" class="form-control" id="photo" name="photo" value="<?= set_value('photo', $category['photo']) ?>">
                    <p class="text-danger"><?= validation_show_error('photo') ?></p>
                </div>

                <div class="form-group mb-3">
                    <label for="assigned_at">Date Assigned:</label>
                    <input type="date" class="form-control" id="assigned_at" name="assigned_at" value="<?= set_value('assigned_at', $category['assigned_at']) ?>">
                    <p class="text-danger"><?= validation_show_error('assigned_at') ?></p>
                </div>

                <div class="form-group mb-3">
                    <label for="status">Status:</label>
                    <select name="status" id="status" class="form-control">
                        <?php foreach ($statusOptions as $value => $label): ?>
                            <option value="<?= esc($value) ?>" <?= $value == $category['status'] ? 'selected' : '' ?>>
                                <?= esc($label) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <p class="text-danger"><?= validation_show_error('status') ?></p>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button class="btn btn-primary d-flex align-items-center" type="submit">
                        <i class="fas fa-save me-2"></i> Save Changes
                    </button>
                    <a class="btn btn-secondary d-flex align-items-center" href="<?= base_url() ?>inventory/assignments">
                        <i class="fas fa-times me-2"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
