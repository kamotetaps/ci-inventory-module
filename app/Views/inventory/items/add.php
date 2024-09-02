<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <div class="card mx-auto shadow-lg" style="max-width: 30rem;">
        <div class="card-body">
            <h1 class="card-title mb-4"><?= $title ?></h1>

            <?php if (isset($validation)): ?>
                <div class="alert alert-danger">
                    <?= $validation->listErrors() ?>
                </div>
            <?php endif; ?>

            <?= form_open('inventory/items/add') ?>
                <div class="form-group mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" class="form-control" id="price" name="price" value="<?= set_value('price') ?>" placeholder="Enter price">
                    <p class="text-danger"><?= validation_show_error('price') ?></p>
                </div>

                <div class="form-group mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="text" class="form-control" id="quantity" name="quantity" value="<?= set_value('quantity') ?>" placeholder="Enter quantity">
                    <p class="text-danger"><?= validation_show_error('quantity') ?></p>
                </div>

                <div class="form-group mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= set_value('name') ?>" placeholder="Enter item name">
                    <p class="text-danger"><?= validation_show_error('name') ?></p>
                </div>

                <div class="form-group mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter description"><?= set_value('description') ?></textarea>
                    <p class="text-danger"><?= validation_show_error('description') ?></p>
                </div>

                <div class="form-group mb-3">
                    <label for="category_id" class="form-label">Category</label>
                    <select name="category_id" id="category_id" class="form-control">
                        <option value="">Select Category</option>
                        <?php if (!empty($categories) && is_array($categories)): ?>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= esc($category['id']) ?>" <?= set_value('category_id') == $category['id'] ? 'selected' : '' ?>>
                                    <?= esc($category['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option value="">No categories available</option>
                        <?php endif; ?>
                    </select>
                    <p class="text-danger"><?= validation_show_error('category_id') ?></p>
                </div>

                <div class="d-inline-flex justify-content-center mt-3 w-100">
                    <button type="submit" class="btn btn-primary d-flex align-items-center me-2">
                        <i class="fas fa-plus me-2"></i> Add Item
                    </button> &nbsp;
                    <a href="<?= site_url('inventory/items') ?>" class="btn btn-secondary d-flex align-items-center">
                        <i class="fas fa-arrow-left me-2"></i> Back to List
                    </a>
                </div>
            <?= form_close() ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
