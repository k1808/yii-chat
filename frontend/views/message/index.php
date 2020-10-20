<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\MessageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $message */
/* @var $user */

$this->title = 'Messages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="message-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Message', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                    'label' => 'User',
                    'attribute' => 'user_id',
                    'value' => function ($data) {
                        return $data->user->username;
                    },
                    'filter'=>ArrayHelper::map($user, 'id', 'username')
            ],

            'messages:ntext',
            'creation_time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
<div class="message-form">

    <?php $form = ActiveForm::begin(['action'=>'create', 'method'=>'post']); ?>

    <?= $form->field($message, 'messages')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>