<?php defined('C5_EXECUTE') or die("Access Denied.");

$this->inc('elements/header_top.php');

// $as = new GlobalArea('Header Search');
// $blocks = $as->getTotalBlocksInArea();
// $displayThirdColumn = $blocks > 0 || $c->isEditMode();
// $displayThirdColumn = false;
?>

<header>
    <div id="header-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-6"></div>
                <div class="col-sm-6">
                    <ul>
                        <li>
                            <?php
                            $a = new GlobalArea('Header Top Location');
                            $a->display();
                            ?>
                        </li>
                        <li>
                            <?php
                            $a = new GlobalArea('Header Top Email');
                            $a->display();
                            ?>
                        </li>
                        <li>
                            <?php
                            $a = new GlobalArea('Header Top Contact');
                            $a->display();
                            ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div id="header-main">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-xs-9">
                    <?php
                    $a = new GlobalArea('Header Site Title');
                    $a->display();
                    ?>
                </div>
                <div class="col-sm-8 col-xs-3">
                    <?php
                    $a = new GlobalArea('Header Navigation');
                    $a->display();
                    ?>
                </div>
            </div>
        </div>
    </div>
    
</header>
