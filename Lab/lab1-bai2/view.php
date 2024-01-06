<!--View-->
<?=$page_content;?>
<select name="courses">
    <?php foreach($list_of_course as $course_name):?>
        <option><?=$course_name?></option>
    <?php endforeach; ?>

</select>