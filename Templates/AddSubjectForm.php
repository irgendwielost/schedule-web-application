<?php
    if(isset($_POST['lessonSubmit']) && !empty($_POST['lessonId'])){
        // Import the classes
        require_once('./classes/Subject.php');
        require_once('./classes/Lesson.php');
        require_once('./classes/SchoolDay.php');

        $lessonId = $_POST['lessonId'];
        $lesson = Lesson::load($lessonId);

        $dayId = $_POST['dayId'];
        $day = SchoolDay::load($dayId);

        $subjects = Subject::loadAll();
    }
?>
<!-- Input for lessons -->
<div>
    <div id="input-body">
        <form action="./index.php" method="POST" name="addSubject">
            <input type="hidden" value="<?=$lesson->id?>" name="lessonId">
            <input type="text" value="<?=$dayId?>" name="dayId">
            <input type="text" value="<?=$day->name?>" name="dayName">
            <input type="text" value="<?=$lesson->name?>" name="lessonName">
            <select name="subjectSelect" id="subjectSelect">
                <?php 
                    foreach($subjects as $subject){
                        ?>
                        <option value="<?= $subject->id?>"><?= $subject->name?></option>
                        <?php
                    }
                ?>
            </select>
            <input type="submit" name="addSubject-Submit">
        </form>
    </div>
</div>