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

            <?= form_open('inventory/transactions/add') ?>

            <div class="form-group mb-3">
                <label for="item_id">Item:</label>
                <select name="item_id" id="item_id" class="form-control">
                    <option value="">Select Item</option>
                    <?php if (!empty($itemLists) && is_array($itemLists)): ?>
                        <?php foreach ($itemLists as $item): ?>
                            <option value="<?= esc($item['id']) ?>"><?= esc($item['name']) ?></option>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <option value="">No items available</option>
                    <?php endif; ?>
                </select>
                <p class="text-danger"><?= validation_show_error('item_id') ?></p>
            </div>

            <div class="form-group mb-3">
                <label for="supplier_id">Supplier:</label>
                <select name="supplier_id" id="supplier_id" class="form-control">
                    <option value="">Select Supplier</option>
                    <?php if (!empty($suppliers) && is_array($suppliers)): ?>
                        <?php foreach ($suppliers as $supplier): ?>
                            <option value="<?= esc($supplier['id']) ?>">
                                <?= esc($supplier['name']) ?>
                            </option>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <option value="">No suppliers available</option>
                    <?php endif; ?>
                </select>
                <p class="text-danger"><?= validation_show_error('supplier_id') ?></p>
            </div>

            <div class="form-group mb-3">
                <label for="transaction_type">Transaction Type:</label>
                <select name="transaction_type" id="transaction_type" class="form-control">
                    <option value="">Select Transaction Type</option>
                    <?php foreach ($transaction_type as $type): ?>
                        <option value="<?= esc($type) ?>"><?= esc(ucwords($type)) ?></option>
                    <?php endforeach; ?>
                </select>
                <p class="text-danger"><?= validation_show_error('transaction_type') ?></p>
            </div>

            <div class="form-group mb-3">
                <label for="price">Price:</label>
                <input type="text" class="form-control" id="price" name="price" value="<?= set_value('price') ?>">
                <p class="text-danger"><?= validation_show_error('price') ?></p>
            </div>

            <div class="form-group mb-3">
                <label for="quantity">Quantity:</label>
                <input type="text" class="form-control" id="quantity" name="quantity" value="<?= set_value('quantity') ?>">
                <p class="text-danger"><?= validation_show_error('quantity') ?></p>
            </div>

            <div class="form-group mb-3">
                <label for="date">Date of Transaction:</label>
                <input type="date" class="form-control" id="date" name="date" value="<?= set_value('date') ?>">
                <p class="text-danger"><?= validation_show_error('date') ?></p>
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
