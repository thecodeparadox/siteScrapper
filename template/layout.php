<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?= $this->fetch('title'); ?>
        <?= $this->fetch('css'); ?>
    </head>

    <body>
        <div class="container">

            <div class="header clearfix">
                <h3 class="text-muted">Craiglist Scrapping</h3>
                <hr>
            </div>

            <?php $this->element('search_form') ?>
            <?php $this->element('search_result') ?>

        </div>

        <?= $this->fetch('script'); ?>
    </body>
</html>