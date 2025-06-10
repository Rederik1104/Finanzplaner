# Finanzplaner Docker Project

This project sets up a PHP application with a MySQL database using Docker. It includes a simple user management system with a database connection and table creation logic.

## Project Structure

```
finanzplaner-docker
├── src
│   ├── database.php       # Database connection setup and user table creation
│   └── index.php          # Entry point for the application
├── docker
│   ├── db
│   │   └── init.sql       # SQL commands to initialize the database
│   └── php
│       └── Dockerfile      # Dockerfile for the PHP application
├── .env                    # Environment variables for configuration
├── docker-compose.yml      # Docker Compose configuration for services
└── README.md               # Project documentation
```

## Getting Started

### Prerequisites

- Docker
- Docker Compose

### Setup

1. Clone the repository:
   ```
   git clone <repository-url>
   cd finanzplaner-docker
   ```

2. Create a `.env` file in the root directory with the following content:
   ```
   DB_PASSWORD=your_database_password
   ```

3. Build and run the Docker containers:
   ```
   docker-compose up --build
   ```

### Usage

- Access the application by navigating to `http://localhost` in your web browser.
- The application will connect to the MySQL database and create the necessary tables if they do not exist.

### Database Initialization

The `docker/db/init.sql` file contains SQL commands to set up the initial database schema or seed data. This file will be executed when the database container is created.

### Contributing

Feel free to submit issues or pull requests for improvements or bug fixes.

### License

This project is licensed under the MIT License.