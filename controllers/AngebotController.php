<?php

namespace app\controllers;

use app\services\CalenderService;
use app\services\RandomLinkService;
use Yii;
use app\models\Angebot;
use app\models\AngebotSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * AngebotController implements the CRUD actions for Angebot model.
 */
class AngebotController extends Controller
{
    private $randomLinkService;
    private $calenderService;

    public function __construct($id, $module, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->randomLinkService = new RandomLinkService();
        $this->calenderService = new CalenderService();
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Angebot models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AngebotSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Angebot model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Angebot model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Angebot();


        $this->fileAndLinkAutomation($model);

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Angebot model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {

        $model = $this->findModel($id);
        $this->fileAndLinkAutomation($model);

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    private function fileAndLinkAutomation($model){
        if($model->load(Yii::$app->request->post())){
            $previousFile =  $model->visual;
            $model->file = UploadedFile::getInstance($model, 'file');
            $fileDirectory = 'angebotVisuals/'. $model->name . '_' . $model->file->baseName . '.' . $model->file->extension;
            $model->file->saveAs($fileDirectory);
            $model->visual = $fileDirectory;
            if(!empty($previousFile)){
                if($previousFile !== $fileDirectory){
                    unlink(Yii::$app->basePath . '/web/' . $previousFile);
                }
            }
            if(empty($model->detail_link)){
                $model->detail_link = $this->randomLinkService->randomUselessWebsite();
            }
            if(empty($model->kalender_woche)){
                $model->detail_link = $this->calenderService->getCurrentCalenderWeek();
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }
    }

    /**
     * Deletes an existing Angebot model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        unlink(Yii::$app->basePath . '/web/' . $model->visual);
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Angebot model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Angebot the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Angebot::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
