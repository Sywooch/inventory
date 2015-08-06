<?php

namespace app\controllers;

use Yii;
use app\models\Inventory;
use app\models\InventorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use mcms\cart\Cart;
use yii\helpers\Html;
use app\models\Products;
use yii\filters\AccessControl;
use yii\filters\AccessRule;

/**
 * InventoryController implements the CRUD actions for Inventory model.
 */
class InventoryController extends Controller {

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'create', 'update', 'delete'],
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => [''],
                        'allow' => true,
                        'roles' => ['?', '@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Inventory models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new InventorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Inventory model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Inventory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Inventory();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Inventory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Inventory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();


        $models = \app\models\Inventorydetail::find()
                ->where(['inventory_id' => $id])
                ->all();
        foreach ($models as $key) {
            $key->delete();
        }
        Yii::$app->getSession()->setFlash('alert', [
            'body' => 'ลบข้อมูลเรียนร้อยแล้ว..',
            'options' => ['class' => 'alert-success']
        ]);
        return $this->redirect(['index']);
    }

    /**
     * Finds the Inventory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Inventory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Inventory::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionAdd() {
        $model = new Inventory();

        if ($model->load(Yii::$app->request->post())) {
            //return $this->redirect(['success', 'id' => $model->id]);
            $id = Html::encode($model->product_id);
            $arr = Products::findOne(['id' => $id]);

            $cart = new Cart();

            $data = array(
                'id' => Html::encode($model->product_id),
                'qty' => Html::encode($model->qty),
                'price' => Html::encode($model->price),
                'name' => $arr->id
                    //'options' => array('Size' => 'L', 'Color' => 'Red')
            );

            $cart->insert($data);
            return $this->redirect(['create']);
        }
    }

    public function actionCartdel($id) {
        $cart = new Cart();
        $cart->remove($id);
        return $this->redirect(['inventory/create']);
    }

    public function actionProcess_in() {
        $model = new Inventory();
        return $this->render('product_in', [
                    'model' => $model,
        ]);
    }

    public function actionProcess() {

        $model = new Inventory();
        if ($model->load(Yii::$app->request->post())) {
            $model->bill_no = $model->bill_no;
            $model->inventory = 'i';
            $model->save();
            $cart = new Cart();
            foreach ($cart->contents() as $items) {
                $detail = new \app\models\Inventorydetail();
                $detail->load(Yii::$app->request->post());
                $detail->inventory_id = $model->id;
                $detail->product_id = $items['id'];
                $detail->qty = $items['qty'];
                $detail->price = $items['price'];
                $product = Products::findOne($items['id']);
                echo $product->qty = $items['qty'];
                $product->save();
                $detail->save();
            }


            $cart->destroy();
            return $this->redirect(['inventory/index']);
        }
    }

    public function actionItemdelete() {
        $cart = new Cart();
        $cart->destroy();
        return $this->redirect(['create']);
    }

}
