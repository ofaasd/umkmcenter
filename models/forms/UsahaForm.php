<?php
	namespace app\models\forms;

	use app\models\Usaha;
	use app\models\Izin;
	use app\models\Pemilik;
	use Yii;
	use yii\base\Model;
	use yii\widgets\ActiveForm;

	class UsahaForm extends Model{
		private $_usaha;
		private $_izin;
		private $_pemilik;
		 public function rules()
	    {
	        return [
	            [['Usaha'], 'required'],
	            [['Izin','Pemilik'], 'safe'],
	        ];
	    }
	    public function afterValidate()
	    {
	        $error = false;
	        if (!$this->pemilik->validate()) {
	            $error = true;
	        }
	        if (!$this->usaha->validate()) {
	            $error = true;
	        }
	        if (!$this->izin->validate()) {
	            $error = true;
	        }
	        if ($error) {
	            $this->addError(null); // add an empty error to prevent saving
	        }
	        parent::afterValidate();
	    }
	    public function save()
	    {
	        if (!$this->validate()) {
	            return false;
	        }
	        $transaction = Yii::$app->db->beginTransaction();
	        if (!$this->pemilik->save()) {
	            $transaction->rollBack();
	            return false;
	        }

	         if (!$this->izin->save()) {
	            $transaction->rollBack();
	            return false;
	        }
	        $this->usaha->pemilik_id = $this->pemilik->id;
	        $this->usaha->izin_id = $this->izin->id;
	        if (!$this->usaha->save(false)) {
	            $transaction->rollBack();
	            return false;
	        }
	        $transaction->commit();
	        return true;
	    }

	    public function errorSummary($form)
	    {
	        $errorLists = [];
	        foreach ($this->getAllModels() as $id => $model) {
	            $errorList = $form->errorSummary($model, [
	                'header' => '<p>Please fix the following errors for <b>' . $id . '</b></p>',
	            ]);
	            $errorList = str_replace('<li></li>', '', $errorList); // remove the empty error
	            $errorLists[] = $errorList;
	        }
	        return implode('', $errorLists);
	    }
	    private function getAllModels()
	    {
	        return [
	            'Usaha' => $this->usaha,
	            'Izin' => $this->Izin,
	            'Pemilik' => $this->Pemilik,
	        ];
	    }
	}
?>