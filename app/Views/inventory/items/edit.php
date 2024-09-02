<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <div class="card mx-auto shadow-lg" style="max-width: 50rem;">
        <div class="card-body">
            <h1 class="card-title mb-4"><?= $title ?></h1>
            <form action="<?= base_url(); ?>inventory/items/edit?id=<?= md5($category['id']."edit"); ?>" method="POST">
                <input type="hidden" name="id" value="<?= esc($category['id']); ?>">

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" class="form-control" id="price" name="price" value="<?= esc($category['price']); ?>" placeholder="Enter price">
                            <p class="text-danger"><?= isset($validation) ? $validation->getError('price') : ''; ?></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="text" class="form-control" id="quantity" name="quantity" value="<?= esc($category['quantity']); ?>" placeholder="Enter quantity">
                            <p class="text-danger"><?= isset($validation) ? $validation->getError('quantity') : ''; ?></p>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="form-label">Item Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?= esc($category['name']); ?>" placeholder="Enter category name">
                            <p class="text-danger"><?= isset($validation) ? $validation->getError('name') : ''; ?></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" class="form-control" id="description" name="description" value="<?= esc($category['description']); ?>" placeholder="Enter description">
                            <p class="text-danger"><?= isset($validation) ? $validation->getError('description') : ''; ?></p>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="category_id" class="form-label">Category</label>
                    <select name="category_id" id="category_id" class="form-control">
                        <option value="">Select Category</option>
                        <?php if (!empty($categories) && is_array($categories)): ?>
                            <?php foreach ($categories as $cat): ?>
                                <option value="<?= esc($cat['id']) ?>" <?= $cat['id'] == $category['category_id'] ? 'selected' : '' ?>>
                                    <?= esc($cat['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option value="">No categories available</option>
                        <?php endif; ?>
                    </select>
                    <p class="text-danger"><?= isset($validation) ? $validation->getError('category_id') : ''; ?></p>
                </div>

                <div class="d-flex justify-content-center mt-4">
                    <button class="btn btn-success text-light m-1" type="submit">
                        <i class="fas fa-save"></i> Save Changes
                    </button>
                    <a class="btn btn-danger text-light m-1" href="<?= base_url() ?>inventory/items">
                        <i class="fas fa-times"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
