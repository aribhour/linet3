<?php
/***********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/

class InstallConfig extends CFormModel {

    public $dbtype = 'sqlite';
    public $dbname = 'linet';
    public $dbuser = 'root';
    public $dbpassword = 'linet';
    public $dbhost = 'localhost';
    public $dbstring = 'mysql:protected/linet';

    
    public function attributeLabels() {
        return array(
            'dbtype' => Yii::t('app', 'Dbtype'),
            'dbname' => Yii::t('app', 'Dbname'),
            'dbuser' => Yii::t('app', 'Dbuser'),
            'dbpassword' => Yii::t('app', 'Dbpassword'),
            'dbhost' => Yii::t('app', 'Dbhost'),
            'dbstring' => Yii::t('app', 'Dbstring'),

        );
    }
    
    
    public function make() {
        //make conf file
        //echo $this->dbtype;
        //Yii::$app->end();

        if ($this->dbtype == 'sqlite') {
            $str = "'connectionString' => '" . $this->dbstring . "',";
        } else {
            $str = "'connectionString' => '" . $this->dbstring . "',
                        'username' => '" . $this->dbuser . "',
                        'password' => '" . $this->dbpassword . "',";
        }

        $new = include('protected/data/config.php');
        $new = str_replace("<placeholder>", $str, $new);

        $handle = fopen('protected/config/install.php', 'w');
        fwrite($handle, $new);
        fclose($handle);
        if (!is_dir("protected/files/")) {
            mkdir("protected/files/");
        }
        //make main db
        return $this->makeDB();
    }

    private function makeDB() {
        try {

            //echo $this->dbstring . "|" . $this->dbuser . "|" . $this->dbpassword;

            Yii::$app->setComponent('dbTemp', array(
                'class' => 'CDbConnection',
                'connectionString' => $this->dbstring,
                'username' => $this->dbuser,
                'password' => $this->dbpassword,
                'emulatePrepare' => true,
                'charset' => 'utf8',
                'tablePrefix' => '',
                    )
            );




            $master = new dbMaster();
            $master->loadFile("protected/data/main.sql");
            //$master->loadFile("protected/data/main-data.sql");
        } catch (\yii\db\Exception $e) {
            $message = $e->getMessage();
            echo "Crash and Burn:";
            echo "<br>" . $message;
            exit;
        }
        return true;
    }

    public function rules() {
        return array(
            array('dbhost, dbpassword, dbuser, dbname, dbtype, dbstring', 'safe'),
                //array('type', 'required'),
        );
    }

}
