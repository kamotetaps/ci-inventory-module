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

            <?= form_open('inventory/item-locations/add') ?>

            <div class="form-group mb-3">
                <label for="item_id">Item to be Assigned:</label>
                <select name="item_id" id="item_id" class="form-control">
                    <option value="">Select Item</option>
                    <?php if (!empty($itemLists) && is_array($itemLists)): ?>
                        <?php foreach ($itemLists as $itemList): ?>
                            <option value="<?= esc($itemList['id']) ?>"><?= esc($itemList['name']) ?></option>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <option value="">No items available</option>
                    <?php endif; ?>
                </select>
                <p class="text-danger"><?= validation_show_error('item_id') ?></p>
            </div>

            <div class="form-group mb-3">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" name="location" value="<?= set_value('location') ?>">
                <p class="text-danger"><?= validation_show_error('location') ?></p>
            </div>

            <div class="form-group mb-3">
                <label for="quantity">Quantity</label>
                <input type="text" class="form-control" id="quantity" name="quantity" value="<?= set_value('quantity') ?>">
                <p class="text-danger"><?= validation_show_error('quantity') ?></p>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <button type="submit" class="btn btn-primary d-flex align-items-center">
                    <i class="fas fa-plus me-2"></i> Save
                </button>

                <a href="<?= site_url('inventory/items') ?>" class="btn btn-secondary d-flex align-items-center">
                    <i class="fas fa-arrow-left me-2"></i> Back to List
                </a>
            </div>

            <?= form_close() ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
