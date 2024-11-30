<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        
        <?php
    // замена имени и пароля
    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $dbname = "shop";

    // Создание соединения
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Проверка соединения
    if ($conn->connect_error) {
        die("Ошибка подключения: " . $conn->connect_error);
    }

    // Получение значений 
    $category = isset($_POST['category']) ? $_POST['category'] : '';
    $min_price = isset($_POST['min_price']) ? $_POST['min_price'] : '';
    $max_price = isset($_POST['max_price']) ? $_POST['max_price'] : '';
    $search_name = isset($_POST['search_name']) ? $_POST['search_name'] : '';

    // Начало формирования SQL-запроса
    $sql = "SELECT * FROM products WHERE 1=1";

    // Добавление условий фильтрации
    if (!empty($category)) {
        $sql .= " AND category = '" . $conn->real_escape_string($category) . "'";
    }

    if (!empty($min_price)) {
        $sql .= " AND price >= " . floatval($min_price);
    }

    if (!empty($max_price)) {
        $sql .= " AND price <= " . floatval($max_price);
    }

    if (!empty($search_name)) {
        $sql .= " AND name LIKE '%" . $conn->real_escape_string($search_name) . "%'";
    }

    // Выполнение запроса и вывод 
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "<h3>" . htmlspecialchars($row['name']) . "</h3>";
            echo "<p>Категория: " . htmlspecialchars($row['category']) . "</p>";
            echo "<p>Цена: " . htmlspecialchars($row['price']) . " руб.</p>";
            echo "</div>";
        }
    } else {
        echo "Нет товаров, соответствующих критериям.";
    }

    $conn->close();
    ?>

</body>
</html>