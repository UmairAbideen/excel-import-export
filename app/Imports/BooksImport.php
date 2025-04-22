<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\Book;
use PhpOffice\PhpSpreadsheet\Shared\Date;  // Correct import for Excel date conversion
use Maatwebsite\Excel\Concerns\ToModel;

class BooksImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Book([
            'name'         => $row[0],  // Assuming 'name' is the first column
            'author'       => $row[1],  // 'author' is the second column
            'release_date' => is_numeric($row[2])
                ? Carbon::instance(Date::excelToDateTimeObject($row[2]))  // Using the correct Date class for Excel dates
                : Carbon::parse($row[2]),  // If it's not numeric, assume it's a valid date string
            'genre'        => $row[3],  // 'genre' is the fourth column
            'pages'        => $row[4],  // 'pages' is the fifth column
            'publisher'    => $row[5],  // 'publisher' is the sixth column
        ]);
    }
}
