<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Employee;

class EmployeeController extends Controller
{

    public function actionRegister(){

        $model = new Employee();
        $model ->scenario = Employee::SCENARIO_EMPLOYEE_REGISTER;

        $formData = Yii::$app->request->post();

        if (Yii:: $app->request->isPost) {

            $model->attributes = $formData;
            if ($model-> validate() && $model -> save()){
                Yii::$app->session->setFlash('success', 'Registered successfully');
            }


        }
        return $this->render('register', ['model' => $model]);
    }

    public function actionUpdate(){

        $model = new Employee();
        $model->scenario = Employee::SCENARIO_EMPLOYEE_UPDATE;

        $formData = Yii::$app->request->post();

        if (Yii:: $app->request->isPost) {

            $model->attributes = $formData;

            $id = $formData["id"];

            if ($model->validate()) {
                Yii::$app->session->setFlash('success', 'Update successfully');
                $sql = "UPDATE `employee` 
        SET `first_name` = '{$model->firstName}', 
            `last_name` = '{$model->lastName}', 
            `middle_name` = '{$model->middleName}', 
            `email` = '{$model->email}'  
        WHERE `employee`.`id` = $id;";
                return Yii::$app->db->createCommand($sql)->execute();
            }
        }
        return $this->render('update', ['model' => $model ]);
    }

}