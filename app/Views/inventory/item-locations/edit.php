<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="card mx-auto shadow-lg" style="max-width: 50rem;">
        <div class="card-body">
            <h1 class="mb-4"><?= esc($title) ?></h1>

            <form action="<?= base_url(); ?>inventory/item-locations/edit?id=<?= md5($category['id'] . "edit"); ?>" method="POST">
                <input type="hidden" name="id" value="<?= esc($category['id']); ?>">

                <div class="form-group mb-3">
                    <label for="item_id">Item to be Assigned:</label>
                    <select name="item_id" id="item_id" class="form-control">
                        <option value="">Select Item</option>
                        <?php if (!empty($itemLists) && is_array($itemLists)): ?>
                            <?php foreach ($itemLists as $itemList): ?>
                                <option value="<?= esc($itemList['id']) ?>" <?= ($itemList['id'] == $category['item_id']) ? 'selected' : '' ?>>
                                    <?= esc($itemList['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option value="">No items available</option>
                        <?php endif; ?>
                    </select>
                    <p class="text-danger"><?= validation_show_error('item_id') ?></p>
                </div>

                <div class="form-group mb-3">
                    <label for="location">Location</label>
                    <input type="text" class="form-control" id="location" name="location" value="<?= set_value('location', esc($category['location'])); ?>">
                    <p class="text-danger"><?= validation_show_error('location') ?></p>
                </div>

                <div class="form-group mb-3">
                    <label for="quantity">Quantity</label>
                    <input type="text" class="form-control" id="quantity" name="quantity" value="<?= set_value('quantity', esc($category['quantity'])); ?>">
                    <p class="text-danger"><?= validation_show_error('quantity') ?></p>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button class="btn btn-primary d-flex align-items-center" type="submit">
                        <i class="fas fa-save me-2"></i> Save Changes
                    </button>
                    <a class="btn btn-secondary d-flex align-items-center" href="<?= base_url() ?>inventory/item-locations">
                        <i class="fas fa-times me-2"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
