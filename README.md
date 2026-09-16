# Nashaty

Nashaty is a web-based student platform built for university communities. It gives students a central place to view updates, participate in competitions, join elections, send messages, and interact with academic activities in a modern and organized environment.

## Features

- Student timeline and activity feed
- Competitions and events management
- Voting and elections support
- Messaging and communication tools
- Ask-us / support section
- Admin and student account management
- User profile and account settings
- Responsive dashboard interface

## Tech Stack

- PHP
- MySQL
- HTML / CSS / JavaScript
- Bootstrap
- jQuery

## Project Structure

- `db/dbConnection.php` — database connection configuration
- `admin/` — admin panel assets and uploaded files
- `assets/` — front-end styles, scripts, and library files
- `includes/` — shared layout files
- `*.php` — application pages for login, dashboard, users, competitions, elections, and messages
- `nashty_app.sql` — MySQL database schema and sample data

## Requirements

- XAMPP / WAMP / LAMP
- PHP 7+ recommended
- MySQL database
- Web browser

## Installation

1. Install XAMPP and start Apache and MySQL.
2. Copy the project folder into `htdocs` (for XAMPP users).
3. Import the database file `nashty_app.sql` into MySQL.
4. Open the project in the browser:
   - `http://localhost/nashaty`
5. Log in using the created user or admin account.

## Database Configuration

The database settings are defined in:

- `db/dbConnection.php`

Default local setup:

```php
$con = new mysqli('localhost', 'root', '', 'nashty_app');
```

If your local MySQL credentials differ, update the parameters in that file.

## Notes

This project was created as a graduation project and is intended for academic and educational use. It demonstrates a complete student management and engagement system with a dashboard-driven UI.

## License

This project is for educational and demonstration purposes.
