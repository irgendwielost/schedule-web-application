<?php 

class SchoolDay{
    public int $id;
    public string $name;
    public int $hourAmount;


    /**
     * @return SchoolDay[]
     */
    public static function loadAll(): array
    {
        $query = "SELECT ID FROM SchoolDay";
        $resultset = Database::$pdo->prepare($query);
        $resultset->execute();
        $returnarray = array();
        while ($result = $resultset->fetchObject()) {
            $returnarray[] = SchoolDay::load($result->ID);
        }
        return $returnarray;
    }

    public static function load(int $id): SchoolDay
    {
        $sql = "SELECT * FROM SchoolDay WHERE ID=" . $id;
        $resultset = Database::$pdo->prepare($sql);
        $resultset->execute();
        if ($resultset->rowCount() == 1) {
            // SchoolDay found in database
            $result = $resultset->fetchObject();
            $temp = new SchoolDay();
            $temp->name = $result->Name;
            $temp->id = $result->ID;
            $temp->hourAmount = $result->HourAmount;
            return $temp;
        }
        // SchoolDay not found
        return false;
    }
}
?>