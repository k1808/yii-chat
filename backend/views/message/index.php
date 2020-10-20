<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\MessageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Messages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="message-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Message', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions'=>function ($model, $key, $index, $grid){
          $class='';
          if($model->disabled === 0){
              $class = 'msg-disabled';
          }
          return [
            'key'=>$key,
            'index'=>$index,
            'class'=>$class
          ];
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'creation_time',
            'user_id',
            [
                    'attribute'=> 'disabled',
                    'value'=> function($data){
                        if($data->disabled == 1){
                            return 'active';
                        }
                        return 'disabled';
                    },
                    'filter' =>[0=>'disabled', 1=>'active'],
            ],

            'messages:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
