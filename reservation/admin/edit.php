<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <title>View Reservations</title>
    
    <style>
       body {
            font-family: 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', 'Liberation Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';
            position: relative;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        body::before {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-image: url(../images/bg22.jpg);
            background-size: cover;
            z-index: -1;
            opacity: 0.5; 
        }
        
        .navbar {
            background-color: #990f02;
        }

        
    

        table {
            border-collapse: collapse;
            width: 50%;
            margin: 150px auto;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            margin-top: 80px;
            overflow-y: auto;
           
 
            }

        table, th, td {
            border: 1px solid #ddd;
            background-color: #fff;
            
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        
        
 
        footer {
            background-color: #990f02;
            padding: 10px;
            color: white;
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
            height: 80px;
        }
       
</style>



<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <img src="../images/Batangas_State_Logo.png" alt="logo" width="110px" height="100px">
      
        <a href="adminhomepage.php" class="btn btn-warning ml-auto" style="margin-right: 10px; width: 150px;">
            <i class="bi bi-box-arrow-right"></i> Back
         </a>
</nav>  



       
<body>


<div class="d-flex justify-content-left" style="top: 0; right: 1; z-index: 999; position: fixed; margin: right -50px;">
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" style="margin-right: 5px; margin-left: 10px; margin-top: 200px">
                    <button class="btn btn-success text-white" type="submit" style="margin-right: 10px; margin-top: 200px; width:200px">
                    <i class="bi bi-search">Search</i></button>
                </form>
            </div>
            <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_nt3101";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT reservationid, itemid, itemSize, quantity, total_price, reservation_date, SRcode, status FROM tbreservedetails";
$result = $conn->query($sql);

echo "
<style>
    .table-container {
        height: 300px;
        overflow-y: auto;
        margin-top: 30px; /* Adjust the margin as needed */
        overflow-y: auto;
    }

    .custom-table {
        width: 80%;
        border-collapse: collapse;
    }

    .custom-table th, .custom-table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    .custom-table th {
        background-color: #f2f2f2;
    }

    .action-buttons button {
        color: #fff;
        margin-right: 5px;
        border-radius: 3px;
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
        
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .btn-warning {
        background-color: #ffc107;
        border-color: #ffc107;
    }
</style>
";

if ($result->num_rows > 0) {
    echo "<div class='table-container' style='overflow-y: auto;'>";
    echo "<table class='table custom-table'>";
    echo "<tr><th>Reservation ID</th><th>Item ID</th><th>Item Size</th><th>Quantity</th><th>Total Price</th> <th>Date</th> <th>SR Code</th><th>Action</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["reservationid"] . "</td><td>" . $row["itemid"] . "</td><td>" . $row["itemSize"] . "</td><td>" . $row["quantity"] . "</td><td>" . $row["total_price"] . "</td><td>" . $row["reservation_date"] . "</td><td>" . $row["SRcode"] . "</td>";
        echo "<td class='action-buttons'>";
        echo "<form method='post' action='process.php'>";
        echo "<input type='hidden' name='reservation_id' value='" . $row["reservationid"] . "'>";
        $acceptStyle = ($row["status"] == 'accepted') ? 'btn-success' : 'btn-outline-success';
        $declineStyle = ($row["status"] == 'canceled') ? 'btn-danger' : 'btn-outline-danger';
        $pendingStyle = ($row["status"] == 'pending') ? 'btn-warning' : 'btn-outline-warning';
        echo "<button type='submit' name='accepted' class='btn {$acceptStyle}'>Accept</button>";
        echo "<button type='submit' name='canceled' class='btn {$declineStyle}'>Canceled</button>";
        echo "<button type='submit' name='pending' class='btn {$pendingStyle}'>Pending</button>";
        echo "</form>";
        echo "</td></tr>";
    }
    echo "</table>";
    echo "</div>";
} else {
    echo "0 results";
}

$conn->close();
?>


</body>
    <footer>
        &copy; Group 2. All Rights Reserved.
    </footer>
</html>
