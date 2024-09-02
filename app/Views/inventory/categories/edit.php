<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <div class="card mx-auto shadow-lg" style="max-width: 50rem;">
        <div class="card-body">
            <h1 class="card-title mb-4"><?= $title ?></h1>
            <form action="<?= base_url(); ?>inventory/categories/edit?id=<?= md5($category['id']."edit"); ?>" method="POST">
                <input type="hidden" name="id" value="<?= esc($category['id']); ?>">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?= esc($category['name']); ?>" placeholder="Enter category name">
                            <p class="text-danger"><?= isset($validation) ? $validation->getError('name') : ''; ?></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter description"><?= esc($category['description']); ?></textarea>
                            <p class="text-danger"><?= isset($validation) ? $validation->getError('description') : ''; ?></p>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <button class="btn btn-success text-light m-1" type="submit">
                        <i class="fas fa-save"></i> Save Changes
                    </button>
                    <a class="btn btn-danger text-light m-1" href="<?= base_url() ?>inventory/categories">
                        <i class="fas fa-times"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
