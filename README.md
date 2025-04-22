📊 Laravel 10 Excel Import/Export Example

This Laravel 10 project demonstrates how to import and export data using Excel files with the help of the maatwebsite/excel package. It allows you to easily upload and download data in Excel format, ideal for managing large datasets like book inventories, user records, or financial reports.

⏰ Why Use Excel Import/Export?
Excel file import/export is essential when you want to easily manage large amounts of data and provide users with a way to export reports or import bulk data. This method is commonly used for:

Importing bulk data from CSV or Excel files (e.g., book details, user lists).

Exporting data to Excel for analysis or reporting purposes.

🔄 Why Combine Import + Export?
Import allows you to bring external data into your application, while export lets you offer downloadable reports or backup data. Together, they streamline data management and improve user experience.

🛠️ Tech Stack


Tool	Purpose
Laravel 10	PHP framework
maatwebsite/excel	Package for importing/exporting Excel files
Blade View	Display the data (book list) in HTML table
Carbon	For date formatting
📝 Step-by-Step Guide

1. Install Excel Package
bash
Copy
Edit
composer require maatwebsite/excel
2. Create Model & Migration
Generate the Book model and the migration file.

bash
Copy
Edit
php artisan make:model Book -m
Then, add the necessary fields like name, author, release_date, genre, pages, and publisher in the migration file.

3. Create Import Class
bash
Copy
Edit
php artisan make:import BooksImport --model=Book
This class will handle the logic for importing data from an Excel file and saving it to the database.

4. Create Export Class
bash
Copy
Edit
php artisan make:export BooksExport --model=Book
This class handles exporting the data from the database into an Excel file.

5. Create Controller for Handling Logic
bash
Copy
Edit
php artisan make:controller BookController
In the controller, create methods to handle both import and export functionality:

Import: To handle file uploads and import data.

Export: To download the data as an Excel file.

6. Set Up Routes
Define routes for handling the import and export actions in routes/web.php:

php
Copy
Edit
Route::post('/import', [BookController::class, 'import'])->name('books.import');
Route::get('/export', [BookController::class, 'export'])->name('books.export');
7. Create Blade View for Displaying Data
Create a view (resources/views/books/index.blade.php) to show the list of books using DataTables and allow the user to upload or download Excel files.

8. Handling Import in the Controller
In BookController, use the BooksImport class to handle the file import:

php
Copy
Edit
public function import(Request $request)
{
    $request->validate(['file' => 'required|mimes:xlsx,xls']);
    Excel::import(new BooksImport, $request->file('file'));
    return redirect()->back()->with('success', 'Books imported successfully!');
}
9. Handling Export in the Controller
For exporting the data, use the BooksExport class:

php
Copy
Edit
public function export()
{
    return Excel::download(new BooksExport, 'books.xlsx');
}
10. Set Up JS DataTables
In the Blade view, integrate DataTables to display the book data in a searchable and paginated table.

11. Test Import/Export Functionality
To test importing data, upload an Excel file containing book data via the form in your view.

To test exporting data, click the "Export" button to download the books list as an Excel file.

💡 Commands to Run

Migrate & Seed Database:

bash
Copy
Edit
php artisan migrate --seed
Run the Application:
Use php artisan serve to start the application and navigate to the page for testing import/export functionality.
