<?php

namespace app\controllers;

use app\models\Angebot;
use app\models\AngebotSearch;
use app\services\CalenderService;
use app\services\RandomLinkService;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
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

    // automates value generation for some fields if they were left open from the user

    private function fileAndLinkAutomation($model)
    {
        if ($model->load(Yii::$app->request->post())) {
            $previousFile = $model->visual;
            $model->file = UploadedFile::getInstance($model, 'file');
            if (!empty($model->file)) {

                // saves visual in directory angebotsVisuals under the web folder
                $fileDirectory = 'angebotVisuals/' . $model->name . '_' . $model->file->baseName . '.' . $model->file->extension;
                $model->file->saveAs($fileDirectory);
                $model->visual = '@web/' . $fileDirectory;

                //deletes previous file if user updates the visual with new one
                if ($previousFile !== $fileDirectory && !empty($previousFile)) {
                    if (str_contains($previousFile, 'angebotVisuals')) {
                        unlink(Yii::$app->basePath . '/' . substr($previousFile, 1));
                    }
                }
            } else {

                //uses previous file if not a new one was assigned on update, else if field kept empty on creation
                //placeholderImage will be assigned
                if (!empty($previousFile)) {
                    $model->visual = $previousFile;
                } else {
                    $model->visual = $this->randomLinkService->getPlaceholderImage();
                }
            }
            // assigns currentCalenderWeek when the user had not assigned one himself
            if (empty($model->kalender_woche)) {
                $model->kalender_woche = $this->calenderService->getCurrentCalenderWeek();
            }
            // assigns randomUselessWebsite when the user had not assigned one himself
            if (empty($model->detail_link)) {
                $model->detail_link = $this->randomLinkService->randomUselessWebsite();
            }

            $model->file = null;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return null;
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
        // deletes visual file on deletion of the model, if the file even exists
        if (str_contains($model->visual, 'angebotVisuals')) {
            $fileName = Yii::$app->basePath . '/' . substr($model->visual, 1);
            if (file_exists($fileName)) {
                unlink(Yii::$app->basePath . '/' . substr($model->visual, 1));
            }
        }
        $model->delete();

        return $this->redirect(['index']);
    }
}
