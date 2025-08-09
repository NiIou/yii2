<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

class Employee extends Model
{
    const SCENARIO_EMPLOYEE_REGISTER = 'employee_register';
    const SCENARIO_EMPLOYEE_UPDATE = 'employee_update';

    public $id;
    public $firstName;
    public $lastName;
    public $middleName;
    public $email;

    public function scenarios()
    {
        return [


            self::SCENARIO_EMPLOYEE_REGISTER => ['firstName', 'lastName', 'middleName', 'email',],
            self::SCENARIO_EMPLOYEE_UPDATE => ['firstName', 'lastName', 'middleName', 'id'],
        ];
    }
    public function rules(){

        return [

            [['firstName', 'lastName', 'email'], 'required'],
            [['lastName'], 'string', 'min'=>3],
            [['firstName'], 'string', 'min'=>2],
            [['email'], 'email'],
            [['middleName'], 'required', 'on' => self::SCENARIO_EMPLOYEE_UPDATE],
            [['id'], 'required'],
        ];
    }
    public function save(){
        $sql = "INSERT INTO employee (id, first_name, last_name, middle_name, email) VALUES(null, '{$this->firstName}', '{$this->lastName}', '{$this->middleName}', '{$this->email}');}";
        return Yii::$app->db->createCommand($sql)->execute();
    }

}