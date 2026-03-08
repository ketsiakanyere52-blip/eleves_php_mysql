<?php
require "connexion.php";
?>

<h2>Liste des élèves</h2>
<a href="ajouter.php">Ajouter un élève</a><br><br>

<?php
try {
    $sql = "SELECT * FROM eleves";
    $result = $conn->query($sql);

    if($result){
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Nom</th><th>Prénom</th><th>Age</th><th>Action</th></tr>";

        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['nom'] . "</td>";
            echo "<td>" . $row['prenom'] . "</td>";
            echo "<td>" . $row['age'] . "</td>";
            echo "<td>
                    <a href='modifier.php?id=" . $row['id'] . "'>Modifier</a> | 
                    <a href='supprimer.php?id=" . $row['id'] . "' onclick=\"return confirm('Supprimer cet élève ?');\">Supprimer</a>
                  </td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Aucun élève trouvé.";
    }
} catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
}
?>
