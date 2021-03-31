<?php



/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\web\Session;
use common\components\DirectoryHelpers;
$session = Yii::$app->session;
$this->title = 'Perpustakaan Provinsi Bali';
$homeUrl=Yii::$app->homeUrl;
$rootPath=\Yii::$app->basePath;
?>

<div class="container">
  <div class="row">
    <div class="col col-md-12">
      <h3>Semua Koleksi</h3>
    </div>
    <?php 
    for($i=0;$i<count($modelAll);$i++){
        $urlcover;
       if($modelAll[$i]['CoverURL'])
       {
          
            if(file_exists(Yii::getAlias('@uploaded_files/sampul_koleksi/original/'.DirectoryHelpers::GetDirWorksheet($modelAll[$i]['worksheet_id']).'/'.$modelAll[$i]['CoverURL'])))
           {
             $urlcover= '../uploaded_files/sampul_koleksi/original/'.DirectoryHelpers::GetDirWorksheet($modelAll[$i]['worksheet_id']).'/'.$modelAll[$i]['CoverURL'];
           }else
           {
             $urlcover= '../uploaded_files/sampul_koleksi/original/Monograf/tdkada.gif';
           }
       }else{
           $urlcover= '../uploaded_files/sampul_koleksi/original/Monograf/tdkada.gif';
       }



     

       if(strlen($modelAll[$i]['Title'])>=100){
         $potongkata=substr($modelAll[$i]['Title'],0,100);
         $modelAll[$i]['Title']=$potongkata."....";
       }
    ?>

      <div class="col col-md-4 col-sm-6 col-xs-6">
      <a href="<?= $homeUrl . 'detail-opac?id=' . $modelAll[$i]['ID'] ?>">
          <div style="background-color: #FFFFFF;" class="panel panel-default">
            <div class="panel-body">
                <img src="<?=  $urlcover ?>" width="100%" alt="">
                <br>
                <hr>
                <h4><?= $modelAll[$i]['Title'] ?></h4>
            </div>
          </div>
        </a>
      </div>
    <?php 
    }
    ?>
  </div>
</div>