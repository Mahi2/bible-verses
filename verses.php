<?php
$PDO = new PDO("mysql:Host=localhost;dbname=ngbdd;charset=utf8", "root", "");
$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

$id = mt_rand(1,517);
$verses = $PDO->prepare("SELECT * FROM verses WHERE id = ?");
$verse = $verses->execute([$id]);
$verse = $verses->fetch();

?>

<blockquote class="verse-container" id="verse-container">
    <p class="verse-text" id="verse">
        <?php echo $verse->text; ?>
    </p>
    <cite class="verse-reference" id="reference"><?php echo implode(' ', explode('.', $verse->ref)); ?></cite>
    <div class="options" id="options">
        <i class="fa fa-refresh" id="refresh"></i>
        <i class="fa fa-music" id="play"></i>
        <i class="fa fa-heart" id="like"></i>
        <i class="fa fa-share" id="share"></i>
    </div>
</blockquote>