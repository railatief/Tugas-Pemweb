<!DOCTYPE html>
<html>
<head>
    <title>Perpustakaan</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="bootstrap.css">
    <script src="bootstrap.bundle.js"></script>
    <!-- jQuery -->
    <script src="jquery-3.7.0.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
        }
        .container {
            max-width: 500px;
            padding: 25px;
            background-color: #835C3B;
        }
        
        h1 {
            text-align: center;
            color: #EAE1D9;
            margin-bottom: 10px;
        }
        
        form {
            margin-bottom: 10px;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
            color: #EAE1D9;
        }
        
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #EAE1D9;
            border-radius: 3px;
        }
        
        .btn {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #EAE1D9;
            color: #835C3B;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.5s ease;
        }
        
        .btn:hover {
            background-color: whitesmoke;
            color: gray;
        }
        
        table {
            width: 100%;
        }
        
        th, td {
            padding: 5px;
            border: 1px solid #EAE1D9;
            text-align: center;
        }
        
        th {
            background-color: #ffffff;
            font-weight: bold;
            color: #EAE1D9;
        }

    </style>
</head>
<body><br>
    <div class="container">
        <h1>Perpustakaan</h1>
        <form id="AgnesLatief">
            <label for="floatingInput">Judul Buku</label>
            <input type="text" class="form-control" id="floatingInput" name="text" placeholder="Masukkan Judul Buku" required>
            <label for="floatingInput">Nomor Buku</label>
        <input type="number" class="form-control" id="floatingInput" name="number" placeholder="Masukkan Nomor Buku" required>
        
        <button type="submit" class="btn">Submit</button>
    </form>
<!-- Table to display the response -->
<br>
        <table class="table mt-3 table-fixed table-bordered" id="responseTable">
            <thead>
                <tr>
                    <th class="col-5 text-center">Judul Buku</th>
                    <th class="col-5 text-center">Nomor Buku</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
<!-- jQuery AJAX to submit the form data -->
<script>
        $(document).ready(function() {
            $('#AgnesLatief').submit(function(event) {
                event.preventDefault();
                var form = $(this).serialize();
                $.ajax({
                    type: 'POST',
                    url: 'data.php',
                    data: form,
                    dataType: 'json',
                    success: function(response) {
                        // Add a row to the table with the response data
                        var newRow = $('<tr><td class="text-center">' + response.text + '</td><td class="text-center">' + response.number + '</td></tr>');
                        newRow.hide();
                        $('#responseTable tbody').append(newRow);
                        newRow.css('color', '#EAE1D9'); 
                        newRow.fadeIn('slow');
                    }
                });
            });
        });
</script>
</body>
</html>