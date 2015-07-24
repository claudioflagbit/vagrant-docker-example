<?php

error_reporting(-1);
ini_set('display_errors', true);

try {
    // host=172.17.1.130;
    $pdo = new PDO('mysql:host=mysql-docker;dbname=project', 'root', 'root');
    $result = $pdo->exec('CREATE TABLE `foo` (`id` INT NOT NULL AUTO_INCREMENT, `text` VARCHAR(255), PRIMARY KEY (id)) ENGINE=InnoDB');
    if (false !== $result) {
      $pdo->exec('INSERT INTO `foo` (`text`) VALUES (\'foo\')');
      $pdo->exec('INSERT INTO `foo` (`text`) VALUES (\'bar\')');
      $pdo->exec('INSERT INTO `foo` (`text`) VALUES (\'baz\')');
    }
    $stmt = $pdo->query('SELECT * FROM `foo`');
    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $foo) {
        echo '<pre>';
        var_dump($foo);
        echo '</pre>';
    }

} catch (Exception $e) {
    echo $e->getMessage();
}

phpinfo();