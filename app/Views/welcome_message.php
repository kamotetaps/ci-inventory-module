<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeIgniter 4 Framework</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            color: #343a40;
        }
        .hero {
            background: linear-gradient(135deg, #dd4814, #ff7e00);
            color: white;
            padding: 60px 0;
            text-align: center;
            position: relative;
        }
        .hero h1 {
            font-size: 3rem;
            font-weight: bold;
        }
        .hero h2 {
            font-size: 1.75rem;
            margin-top: 20px;
        }
        .nav-link {
            color: white !important;
        }
        .section {
            padding: 60px 0;
        }
        .section h3 {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #dd4814;
        }
        .section p {
            font-size: 1.1rem;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        .card-header {
            background-color: #dd4814;
            color: white;
            font-weight: bold;
        }
        .btn-primary {
            background-color: #dd4814;
            border: none;
        }
        .btn-primary:hover {
            background-color: #c23916;
        }
        footer {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
            text-align: center;
        }
        .navbar {
            margin-bottom: 60px;
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">Inventory System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
             <?php if (!session()->get('isLoggedIn')): ?>
                <li class="nav-item">
                    <a class="nav-link" href="/login"><i class="fas fa-sign-in-alt"></i> Login</a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>

<!-- HEADER: HERO SECTION -->
<header class="hero">
    <div class="container">
        <h1>🎓 CodeIgniter 4 Framework</h1>
        <h2>📚 Training for Trainers on PHP Web Application Framework: CodeIgniter</h2><br/>
		<p>Welcome to the Inventory System Module for AIS! This project is part of the training program, focusing on building a robust and scalable inventory management system using the Model-View-Controller (MVC) architecture of CodeIgniter, with Bootstrap as the main CSS framework for beautiful and responsive designs.

</p>
    </div>
</header>

<!-- MAIN SECTION -->
<section class="section">
    <div class="container">
        <h3>📦 Inventory System Module of Academic Information System</h3>
        <p><strong>Version 1.0</strong></p>
        
        <div class="card mt-4">
            <div class="card-header">
                📝 Introduction
            </div>
            <div class="card-body">
                <p>The Inventory System Module is an integral part of the Academic Information System, designed specifically for efficient inventory management within an academic institution. This module aims to provide a robust and scalable solution for managing inventory, tracking items, and maintaining accurate records. Developed using modern web technologies, the module will serve as a reference for future updates and integration into the broader Academic Information System of the institution.</p>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                🔍 Technical Aspects and Overview
            </div>
            <div class="card-body">
                <p>The Inventory System Module is structured to cover various components critical to inventory management:</p>
                <ul>
                    <li>👥 <strong>Users:</strong> This section handles user management, listing employees and managing user accounts.</li>
                    <li>📋 <strong>Items:</strong> It stores detailed information about each inventory item, facilitating easy access and management.</li>
                    <li>🏷️ <strong>Categories:</strong> Items are organized into categories, allowing for streamlined management and retrieval.</li>
                    <li>🚚 <strong>Suppliers:</strong> Maintains a database of suppliers, including their contact details and other relevant information.</li>
                    <li>🔄 <strong>Inventory Transactions:</strong> Records and tracks changes in inventory, such as purchases, sales, and adjustments.</li>
                    <li>📍 <strong>Item Locations:</strong> Tracks the location of items, which is essential when inventory is spread across multiple locations.</li>
                    <li>📝 <strong>Assignments:</strong> Manages the assignment of items to employees, using Memorandum Receipts (MR) to document item issuance.</li>
                </ul>
                <p>To achieve these functionalities, the module leverages several key technologies and methodologies:</p>
                <ul>
                    <li><strong>CodeIgniter Framework:</strong> The project utilizes CodeIgniter, a lightweight PHP framework that accelerates development by providing a structured yet flexible environment. Its simplicity and performance make it well-suited for building robust web applications.</li>
                    <li><strong>Model-View-Controller (MVC) Architecture:</strong>
                        <ul>
                            <li><strong>Model:</strong> Manages data and business logic, performing CRUD (Create, Read, Update, Delete) operations on inventory items, categories, users, and suppliers.</li>
                            <li><strong>View:</strong> Handles the presentation layer, providing a user interface for interacting with the system through forms, tables, and reports.</li>
                            <li><strong>Controller:</strong> Serves as an intermediary, processing user inputs and determining the appropriate responses or views to render.</li>
                        </ul>
                    </li>
                    <li><strong>Bootstrap for Responsive Design:</strong> Bootstrap is employed to ensure a responsive, mobile-first design. It provides a consistent and user-friendly interface across various devices and screen sizes.</li>
                    <li><strong>CRUD Operations:</strong> Comprehensive CRUD operations are implemented to allow users to create, read, update, and delete records in the system. These operations are essential for maintaining accurate and up-to-date inventory data.</li>
                    <li><strong>Form Validation:</strong> The system includes robust form validation to ensure data integrity. It checks for required fields, correct formats, and valid data types using CodeIgniter's validation library.</li>
                    <li><strong>Authentication:</strong> Security is a priority, with user authentication mechanisms in place to ensure that only authorized users can access or modify inventory data. This protects the system's integrity and confidentiality.</li>
                    <li><strong>Data Encryption:</strong> Sensitive data, such as user passwords, is encrypted using secure hashing algorithms before being stored in the database, enhancing data security and compliance with best practices.</li>
                    <li><strong>MySQL Database:</strong> The backend relies on a MySQL database, which is known for its reliability and efficiency in managing relational data. It handles data storage, retrieval, and complex queries.</li>
                    <li><strong>Chart.js for Reporting:</strong> The module integrates Chart.js, a powerful tool for creating interactive and insightful charts. These charts provide visual representations of inventory trends, transaction histories, and other key metrics, aiding in data-driven decision-making.</li>
                </ul>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                🎯 Objectives
            </div>
            <div class="card-body">
                <ul>
                    <li><strong>Improve Inventory Management:</strong> Streamline the management of inventory items, categories, suppliers, and locations to ensure accurate tracking and easy retrieval of inventory data.</li>
                    <li><strong>Enhance Data Accuracy:</strong> Implement robust validation mechanisms to ensure the accuracy and integrity of inventory data, reducing errors and inconsistencies.</li>
                    <li><strong>Secure Access:</strong> Protect sensitive data by implementing user authentication and data encryption, ensuring that only authorized personnel can access or modify inventory information.</li>
                    <li><strong>Provide Insightful Reports:</strong> Use data visualization tools like Chart.js to provide clear, insightful reports on inventory status, trends, and transactions, aiding in informed decision-making.</li>
                    <li><strong>Facilitate Integration:</strong> Develop the module with a flexible architecture that allows for easy integration into the existing Academic Information System of the institution.</li>
                </ul>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                📜 Summary
            </div>
            <div class="card-body">
                <p>The Inventory System Module of the Academic Information System is designed to streamline inventory management within an academic institution. By utilizing modern technologies such as CodeIgniter, Bootstrap, MySQL, and Chart.js, the module offers a robust, scalable, and user-friendly solution. It focuses on secure and efficient handling of inventory items, user management, transaction tracking, and data reporting. The system's architecture ensures easy integration and future expansion, making it a valuable tool for managing the institution's inventory efficiently.</p>
                <p>With features like CRUD operations, form validation, authentication, and data encryption, the module ensures data integrity, security, and accessibility. It provides comprehensive insights through visual reports, aiding decision-makers in effectively managing inventory. This module serves as a foundational element for further development and integration into the broader Academic Information System of the institution, contributing to overall operational efficiency and effectiveness.</p>
            </div>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer>
    <p>👋 Thank you for exploring the Inventory System Module! Your feedback and contributions are welcome to enhance this system further.</p>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
