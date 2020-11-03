<?php
defined('C5_EXECUTE') or die("Access Denied.");

$this->inc('elements/header.php');
?>

<main>
    <div id="above-the-fold-container">
        <?php
            $a = new Area('Above The Fold');
            $a->enableGridContainer();
            $a->display($c);
        ?>
    </div>

    <?php
        $a = new Area('Main');
        $a->enableGridContainer();
        $a->display($c);
    ?>
    
    <div id="offer-container">
        <?php
            $a = new Area('Offers Container');
            $a->enableGridContainer();
            $a->display($c);
        ?>
    </div>
    <?php
        $a = new Area('Extra Content');
        $a->enableGridContainer();
        $a->display($c);
    ?>
</main>

<?php
$this->inc('elements/footer.php');
