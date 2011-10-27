<?php

error_reporting(E_ALL & ~E_DEPRECATED);

require_once('PEAR/PackageFileManager2.php');

PEAR::setErrorHandling(PEAR_ERROR_DIE);

$packagexml = new PEAR_PackageFileManager2;

$packagexml->setOptions(array(
    'baseinstalldir'    => '/',
    'simpleoutput'      => true,
    'packagedirectory'  => './',
    'filelistgenerator' => 'file',
    'ignore'            => array(
        'generatePackage.php',
        'phpunit.xml',
        'phpunit-bootstrap.php',
        'coverage/'
    ),
    'dir_roles' => array(
        'tests'     => 'test',
        'example'  => 'doc'
    ),
    'exceptions' => array(
        'LICENSE' => 'doc',
    ),
));

$packagexml->setPackage('Noginn_RateLimit');
$packagexml->setSummary('A simple rate limiting component for the Zend Framework');
$packagexml->setDescription('This is the empower fork of the project');

$packagexml->setChannel('empower.github.com/pirum');
$packagexml->setAPIVersion('0.1.2');
$packagexml->setReleaseVersion('0.1.2');

$packagexml->setReleaseStability('alpha');

$packagexml->setAPIStability('alpha');

$packagexml->setNotes('
* Updated ZF dependency again
');
$packagexml->setPackageType('php');
$packagexml->addRelease();

$packagexml->detectDependencies();

$packagexml->addMaintainer('lead',
                           'shupp',
                           'Bill Shupp',
                           'hostmaster@shupp.org');

$packagexml->setLicense('MIT License',
                        'http://www.opensource.org/licenses/mit-license.php');

$packagexml->setPhpDep('5.0.0');
$packagexml->setPearinstallerDep('1.4.0b1');
$packagexml->addPackageDepWithChannel('required', 'Zend', 'empower.github.com/pirum', '1.11.11');

$packagexml->generateContents();
$packagexml->writePackageFile();

?>
