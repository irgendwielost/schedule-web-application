<?php
require_once('./classes/Database.php');

class Subject{
    public int $id;
    public string $name;
    public string $teacher;

     /**
     * @return Subject[]
     */
    public static function loadAll(): array
    {
        $query = "SELECT ID FROM Subject";
        $resultset = Database::$pdo->prepare($query);
        $resultset->execute();
        $returnarray = array();
        while ($result = $resultset->fetchObject()) {
            $returnarray[] = Subject::load($result->ID);
        }
        return $returnarray;
    }

    public static function load(int $id): Subject
    {
        $sql = "SELECT * FROM Subject WHERE ID=" . $id;
        $resultset = Database::$pdo->prepare($sql);
        $resultset->execute();
        if ($resultset->rowCount() == 1) {
            // Subject found in database
            $result = $resultset->fetchObject();
            $temp = new Subject();
            $temp->name = $result->Name;
            $temp->id = $result->ID;
            $temp->teacher = $result->Teacher;
            return $temp;
        }
        // Subject not found
        return false;
    }
}
?>