<?php

namespace backend\controllers;

use backend\models\Addresses;
use backend\models\Parents;
use backend\models\Students;
use backend\models\Teachers;
use Yii;
use common\models\User;
use common\models\UserSearch;
use backend\models\UserDetails;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['delete', 'password', 'view', 'create', 'index', 'update'],
                        'allow' => true,
                        'roles' => ['superadmin']
                    ],
                    [
                        'actions' => ['view', 'create', 'index', 'update'],
                        'allow' => true,
                        'roles' => ['officeadmin']
                    ],
                    [
                        'actions' => ['password'],
                        'allow' => true,
                        'roles' => ['@']
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $id = Yii::$app->util->decrypt($id);
        $model = $this->findModel($id);
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();
        $userDetails = new UserDetails();
        $teacherModel = new Teachers();
        $parentsModel = new Parents();
        $studentModel = new Students();
        if ($model->isNewRecord === true) {
            $model->created_at = date('Y-m-d H:i:s');
            $model->created_by = Yii::$app->user->getId();
        }

        if ($model->load(Yii::$app->request->post())) {
            $transaction = Yii::$app->db->beginTransaction();
            $password = $model->password_hash;
            $model->setPassword($password);
            $model->generateAuthKey();
            $model->username = trim($model->email);
            $model->email = trim($model->email);
            if ($model->save()) {
                $userDetails->load(Yii::$app->request->post());
                $user_type = $userDetails->user_type_id;
                switch ($user_type) {
                    case 1:
                        $role = 'superadmin';
                        break;
                    case 2:
                        $role = 'officeadmin';
                        break;
                    case 3:
                        $role = 'employee';
                        break;
                    case 4:
                        $role = 'teacher';
                        break;
                    case 5:
                        $role = 'student';
                        break;
                    case 6:
                        $role = 'guardian';
                        break;
                }
                $userRole = \Yii::$app->authManager->getRole($role);
                \Yii::$app->authManager->assign($userRole, $model->id);
                $fld = str_pad($model->id, 5, "00", STR_PAD_LEFT);
                $path = Yii::getAlias('@backend') . "/web/uploads/users/" . $fld;
                if (!is_dir($path)) {
                    mkdir($path, 0755, true);
                }
                $file = UploadedFile::getInstance($userDetails, 'image');
                $path = Yii::getAlias('@backend') . "/web/uploads/users/" . $fld . "/" . $file->baseName . '.' . $file->extension;
                if ($file->saveAs($path)) {
                    $file_path = "uploads/users/" . $fld . "/" . $file;
                    $userDetails->user_id = $model->id;
                    $dateofbirth = date_create($userDetails->dob);
                    $dateofbirth = date_format($dateofbirth, "Y-m-d");
                    $userDetails->dob = $dateofbirth;
                    $userDetails->image = $file_path;
                    if ($userDetails->save()) {
                        if ($user_type = 4) {
                            $teacherModel->load(Yii::$app->request->post());
                            $teacherModel->user_id = $model->id;
                            $joinDate = date_create($teacherModel->join_date);
                            $joinDate = date_format($joinDate, "Y-m-d");
                            $teacherModel->join_date = $joinDate;
                            if ($teacherModel->save()) {
                                $transaction->commit();
                                Yii::$app->session->setFlash('success', Yii::t('app', "User Saved Successfully!"));
                                return $this->redirect(['index']);
                            }
                        }
                        if ($user_type = 6) {
                            $parentsModel->load(Yii::$app->request->post());
                            $parentsModel->user_id = $model->id;
                            if ($parentsModel->save()) {
                                $transaction->commit();
                                Yii::$app->session->setFlash('success', Yii::t('app', "User Saved Successfully!"));
                                return $this->redirect(['index']);
                            }
                        }
                        $transaction->commit();
                        Yii::$app->session->setFlash('success', Yii::t('app', "User Saved Successfully!"));
                        return $this->redirect(['index']);
                    }
                }
            }
        }

        return $this->render('create', [
            'model' => $model,
            'userDetails' => $userDetails,
            'teacherModel' => $teacherModel,
            'parentsModel' => $parentsModel,
            'studentModel' => $studentModel,

        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $id = Yii::$app->util->decrypt($id);
        $model = $this->findModel($id);
        $userDetails = $model->userDetail;
        $transaction = Yii::$app->db->beginTransaction();
        if ($model->load(Yii::$app->request->post())) {
            $model->updated_at = date('Y-m-d H:i:s');
            $model->updated_by = Yii::$app->user->getId();
            if ($model->save()) {
                $userDetails->load(Yii::$app->request->post());
            }
            $transaction->commit();
            Yii::$app->session->setFlash('success', Yii::t('app', "User Updated Successfully!"));
            return $this->redirect(['index']);

        }

        return $this->render('update', [
            'model' => $model,
            'userDetails' => $userDetails,
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionPassword($id)
    {
        $id = Yii::$app->util->decrypt($id);
        $loginUser = Yii::$app->user->getId();
        $loginRole = Yii::$app->util->getRole();
        if ($loginUser === $id || $loginRole->name === 'superadmin') {
            $model = $this->findModel($id);
            $model->scenario = 'password';
            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                $transaction = Yii::$app->db->beginTransaction();
                $password = $model->password;
                $model->setPassword($password);
                if ($model->save()) {
                    $transaction->commit();
                    Yii::$app->session->setFlash('success', Yii::t('app', "Password changed successfully!"));
                    return $this->redirect(['index']);
                }$model->getErrors();

            } else {
                return $this->render('password', [
                    'model' => $model,
                ]);
            }
        } else {
            echo 'You are not authorized for this action!';
        }
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

}
