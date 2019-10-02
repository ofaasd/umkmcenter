<?php
	namespace app\helpers;

	class Helpers{
		public static function getOmset($usaha_id,$bulan,$tahun){
			$sql = "select omset from omset where usaha_id=" . $usaha_id . " and bulan=" . $bulan . " and tahun=" . $tahun;
			$omset = (new \yii\db\Query())
					->select("id,omset")
					->from("omset")
					->where(['usaha_id'=>$usaha_id, 'bulan'=>$bulan, 'tahun'=>$tahun])
					->one();
			$simpan = array();
			$simpan[$omset['id']] = (empty($omset['omset']))?0:$omset['omset'];
			
			return $simpan;
			//$hasil = Yii::$app->db->createCommand($sql)->
		}
	}
?>