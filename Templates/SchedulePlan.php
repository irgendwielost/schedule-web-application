<?php
//Get the classes
require_once('./classes/Subject.php');      //Subject
require_once('./classes/Lesson.php');       //Lesson
require_once('./classes/SchoolDay.php');    //Schoolday

$schoolDays = SchoolDay::loadAll();
?>

<link rel="stylesheet" href="./libs/SchedulePlan.css">
<div id="days-container">
  <?php
  foreach ($schoolDays as $schoolDay) {

    //Get the variables
    $dayId = $schoolDay->id;
    $dayName = $schoolDay->name;
    $dayHours = $schoolDay->hourAmount;

  ?>
    <div class="day-container">
      <div class="day-name-container">
        <span><?= $dayName ?></span>
      </div>

      <div>
        <?php
        for ($i = 1; $i <= $dayHours; $i++) {
          $lesson = Lesson::load($i);
          $lesson->schoolDay = $dayId;
          $lessonInSubject = $lesson->getSubject();
          if ($lessonInSubject) {
            $subject = Subject::load($lessonInSubject->subject);
            $isFree = $lessonInSubject->isFree;
            if ($isFree == 1) {
              $lessonClass = "lesson-free";
            } else {
              $lessonClass = "lesson-container";
            }

        ?>

            <form action="./index.php" method="POST" name="lessonform" id="lessonform">
              <button type="submit" class="<?= $lessonClass ?>" name="lessonSubmit">
                <input type="hidden" name="lessonId" value="<?= $lesson->id ?>">
                <input type="hidden" name="dayId" value="<?= $dayId ?>">
                <div class="subjectInformation">
                  <span><?= $subject->name ?></span>
                  <span><?= $subject->teacher ?></span>
                </div>
              </button>
            </form>

        <?php
          }
        }
        ?>
      </div>
    </div>



  <?php

  }
  ?>
</div>