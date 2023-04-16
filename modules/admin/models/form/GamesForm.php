<?php

namespace app\modules\admin\models\form;

use app\libs\helpers\CustomStringHelper;
use app\models\table\GamesTable;
use Yii;
use yii\base\Model;

/**
 * Class GamesForm
 * @package app\modules\admin\models\form
 */

class GamesForm extends Model
{
    public $id;
    public $image_file;
    public $name;
    public $image;
    public $status;

    public function rules()
    {
        return [
            [['name', 'image', 'status'], 'required', 'message' => '{attribute} tidak boleh kosong'],
            [['name', 'image', 'status'], 'string', 'max' => 255, 'tooLong' => '{attribute} terlalu panjang', 'message' => '{attribute} tidak valid'],
            [['image_file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg', 'maxSize' => 1024 * 1024 * 25, 'maxFiles' => 1, 'tooBig' => 'Ukuran file terlalu besar', 'tooMany' => 'Maksimal 1 file', 'wrongExtension' => 'Ekstensi file tidak diizinkan'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'image' => 'Image',
            'status' => 'Status',
        ];
    }

    public function addGames()
    {
        if (!$this->hasErrors()) {

            try {
                $model = new GamesTable();
                $model->name = $this->name;
                $model->image = $this->image;
                $model->status = $this->status;

                // upload brand logo to server
                if ($this->image_file) {
                    $fileName =  CustomStringHelper::generateRandomString(20) . rand(0, 9999) . '.' . $this->image_file->extension;
                    $filePath = Yii::getAlias('@app') . '/files/games/' . $fileName;
                    $model->image = $filePath;
                    $this->image_file->saveAs($filePath);
                }

                return $model->save(false);
            } catch (\Throwable $th) {
                throw $th;
            }
        }
        return false;
    }

    public function updateGames()
    {
        if (!$this->hasErrors()) {

            try {
                $model = GamesTable::findOne(['id' => $this->id]);
                $model->name = $this->name;
                $model->image = $this->image;
                $model->status = $this->status;

                return $model->save();
            } catch (\Throwable $th) {
                throw $th;
            }
        }
    }
}
