<!DOCTYPE html>
<html>

<head>
    <title>Laravel 10 Excel Demo</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
</head>

<body>

    <h2>Book List</h2>

    @if (session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('books.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" required>
        <button type="submit">Import Excel</button>
    </form>

    <a href="{{ route('books.export') }}">
        <button>Export Excel</button>
    </a>

    <br><br>
    <table id="bookTable" class="display">
        <thead>
            <tr>
                <th>Name</th>
                <th>Author</th>
                <th>Release Date</th>
                <th>Genre</th>
                <th>Pages</th>
                <th>Publisher</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->name }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->release_date }}</td>
                    <td>{{ $book->genre }}</td>
                    <td>{{ $book->pages }}</td>
                    <td>{{ $book->publisher }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#bookTable').DataTable();
        });
    </script>

</body>

</html>
