<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="card mx-auto shadow-lg" style="max-width: 50rem;">
        <div class="card-body">
            <h1 class="mb-4"><?= esc($title) ?></h1>

            <?php if (isset($validation)): ?>
                <div class="alert alert-danger">
                    <?= $validation->listErrors() ?>
                </div>
            <?php endif; ?>

            <?= form_open('inventory/assignments/add') ?>

            <div class="form-group mb-3">
                <label for="item_id">Item:</label>
                <select name="item_id" id="item_id" class="form-control">
                    <option value="">Select Item</option>
                    <?php if (!empty($itemLists) && is_array($itemLists)): ?>
                        <?php foreach ($itemLists as $item): ?>
                            <option value="<?= esc($item['id']) ?>">
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
                <label for="user_id">Person to be In Charge:</label>
                <select name="user_id" id="user_id" class="form-control">
                    <option value="">Select User</option>
                    <?php if (!empty($userLists) && is_array($userLists)): ?>
                        <?php foreach ($userLists as $user): ?>
                            <option value="<?= esc($user->UserID) ?>">
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
                <label for="serial_number">Serial Number/Item Number:</label>
                <input type="text" class="form-control" id="serial_number" name="serial_number" value="<?= set_value('serial_number') ?>">
                <p class="text-danger"><?= validation_show_error('serial_number') ?></p>
            </div>

            <div class="form-group mb-3">
                <label for="photo">Photo URL:</label>
                <input type="text" class="form-control" id="photo" name="photo" value="<?= set_value('photo') ?>">
                <p class="text-danger"><?= validation_show_error('photo') ?></p>
            </div>

            <div class="form-group mb-3">
                <label for="status">Status:</label>
                <select name="status" id="status" class="form-control">
                    <?php foreach ($statusOptions as $value => $label): ?>
                        <option value="<?= esc($value) ?>">
                            <?= esc($label) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <p class="text-danger"><?= validation_show_error('status') ?></p>
            </div>

            <div class="form-group mb-3">
                <label for="assigned_at">Date Assigned:</label>
                <input type="date" class="form-control" id="assigned_at" name="assigned_at" value="<?= set_value('assigned_at') ?>">
                <p class="text-danger"><?= validation_show_error('assigned_at') ?></p>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i> Save
                </button>
                <a href="<?= site_url('inventory/items') ?>" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i> Back to List
                </a>
            </div>

            <?= form_close() ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
