<html>
<body>

<form method ="post">
	id: <input type="text" name="id"/> <br>
	Name: <input type="text" name="name"><br>
<input type="submit">
</form>

</body>
</html>
<?php
	if (isset($POST["id"]) && isset($POST["name"])){
		var $id = $_POST["id"];
		var $name = $_POST["name"];

		$db = parse_url(getenv("DATABASE_URL"));
   		$pdo = new PDO("pgsql:" . sprintf(
        "host=%s;port=%s;user=%s;password=%s;dbname=%s",
        $db["host"],
        $db["port"],
        $db["user"],
        $db["pass"],
        ltrim($db["path"], "/")
   		));

		$data = [
			'name' => $name,
			'surname' => $surname,
			'sex' => $sex,
		];
		$sql = "INSERT INTO users (name, surname, sex) VALUES (:name, :surname, :sex)";
		$stmt= $pdo->prepare($sql);
		$stmt->execute($data);
	}
?>