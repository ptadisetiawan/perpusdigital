<?php

namespace backend\modules\setting\umum\controllers;

use Yii;

use yii\base\DynamicModel;
use yii\web\UploadedFile;

class DataPerpustakaanController extends \yii\web\Controller
{

    public function actionIndex()
    {

        $model = new DynamicModel([
            'NamaPerpustakaan',
            //'NamaLokasiPerpustakaan',
            'JenisPerpustakaan',
            'IsUseKop',
            'logo',
            'kop',


        ]);
        $model->addRule([
            'NamaPerpustakaan',
            //'NamaLokasiPerpustakaan',
            'JenisPerpustakaan', 'IsUseKop',], 'required'
        );

        $model->NamaPerpustakaan = Yii::$app->config->get('NamaPerpustakaan');
        // $model->NamaLokasiPerpustakaan = Yii::$app->config->get('NamaLokasiPerpustakaan');

        $model->JenisPerpustakaan = Yii::$app->config->get('JenisPerpustakaan');
        $model->IsUseKop = Yii::$app->config->get('IsUseKop');


        if ($model->load(Yii::$app->request->post())) {
            $model->logo = UploadedFile::getInstance($model, 'logo');
            $model->kop = UploadedFile::getInstance($model, 'kop');
            if ($model->validate()) {
                if ($model->logo == "" && $model->kop == "") {
                    goto tidak;
                } else if ($model->logo == "") {
                    $model->kop->saveAs('../uploaded_files/aplikasi/' . "kop" . '.' . "png");
                } else if ($model->kop == "") {
                    $model->logo->saveAs('../uploaded_files/aplikasi/' . "logo_perpusnas_2015" . '.' . "png");
                } else {
                    $model->logo->saveAs('../uploaded_files/aplikasi/' . "logo_perpusnas_2015" . '.' . "png");
                    $model->kop->saveAs('../uploaded_files/aplikasi/' . "kop" . '.' . "png");
                }
                tidak:
                Yii::$app->config->set('NamaPerpustakaan', Yii::$app->request->post('DynamicModel')['NamaPerpustakaan']);
                //Yii::$app->config->set('NamaLokasiPerpustakaan', Yii::$app->request->post('DynamicModel')['NamaLokasiPerpustakaan']);
                Yii::$app->config->set('JenisPerpustakaan', Yii::$app->request->post('DynamicModel')['JenisPerpustakaan']);
                Yii::$app->config->set('IsUseKop', Yii::$app->request->post('DynamicModel')['IsUseKop']);


                Yii::$app->getSession()->setFlash('success', [
                    'type' => 'info',
                    'duration' => 500,
                    'icon' => 'fa fa-info-circle',
                    'message' => Yii::t('app', 'Success Save'),
                    'title' => 'Info',
                    'positonY' => Yii::$app->params['flashMessagePositionY'],
                    'positonX' => Yii::$app->params['flashMessagePositionX']
                ]);
            } else {

                Yii::$app->getSession()->setFlash('error', [
                    'type' => 'error',
                    'duration' => 500,
                    'icon' => 'fa fa-info-circle',
                    'message' => Yii::t('app', 'Error Save'),
                    'title' => 'Info',
                    'positonY' => Yii::$app->params['flashMessagePositionY'],
                    'positonX' => Yii::$app->params['flashMessagePositionX']
                ]);
            }
            return $this->redirect(['index']);
        } else {
            return $this->render('index', [
                'model' => $model,]);
        }
    }

}