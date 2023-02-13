
<?php

use yii\helpers\Html;
use hail812\adminlte3\assets\AdminLteAsset;
AdminLteAsset::register($this);


/* @var $this \yii\web\View */
/* @var $content string */

$this->beginPage();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <?= $content ?>
        </div>
    </div>
</div>

<?php $this->endBody() ?>

</body>
</html>

<?php $this->endPage() ?>