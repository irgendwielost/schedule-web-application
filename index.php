<?php
//Display errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('./classes/Lesson.php');

$inputClass = "input-hidden";

if (isset($_POST["lessonSubmit"])) {
    $id = $_POST['lessonId'];
    $inputClass = "input-shown";
}

if(isset($_POST['addSubject-Submit'])){
    $subject = $_POST['subjectSelect'];
    $lessonId = $_POST['lessonId'];
    $day = $_POST['dayId'];
    $dayName = $_POST['dayName'];
    $lesson = new Lesson($lessonId, "", $subject, $day, 0, 0);
    $addSubject = $lesson->addSubject($lesson);
    echo $addSubject;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stundenplan</title>
</head>
<link rel="stylesheet" href="./libs/Index.css">

<body style="margin: 0;">
    <Header>
        <?php require_once('./Templates/Header.php') ?>
    </Header>

    <div class="<?= $inputClass ?>">
        <?php require_once('./Templates/AddSubjectForm.php') ?>
    </div>

    <div id="schedule-container">
        <?php require_once('./Templates/SchedulePlan.php') ?>
    </div>



</body>

</html>