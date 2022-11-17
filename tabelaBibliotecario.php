<?php

include 'dbConfig.php';

$result = mysqli_query($db,"SELECT * FROM livros");

echo "<table border='1'>
<tr>
<th> </th>
<th>Nome</th>
<th>Sessão</th>
<th>Status</th>
";
 if ($_SESSION['sess_type'] = 'bibliotecario') echo "<th>Opções</th>";
echo "</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>";?>
<img width="120" height="150" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['img']); ?> "/>
<?php echo "</td>";
//nome do livro
echo "<td>";
if ($row['emprestado'] == 0) {
    echo "<p>" . $row['nome_livro'] . "</p>";
}else {
    echo "<p style='text-decoration: line-through;'>" . $row['nome_livro'] . "</p>";
}
//genero 
echo "<td>" . $row['genero'] . "</td>";
//status
echo "<td>"; 
if ($row['emprestado'] == 0) {
    echo "<p style='color:green;'> Disponivel </p>";
}else {
    echo "<p style='color:red;'> Indisponivel </p>";

} 
echo "  </td>";
if ($_SESSION['sess_type'] == 'bibliotecario') {
	echo "<td>"; 
	if ($row['emprestado'] == 0) {
		echo "<form action='emprestar.php' method='POST' id='emprestar'></form><button type='submit' form='emprestar' name='id_livro' value=".$row['id_livro'].">Emprestar</button>";
	} else {
		echo "<form action='retornar.php' method='POST' id='retornar'></form><button type='submit' form='retornar' name='id_livro' value=".$row['id_livro'].">Retornar</button>";
	} 
	echo "  </td>";
}
}

echo "</tr>";
echo "</table>";

mysqli_close($db);
?>
