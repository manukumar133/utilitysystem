# Utility System

This Utility System is a Laravel web application that allows administrators to manage users, check audio file duration, and calculate distances between geographical coordinates. It provides an intuitive user interface using Bootstrap for responsiveness and usability.

## Features

-   **User Management:**

    -   Create, edit, delete, and list users.
    -   Users have attributes such as name, email, phone, role, address, and profile image.
    -   Ability to export users' data as CSV or PDF.

-   **Audio Duration Check:**

    -   Upload audio files (MP3, WAV, AAC, FLAC) to check their durations.
    -   Returns duration or error messages based on the uploaded file.

-   **Distance Calculation:**
    -   Input two geographical coordinates to calculate the distance between them.
    -   Useful for applications that require geographical computations.

## Technologies Used

-   **Backend Framework:** Laravel
-   **Frontend Framework:** Bootstrap
-   **Database:** MySQL
-   **PDF Generation:** DomPDF
-   **File Handling:** getID3 for audio file metadata analysis

## Getting Started

To run this application locally, follow the instructions below.

### Prerequisites

-   PHP 8.x
-   Composer
-   MySQL
-   Laravel 8.x or above

### Installation

1. **Clone the repository:**

    ```bash
    git clone https://github.com/your-username/utility-system.git
    cd utility-system
    ```

2. **Set up the environment:**

    - Copy the `.env.example` file to a new `.env` file.
    - Configure your database settings and other environment variables in the `.env` file.

    ```ini
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_user
    DB_PASSWORD=your_database_password
    ```

3. **Generate the application key:**

    ```bash
    php artisan key:generate
    ```

4. **Run the migrations:**

    ```bash
    php artisan migrate
    ```

5. **Install npm dependencies and compile assets (optional):**

    ```bash
    npm install
    npm run dev
    ```

6. **Run the application:**

    ```bash
    php artisan serve
    ```

    Go to `http://127.0.0.1:8000` in your browser to view the application.

## Usage

-   Navigate to the **Users** section to manage user data.
-   Go to the **Audio** section to upload audio files and check their durations.
-   Use the **Distance** section to calculate distances by inputting latitude and longitude.

## Folder Structure

-   `app/Http/Controllers/` - Contains controller logic for user management and utilities.
-   `app/Models/` - Contains the `User` model implementing authentication.
-   `resources/views/` - Contains Blade templates for the UI.
-   `routes/web.php` - Contains route definitions for application endpoints.

## Contributing

Contributions are welcome! If you find any issues or would like to add new features, please fork the repository and create a pull request.
