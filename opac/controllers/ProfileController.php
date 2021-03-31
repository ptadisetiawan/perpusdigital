<?php

namespace opac\controllers;

use Yii;
use common\models\Opaclogs;
use common\models\OpaclogsKeyword;
use common\models\Worksheets;
use common\models\Bookinglogs;
use common\models\Favorite;
use common\models\Collections;
use common\models\Catalogs;
use common\models\Requestcatalog;
use common\models\CollectionSearchKardeks;
use common\models\SerialArticlesSearch;
use common\models\Members;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\SqlDataProvider;
use yii\data\ActiveDataProvider;
use yii\web\Session;
use yii\web\Request;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\Json;
use yii\web\NotFoundHttpException;
use common\components\OpacHelpers;
$session = Yii::$app->session;
$session->open();

class ProfileController extends \yii\web\Controller {
    public function actionIndex(){
        // return $_SESSION['__NoAnggota'];
        if(!$_SESSION['__NoAnggota']){
            return $this->redirect(['/']);
        }

        $profileSql = "
        SELECT m.MemberNo, m.FullName, j.jenisanggota, m.EndDate, m.PhotoURL, m.ID
        FROM members m 
        LEFT JOIN jenis_anggota j 
        ON m.JenisAnggota_id = j.id 
        WHERE MemberNo =".$_SESSION['__NoAnggota'];

        $modelProfile = Yii::$app->db->createCommand($profileSql)->queryAll();
        // var_dump($modelProfile);
        return $this->render('index', [
            'modelProfile' => $modelProfile,
            ]);
    }

}