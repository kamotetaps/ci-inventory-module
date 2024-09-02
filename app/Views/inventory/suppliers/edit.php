<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <div class="card mx-auto shadow-lg" style="width: 50rem;">
        <div class="card-body">
            <h1 class="card-title mb-4"><?= $title ?></h1>
            <form action="<?= base_url(); ?>inventory/suppliers/edit?id=<?= md5($suppliers['id'] . "edit"); ?>" method="POST">
                <input type="hidden" name="id" value="<?= esc($suppliers['id']); ?>">
                
                <div class="form-group m-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= set_value('name', esc($suppliers['name'])); ?>" placeholder="Enter supplier name">
                    <p class="text-danger"><?= validation_show_error('name') ?></p>
                </div>

                <div class="form-group m-3">
                    <label for="contact">Contact</label>
                    <input type="text" class="form-control" id="contact" name="contact" value="<?= set_value('contact', esc($suppliers['contact'])); ?>" placeholder="Enter contact information">
                    <p class="text-danger"><?= validation_show_error('contact') ?></p>
                </div>

                <div class="form-group m-3">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="<?= set_value('phone', esc($suppliers['phone'])); ?>" placeholder="Enter phone number">
                    <p class="text-danger"><?= validation_show_error('phone') ?></p>
                </div>

                <div class="form-group m-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= set_value('email', esc($suppliers['email'])); ?>" placeholder="Enter email address">
                    <p class="text-danger"><?= validation_show_error('email') ?></p>
                </div>

                <div class="form-group m-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="<?= set_value('address', esc($suppliers['address'])); ?>" placeholder="Enter address">
                    <p class="text-danger"><?= validation_show_error('address') ?></p>
                </div>

                <div class="d-inline-flex justify-content-center w-100 mt-3">
                    <button class="btn btn-primary d-flex align-items-center me-3" type="submit">
                        <i class="fa fa-save me-2"></i> Save Changes
                    </button>
                    <a class="btn btn-secondary d-flex align-items-center" href="<?= base_url() ?>inventory/suppliers">
                        <i class="fa fa-times me-2"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
