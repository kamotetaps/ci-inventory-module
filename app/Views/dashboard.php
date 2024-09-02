<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="row">
        <!-- User Count Card -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <i class="fas fa-users fa-lg mr-3 text-primary"></i>
                    <span>Total Users</span>
                </div>
                <div class="card-body text-center">
                    <h3 class="card-title display-4"><?= esc($countUser) ?></h3>
                    <p class="card-text">Total number of users in the system.</p>
                </div>
            </div>
        </div>

        <!-- Total Transactions Card -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <i class="fas fa-clipboard-list fa-lg mr-3 text-success"></i>
                    <span>Total Transactions</span>
                </div>
                <div class="card-body text-center">
                    <h3 class="card-title display-4"><?= esc($countTransaction) ?></h3>
                    <p class="card-text">Total number of transactions.</p>
                </div>
            </div>
        </div>

        <!-- Item Totals Table -->
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <i class="fas fa-boxes fa-lg mr-3 text-warning"></i>
                    <span>Item Totals</span>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Item Name</th>
                                <th>Total (₱)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($getItemTotals) && is_array($getItemTotals)): ?>
                                <?php foreach ($getItemTotals as $item): ?>
                                    <tr>
                                        <td><?= esc($item['name']) ?></td>
                                        <td><?= '₱ ' . number_format(esc($item['total']), 2) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="2" class="text-center">No items found</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Category Totals Table -->
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <i class="fas fa-tags fa-lg mr-3 text-info"></i>
                    <span>Category Totals</span>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>Category</th>
                                <th>Total (₱)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($categoryTotals) && is_array($categoryTotals)): ?>
                                <?php foreach ($categoryTotals as $category): ?>
                                    <tr>
                                        <td><?= esc($category['category_name']) ?></td>
                                        <td><?= '₱ ' . number_format($category['total'], 2) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="2" class="text-center">No data available</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Assignment Status Card -->
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <i class="fas fa-tasks fa-lg mr-3 text-danger"></i>
                    <span>Assignment Status</span>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <canvas id="statusChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Category Distribution Card -->
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <i class="fas fa-chart-pie fa-lg mr-3 text-secondary"></i>
                    <span>Category Distribution</span>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <canvas id="categoryChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js Script -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Category Chart Data
    const categories = <?= json_encode($categories); ?>;
    const categoryLabels = categories.map(cat => cat.name);
    const categoryData = categories.map(cat => parseInt(cat.item_count));

    // Assignment Status Data
    const statuses = <?= json_encode($assignmentStatus); ?>;
    const statusLabels = statuses.map(status => status.status);
    const statusData = statuses.map(status => parseInt(status.status_total));

    // Generate random colors
    function getRandomColor() {
        const letters = '0123456789ABCDEF';
        let color = '#';
        for (let i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }

    // Create Category Chart
    const ctxCategory = document.getElementById('categoryChart').getContext('2d');
    new Chart(ctxCategory, {
        type: 'bar',
        data: {
            labels: categoryLabels,
            datasets: [{
                label: 'Number of Items',
                data: categoryData,
                backgroundColor: categoryLabels.map(() => getRandomColor()), // Different color for each bar
                borderColor: categoryLabels.map(() => getRandomColor()), // Border color for each bar
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                },
                tooltip: {
                    callbacks: {
                        label: function (tooltipItem) {
                            return `${tooltipItem.label}: ${tooltipItem.raw}`;
                        }
                    }
                }
            },
            scales: {
                x: {
                    beginAtZero: true,
                    grid: {
                        display: false
                    }
                },
                y: {
                    beginAtZero: true,
                    grid: {
                        borderDash: [5, 5]
                    }
                }
            }
        }
    });

    // Create Assignment Status Chart
    const ctxStatus = document.getElementById('statusChart').getContext('2d');
    new Chart(ctxStatus, {
        type: 'bar',
        data: {
            labels: statusLabels,
            datasets: [{
                label: 'Status Count',
                data: statusData,
                backgroundColor: statusLabels.map(() => getRandomColor()), // Different color for each bar
                borderColor: statusLabels.map(() => getRandomColor()), // Border color for each bar
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                },
                tooltip: {
                    callbacks: {
                        label: function (tooltipItem) {
                            return `${tooltipItem.label}: ${tooltipItem.raw}`;
                        }
                    }
                }
            },
            scales: {
                x: {
                    beginAtZero: true,
                    grid: {
                        display: false
                    }
                },
                y: {
                    beginAtZero: true,
                    grid: {
                        borderDash: [5, 5]
                    }
                }
            }
        }
    });
});
</script>

<?= $this->endSection() ?>
