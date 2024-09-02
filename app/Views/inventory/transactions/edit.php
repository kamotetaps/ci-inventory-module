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

            <form action="<?= site_url('inventory/transactions/edit') ?>?id=<?= md5($category['id'] . "edit"); ?>" method="POST">
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
                    <label for="supplier_id">Supplier:</label>
                    <select name="supplier_id" id="supplier_id" class="form-control">
                        <option value="">Select Supplier</option>
                        <?php if (!empty($suppliers) && is_array($suppliers)): ?>
                            <?php foreach ($suppliers as $supplier): ?>
                                <option value="<?= esc($supplier['id']) ?>" <?= $supplier['id'] == $category['supplier_id'] ? 'selected' : '' ?>>
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
                            <option value="<?= esc($type) ?>" <?= $type == $category['transaction_type'] ? 'selected' : '' ?>>
                                <?= esc(ucwords($type)) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <p class="text-danger"><?= validation_show_error('transaction_type') ?></p>
                </div>

                <div class="form-group mb-3">
                    <label for="price">Price:</label>
                    <input type="text" class="form-control" id="price" name="price" value="<?= set_value('price', esc($category['price'])) ?>">
                    <p class="text-danger"><?= validation_show_error('price') ?></p>
                </div>

                <div class="form-group mb-3">
                    <label for="quantity">Quantity:</label>
                    <input type="text" class="form-control" id="quantity" name="quantity" value="<?= set_value('quantity', esc($category['quantity'])) ?>">
                    <p class="text-danger"><?= validation_show_error('quantity') ?></p>
                </div>

                <div class="form-group mb-3">
                    <label for="date">Date of Transaction:</label>
                    <input type="date" class="form-control" id="date" name="date" value="<?= set_value('date', esc($category['date'])) ?>">
                    <p class="text-danger"><?= validation_show_error('date') ?></p>
                </div>

                <div class="d-flex justify-content-center mt-4">
                    <button class="btn btn-success me-2" type="submit">Save Changes</button>
                    <a class="btn btn-danger" href="<?= site_url('inventory/transactions') ?>">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
