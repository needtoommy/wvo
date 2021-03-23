<?php
$host = 'localhost';
$db   = 'wvo';
$user = 'root';
$pass = '';
$port = "3306";
$charset = 'utf8mb4';

$options = [
    \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    \PDO::ATTR_EMULATE_PREPARES   => false,
];
$dsn = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";
try {
    $pdo = new \PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

$stmt = $pdo->query("SELECT * from wvo.gov_hos WHERE GOV_HOS_PROVINCE like '%" . $_POST['GOV_HOS_NAME'] . "%'  ORDER BY GOV_HOS_NAME");

?>
<select id="editable-select1" class="form-control">
    <?php

    while ($row = $stmt->fetch()) {
    ?>
        <option value="<?php echo $row['GOV_HOS_ID'] ?>"><?php echo $row['GOV_HOS_NAME'] ?></option>
    <?php
    }
    ?>
</select>