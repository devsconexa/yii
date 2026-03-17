<?php
/**
 * This file contains the CTestCase class.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @link https://www.yiiframework.com/
 * @copyright 2008-2013 Yii Software LLC
 * @license https://www.yiiframework.com/license/
 */

if(!class_exists('PHPUnit_Runner_Version')) {
    if (file_exists(__DIR__ . '/../../vendor/phpunit/phpunit/src/Runner/Version.php')) {
        require_once(__DIR__ . '/../../vendor/phpunit/phpunit/src/Runner/Version.php');
    } elseif (stream_resolve_include_path('PHPUnit/Runner/Version.php')) {
        require_once('PHPUnit/Runner/Version.php');
    }

    if (file_exists(__DIR__ . '/../../vendor/phpunit/phpunit/src/Util/Filesystem.php')) {
        require_once(__DIR__ . '/../../vendor/phpunit/phpunit/src/Util/Filesystem.php');
    } elseif (stream_resolve_include_path('PHPUnit/Runner/Version.php')) {
        require_once('PHPUnit/Runner/Version.php');
    }

	spl_autoload_unregister(array('YiiBase','autoload'));

    if (file_exists(__DIR__ . '/../../vendor/autoload.php')) {
        require_once(__DIR__ . '/../../vendor/autoload.php');
    } elseif (stream_resolve_include_path('PHPUnit/Autoload.php')) {
        // Fallback para PHPUnit antigo
        require_once('PHPUnit/Autoload.php');
    } else {
        trigger_error('Nenhum autoloader PHPUnit encontrado (Composer ou legado).', E_USER_WARNING);
    }

	spl_autoload_register(array('YiiBase','autoload')); // put yii's autoloader at the end

	if (in_array('phpunit_autoload', spl_autoload_functions())) { // PHPUnit >= 3.7 'phpunit_autoload' was obsoleted
		spl_autoload_unregister('phpunit_autoload');
		Yii::registerAutoloader('phpunit_autoload');
	}
}

use \PHPUnit\Framework\TestCase;

/**
 * CTestCase is the base class for all test case classes.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @package system.test
 * @since 1.1
 */
abstract class CTestCase extends TestCase
{
}
