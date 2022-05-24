<?php
require_once('./classes/Database.php');
class Lesson{
    //Variables
    public int $id;
    public string $name;
    public $subject;
    public $schoolDay;
    public $isExam;
    public $isFree;

    public function __construct($id, $name, $subject, $schoolDay, $isExam, $isFree)
    {
        $this->id = $id;
        $this->name = $name;
        $this->subject = $subject;
        $this->schoolDay = $schoolDay;
        $this->isExam = $isExam;
        $this->isFree = $isFree;
    }

    /**
     * @return Lesson[]
     */
    public static function loadAll(): array
    {
        $query = "SELECT ID FROM Lesson";
        $resultset = Database::$pdo->prepare($query);
        $resultset->execute();
        $returnarray = array();
        while ($result = $resultset->fetchObject()) {
            $returnarray[] = Lesson::load($result->ID);
        }
        return $returnarray;
    }

    public static function load(int $id): Lesson
    {
        $query = "SELECT * FROM Lesson WHERE ID=" . $id;
        $resultset = Database::$pdo->prepare($query);
        $resultset->execute();
        if ($resultset->rowCount() == 1) {
            // Lesson found in database
            $result = $resultset->fetchObject();
            $temp = new Lesson($result->ID, $result->Name, null, null, 0,0);
            return $temp;
        }
        // Lesson not found
        return false;
    }

    public function addSubject(Lesson $lesson){
        $query = "UPDATE SubjectInLesson SET SubjectID=$lesson->subject, isExam= 0, isFree= 0 
        WHERE LessonID= $lesson->id AND SchoolDayID = $lesson->schoolDay";
        $resultset = Database::$pdo->prepare($query);
        $resultset->execute();
    }

    public function getSubject(){
        $query = "SELECT * FROM SubjectInLesson WHERE LessonID= $this->id AND SchoolDayID = $this->schoolDay";
        $resultset = Database::$pdo->prepare($query);
        $resultset->execute();
        if ($resultset->rowCount() == 1) {
            // Lesson found in database
            $result = $resultset->fetchObject();
            $temp = new Lesson($this->id, "", $result->SubjectID, $result->SchooldayID, $result->isExam, $result->isFree);
            return $temp;
        }
        // Lesson not found
        return false;
    }
}