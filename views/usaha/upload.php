<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\modules\user\helpers\Timezone;
use kartik\file\FileInput;
use yii\bootstrap4\Modal;
use app\helpers\Helpers;
use rmrevin\yii\fontawesome\FAS;
use yii\web\view;


/* @var $this yii\web\View */
/* @var $model app\models\Usaha */

$this->title = 'Upload Gambar Produk';
$this->params['breadcrumbs'][] = ['label' => 'Usahas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .pp .col-md-4 img{
        width:100%;
    }
    .col-md-4{
    	margin-top:10px;
    	margin-bottom:10px;
    }
</style>
<div class="usaha-upload">
	
	<h1><?= Html::encode($this->title) ?></h1>
	<form method="POST" action="">
		<?php
            Modal::begin([
                'id'=>'myModal',
                'title'=>'Upload Photo',
                'toggleButton' => [
                    'label'=>'Ganti Photo', 'class'=>'btn btn-default'
                ],
            ]);
            $form1 = ActiveForm::begin([
                'options'=>['enctype'=>'multipart/form-data'],
                
            ]);
            echo FileInput::widget(
                [
                    'name'=>'image',
                    'pluginOptions' => [
                        'uploadUrl' => Url::to(['/usaha/uploadimg','id'=>$model->id]),
                        'maxFileCount' => 1
                    ]
                ]
                );
            ActiveForm::end();
            Modal::end();
        ?>
	</form>
	<br /><hr /><br />
	<div class="pp">
		<div class="row">
			<?php
		        echo newerton\fancybox3\FancyBox::widget();
		        $image = Helpers::getUsahaPhoto($model->id);
		        
	        	foreach($image as $row){
	        		echo '<div class="col-md-4">';
	            	//panggil foto dengan efek fancy
		            echo yii\helpers\Html::a(yii\helpers\Html::img(Url::base() . "/asset/upload/usaha/" . $row['photo']), Url::base() . "/asset/upload/usaha/" . $row['photo'], ['data-fancybox' => true]);
                    echo yii\helpers\Html::a(FAS::icon("trash"),Url::to(['/usaha/deleteimg','id'=>$row['id']]));
		            //echo "<img src='" . Url::base() . "/asset/upload/profile/" . $gambar['file'] . "' width='100'>" ;
		            echo "</div>";
	            }
		    ?>
		</div>
	</div>
</div>
<?php
    $script = "
    $('#myModal').on('hide.bs.modal', function (e) {
        $.get(\"" . Url::to(['/usaha/refreshimg','id'=>$model->id]) . "\",function(data){
            $(\".pp > .row\").html('<div class=\"col-md-4\">'+data+'</div>');
        });
    });";
$this->registerJS($script, View::POS_END);
?>