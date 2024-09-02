<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="card" style="width: 50rem;">
    <div class="card-body">
        <form action="<?= base_url(); ?>inventory/categories/delete?id=<?= md5($category['id']."delete"); ?>" method="POST">
            <input type="hidden" name="id" value="<?= esc($category['id']); ?>">
            <div>
                <div class="row">
                    <div class="col">
                        <div class="form-group m-3">
                            <label class="form-label">Category Name</label>
                            <input type="text" class="form-control" name="name" value="<?= esc($category['name']); ?>">
                            <p class="text-danger"><?= isset($validation) ? $validation->getError('name') : ''; ?></p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group m-3">
                            <label class="form-label">Description</label>
                            <input type="text" class="form-control" name="description" value="<?= esc($category['description']); ?>">
                            <p class="text-danger"><?= isset($validation) ? $validation->getError('description') : ''; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-lg-flex d-xl-flex justify-content-lg-center justify-content-xl-center align-items-xl-center mt-3">
                <button class="btn btn-primary text-bg-success m-1" type="submit">Yes</button>
                <a class="btn btn-primary text-bg-danger m-1" href="<?= base_url() ?>inventory/categories">Cancel</a>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
