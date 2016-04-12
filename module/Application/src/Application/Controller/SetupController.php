<?php
/**
 * BB's Zend Framework 2 Components
 * 
 * BaseApp
 *
 * @package   [MyApplication]
 * @package   BB's Zend Framework 2 Components
 * @package   BaseApp
 * @author    Björn Bartels <coding@bjoernbartels.earth>
 * @link      https://gitlab.bjoernbartels.earth/groups/zf2
 * @license   http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 * @copyright copyright (c) 2016 Björn Bartels <coding@bjoernbartels.earth>
 */

namespace Application\Controller;

use Zend\Console\Request as ConsoleRequest;
use Zend\View\Model\ViewModel;
use Application\Controller\BaseActionController;
use Application\Model\DbStructUpdater;

class SetupController extends BaseActionController
{
    
    public function onDispatch(\Zend\Mvc\MvcEvent $e)
    {
        $this->setActionTitles(
            array(
            'index' => $this->translate("setup"),
            'install' => $this->translate("install"),
            'update' => $this->translate("update"),
            'updatedb' => $this->translate("update database structure"),
            )
        );
        return parent::onDispatch($e);
    }
    public function indexAction()
    {
        return new ViewModel();
    }
    
    public function installAction()
    {
        return new ViewModel();
    }
    
    public function updateAction()
    {
        return new ViewModel();
    }
    
    public function updatedbAction()
    {

        echo 'update database structure...' . PHP_EOL;
        
        $request = $this->getRequest();
        $db = $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
        $config = $this->getServiceLocator()->get('Config');
        
        // Make sure that we are running in a console and the user has not tricked our
        // application into running this action from a public web server.
        if (!$request instanceof ConsoleRequest) {
            throw new \RuntimeException('You can only use this action from a console!');
        }
        $result = '';

        $only_testing = $request->getParam('test', false);
        $be_verbose = $request->getParam('verbose', false);

        if ($be_verbose) { echo 'current path: ' . getcwd() . PHP_EOL; 
        }
        
        // get tables
        $sql = $db->query("SHOW TABLES;");
        $tables = $sql->execute();
        $tableQueries = array();
        foreach ($tables as $table) { //while ($table = $tables->current()) {
            $tableName = $table["Tables_in_".$config["db"]["database"]];
             // describe tables
            $tableSql = $db->query("SHOW CREATE TABLE `" . $tableName . "`;");
            $tableCreate = $tableSql->execute();
            $tableSpec = $tableCreate->current();
            $tableQueries[] = $tableSpec["Create Table"].";";
        }
        $currentStructure = implode("\n", $tableQueries);
        
        // read INSTALL.SQL
        $filename = getcwd() ."". "/sql/install.sql";
        $installSQL = file_get_contents($filename);
        //file_put_contents(getcwd() ."". "/sql/current.sql", $currentStructure);
        
        // compare SQLs
        try {
            $structureUpdater = new DbStructUpdater();
            $compareResult = $structureUpdater->getUpdates($currentStructure, $installSQL);
            //$compareResult = $structureUpdater->getUpdates($installSQL, $currentStructure);
        } catch (\Exception $ex) {
            echo 'ERROR COMPARING DATABASE STRUCTURE! ' . PHP_EOL;
            if ($be_verbose) { echo 'EXCEPTION: ' . PHP_EOL . print_r($ex, true) . PHP_EOL; 
            }
        }
        if (!is_array($compareResult) || (count($compareResult) < 1) ) {
            echo '...database is up-to-date, no actions needed.' . PHP_EOL;
            return 0;
        }
            
        // transaction(!): update db
        
        if ($only_testing) {
            echo 'testing mode...' . PHP_EOL;
            echo 'detected sql update statements:' . PHP_EOL;
            echo  implode(";\n", $compareResult).";" . PHP_EOL;
        } else {
            try {
                $dbConnection = $db->getDriver()->getConnection();
                $dbConnection->beginTransaction();
                foreach ($compareResult as $updateSql) {
                    if ($be_verbose) { echo 'executing sql: ' . $updateSql . PHP_EOL; 
                    }
                    $dbupdate = $db->query($updateSql);
                    $updateResult = $dbupdate->execute();
                    if ($be_verbose) { echo '...done' . PHP_EOL; 
                    }
                }
                $dbConnection->commit();
            } catch (\Exception $ex) {
                $dbConnection->rollback();
                echo 'ERROR COMPARING DATABASE STRUCTURE! ' . PHP_EOL;
                if ($be_verbose) { echo 'EXCEPTION: ' . PHP_EOL . print_r($ex, true) . PHP_EOL; 
                }
            }
        }
        
        return 0;
    }
}
