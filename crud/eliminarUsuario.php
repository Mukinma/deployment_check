<?php
include("connection.php");
$con = connection();

$id = $_GET['id'];

$sql = "DELETE FROM usuarios WHERE id='$id'";
$query = mysqli_query($con, $sql);

if ($query) {
    header("Location: /crud/listaUsuarios.php?message=Usuario eliminado correctamente");
} else {
    echo "Error al eliminar usuario.";
}
?>
