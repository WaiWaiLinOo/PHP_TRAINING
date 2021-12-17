<link rel="stylesheet" href="css/style.css">
<?php
function getAge($dob)
{
    $bday = new DateTime($dob);
    $today = new Datetime(date('m.d.y'));
    if ($bday > $today) {
        return 'You are not born yet';
    }
    $diff = $today->diff($bday);
    return 'Your Current Age is : ' . $diff->y . ' Years Old Sir!';
}
?>
<h1 class="center">Calculate Age using PHP...</h1>
<hr>
<div class="form-wrapper">
    <form>
        <div class="input-wrapper">
            <label>Date of Birth</label>
            <input type="date" name="dob" value="<?php echo (isset($_GET['dob'])) ? $_GET['dob'] : ''; ?>">
            <input type="submit" value="Calculate Age">
        </div>
    </form>
    <?php
    if (isset($_GET['dob']) && $_GET['dob'] != '') { ?>
        <div class="result-wrapper">

            <?php echo getAge($_GET['dob']); ?>
        </div>
    <?php }
    ?>
</div>