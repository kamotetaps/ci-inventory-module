# CodeIgniter 4 Framework

## Training for Trainers on PHP Web Application Framework: CodeIgniter
This project is a requirement for the completion of the training. It focuses on developing an Inventory System Module for AIS. The project utilizes the Model-View-Controller (MVC) architecture of CodeIgniter and incorporates Bootstrap as the main CSS framework for templating.


# Inventory System Module of Academic Information System
## Technical Aspects and Overview
The Inventory System Module is structured to cover various components critical to inventory management:
•	Users: This section handles user management, listing employees and managing user accounts.
•	Items: It stores detailed information about each inventory item, facilitating easy access and management.
•	Categories: Items are organized into categories, allowing for streamlined management and retrieval.
•	Suppliers: Maintains a database of suppliers, including their contact details and other relevant information.
•	Inventory Transactions: Records and tracks changes in inventory, such as purchases, sales, and adjustments.
•	Item Locations: Tracks the location of items, which is essential when inventory is spread across multiple locations.
•	Assignments: Manages the assignment of items to employees, using Memorandum Receipts (MR) to document item issuance.
To achieve these functionalities, the module leverages several key technologies and methodologies:
1.	CodeIgniter Framework: The project utilizes CodeIgniter, a lightweight PHP framework that accelerates development by providing a structured yet flexible environment. Its simplicity and performance make it well-suited for building robust web applications.
2.	Model-View-Controller (MVC) Architecture:
o	Model: Manages data and business logic, performing CRUD (Create, Read, Update, Delete) operations on inventory items, categories, users, and suppliers.
o	View: Handles the presentation layer, providing a user interface for interacting with the system through forms, tables, and reports.
o	Controller: Serves as an intermediary, processing user inputs and determining the appropriate responses or views to render.
3.	Bootstrap for Responsive Design: Bootstrap is employed to ensure a responsive, mobile-first design. It provides a consistent and user-friendly interface across various devices and screen sizes.
4.	CRUD Operations: Comprehensive CRUD operations are implemented to allow users to create, read, update, and delete records in the system. These operations are essential for maintaining accurate and up-to-date inventory data.
5.	Form Validation: The system includes robust form validation to ensure data integrity. It checks for required fields, correct formats, and valid data types using CodeIgniter's validation library.
6.	Authentication: Security is a priority, with user authentication mechanisms in place to ensure that only authorized users can access or modify inventory data. This protects the system's integrity and confidentiality.
7.	Data Encryption: Sensitive data, such as user passwords, is encrypted using secure hashing algorithms before being stored in the database, enhancing data security and compliance with best practices.
8.	MySQL Database: The backend relies on a MySQL database, which is known for its reliability and efficiency in managing relational data. It handles data storage, retrieval, and complex queries.
9.	Chart.js for Reporting: The module integrates Chart.js, a powerful tool for creating interactive and insightful charts. These charts provide visual representations of inventory trends, transaction histories, and other key metrics, aiding in data-driven decision-making.
By combining these technologies and practices, the Inventory System Module ensures efficient, secure, and user-friendly management of inventory, paving the way for seamless integration into the institution's broader Academic Information System.

