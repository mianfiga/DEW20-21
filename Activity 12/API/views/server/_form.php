<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $model app\models\Server */
/* @var $form yii\widgets\ActiveForm */
?>

<?php 
    $dataProvider = new ActiveDataProvider([
        'query' => $service->getServers(),
    ]);

    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'URL:url',
        ],
    ]);
?>

<div class="server-form">

    <?php $form = ActiveForm::begin(); ?>
    


    <?php //$form->field($model, 'service_id')->textInput() ?>

    <?= $form->field($model, 'URL')->textInput(['maxlength' => true]) ?>

   

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Get API'),['service/view', 'id' => $service->id], ['class' => 'btn btn-warning']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
