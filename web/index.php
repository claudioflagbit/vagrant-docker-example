<?php

error_reporting(-1);
ini_set('display_errors', true);

class Foo
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $text;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }
}



try {
    $pdo = new PDO('mysql:host=project-mysql;dbname=project', 'user', 'password');
    $result = $pdo->exec('CREATE TABLE `foo` (`id` INT NOT NULL AUTO_INCREMENT, `text` VARCHAR(255), PRIMARY KEY (id)) ENGINE=InnoDB');
    if (false !== $result) {
        $pdo->exec('INSERT INTO `foo` (`text`) VALUES (\'foo\')');
        $pdo->exec('INSERT INTO `foo` (`text`) VALUES (\'bar\')');
        $pdo->exec('INSERT INTO `foo` (`text`) VALUES (\'baz\')');
    }

    $stmt = $pdo->query('SELECT * FROM `foo`');
    foreach ($stmt->fetchAll(PDO::FETCH_CLASS, Foo::CLASS) as $foo) {
        echo '<pre>';
        var_dump($foo);
        echo '</pre>';
    }

} catch (Exception $e) {
    echo $e->getMessage();
}

phpinfo();
