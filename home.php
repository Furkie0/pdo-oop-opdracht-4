<?php 

include('db.php');

$connectie = new Database();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<h1>Users</h1>

<form method="GET">	
<label for="voornaam">voornaam:</label>
    <input type="text" name="voornaam" required><br><br>

    <label for="achternaam">achternaam:</label>
        <input type="text" name="achternaam" required><br><br>

    <label for="geboortedatum">geboortedatum:</label>
        <input type="date" name="geboortedatum" required><br><br>

    <label for="email">email:</label>
        <input type="email" name="email" required><br><br>

    <label for="telefoonnummer">telefoonnummer:</label>
        <input type="number" name="telefoonnummer" required><br><br>
        
        <input type="submit" class="btn btn-primary" value="Toevoegen">
        
    
    </form>

    <table class="table table-striped">
<tr>
    <th>id</th>
    <th>voornaam</th>
    <th>achternaam</th>
    <th>geboortedatum</th>
    <th>email</th>
    <th>telefoonnummer</th>
    <th>Edit</th>
    
</tr>
<?php



?>
<?php 
$result = $connectie->selectUser();
foreach($result as $row) {?>
<tr>
    <td><?php echo $row['id']; ?></td>  
    <td><?php echo $row['voornaam']; ?></td>
    <td><?php echo $row['achternaam']; ?></td>
    <td><?php echo $row['geboortedatum']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['telefoonnummer']; ?></td>
    <td> <a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a></td>    
</tr>
<?php } ?>
    
</body>
</html>


