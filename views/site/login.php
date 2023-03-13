<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;


// $this->title = 'Hospital Quillabamba';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <div class="d-flex flex-column align-items-center">
        <!-- <h1><?= Html::encode($this->title) ?></h1> -->
        <h1>Hospital</h1>
        <h1>Quillabamba</h1>

        <h3>Sistema de Cupos</h3>
        <p>Por favor, complete los siguientes campos para iniciar sesion</p>
    </div>
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n{input}\n{error}",
            'labelOptions' => ['class' => 'col-lg-3 col-form-label mr-lg-3'],
            'inputOptions' => ['class' => 'col-lg-6 form-control'],
            'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
        ],
    ]); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"col-lg-5 custom-control custom-checkbox\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
        ]) ?>

        <div class="fom-group">
            <div class="offset-lg-7 col-lg-1">
                <?= Html::submitButton('Ingresar', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>

    <!-- <div class="offset-lg-1" style="color:#999;">
        You may login with <strong>admin/admin</strong> or <strong>demo/demo</strong>.<br>
        To modify the username/password, please check out the code <code>app\models\User::$users</code>.
    </div> -->
</div>
