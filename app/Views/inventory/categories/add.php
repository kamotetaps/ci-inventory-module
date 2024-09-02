<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <div class="card mx-auto shadow-lg" style="max-width: 50rem;">
        <div class="card-body">
            <h1 class="card-title mb-4"><?= $title ?></h1>

            <?php if (isset($validation)): ?>
                <div class="alert alert-danger">
                    <?= $validation->listErrors() ?>
                </div>
            <?php endif; ?>

            <?= form_open('inventory/categories/add') ?>
                <div class="form-group mb-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= set_value('name') ?>" placeholder="Enter category name">
                    <p class="text-danger"><?= validation_show_error('name') ?></p>
                </div>
                <div class="form-group mb-3">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter category description"><?= set_value('description') ?></textarea>
                    <p class="text-danger"><?= validation_show_error('description') ?></p>
                </div>
                <div class="d-flex justify-content-center mb-3">
                    <button type="submit" class="btn btn-primary mr-2">
                        <i class="fas fa-plus"></i> Add Category
                    </button>
                    <a href="<?= site_url('inventory/categories') ?>" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back to List
                    </a>
                </div>
            <?= form_close() ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
