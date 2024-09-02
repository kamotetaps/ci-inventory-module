<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?= esc($title ?? 'Inventory System Module of AIS') ?></title>
    <!-- Load FontAwesome for icons and Bootstrap for styling -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        /* Custom hover effect for buttons */
        .btn:hover {
            opacity: 0.8;
        }

        /* Styling for the header title */
        .header-title {
            background-color: #f8f9fa;
            padding: 10px 0; /* Reduced padding to make it smaller */
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header-title h1 {
            margin: 0;
            font-size: 1.5rem; /* Smaller font size */
            color: #343a40;
            text-align: left; /* Align text to the left */
            padding-left: 20px; /* Add padding for left alignment */
        }

        /* Custom styles for modals */
        .modal-header-success {
            background-color: #28a745;
            color: white;
        }

        .modal-header-error {
            background-color: #dc3545;
            color: white;
        }

        .modal-body {
            font-size: 1rem;
        }

        .modal-content {
            border-radius: 0.5rem;
        }

        .modal-footer button {
            border-radius: 0.25rem;
        }
		
		   .card-icon {
            font-size: 2rem;
            color: #007bff; /* Blue color for the icon */
        }
        .card-body h5 {
            font-size: 1.5rem;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-dark bg-info">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><strong>Inventory System Module of AIS</strong></a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Check if user is logged in to display navigation links -->
            <?php if (session()->get('isLoggedIn')): ?>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>dashboard"><i class="fas fa-home"></i> Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>user"><i class="fas fa-users"></i> Users</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>inventory/categories"><i class="fas fa-tags"></i> Categories</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>inventory/items"><i class="fas fa-box"></i> Items</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>inventory/suppliers"><i class="fas fa-truck"></i> Supplier</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>inventory/item-locations"><i class="fas fa-map"></i> Location</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>inventory/assignments"><i class="fas fa-users"></i> Assignments</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>inventory/transactions"><i class="fas fa-clipboard"></i> Transactions</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>user/logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </nav>

    <!-- Header Title -->
    <header class="header-title">
        <div class="container">
            <h1><?= esc($title ?? 'Inventory System Module of AIS') ?></h1>
        </div>
    </header>

    <!-- Main Content Area -->
    <div class="container">
        <div class="d-flex justify-content-center align-items-center">
            <div class="w-100">

                <!-- Render Section for Dynamic Content -->
                <div class="d-flex justify-content-center align-items-center">
                    <?= $this->renderSection('content') ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Modals for Notifications -->
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header modal-header-success">
                    <i class="fas fa-check-circle fa-2x"></i>
                    <h5 class="modal-title ml-3" id="successModalLabel">Success</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Success message will be inserted here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header modal-header-error">
                    <i class="fas fa-exclamation-circle fa-2x"></i>
                    <h5 class="modal-title ml-3" id="errorModalLabel">Error</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Error message will be inserted here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Show success modal if there's a success message
        <?php if (session()->getFlashdata('success')): ?>
            document.querySelector('#successModal .modal-body').innerText = '<?= session()->getFlashdata('success') ?>';
            $('#successModal').modal('show');
        <?php endif; ?>

        // Show error modal if there's an error message
        <?php if (session()->getFlashdata('error')): ?>
            document.querySelector('#errorModal .modal-body').innerText = '<?= session()->getFlashdata('error') ?>';
            $('#errorModal').modal('show');
        <?php endif; ?>
    </script>
</body>

</html>
