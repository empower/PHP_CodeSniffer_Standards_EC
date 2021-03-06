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
    'ignore'            => array('generatePackage.php'),
    'dir_roles' => array(
        'PHP'           => 'php',
        'tests'         => 'test',
        'documentation' => 'doc'
    ),
));

$packagexml->setPackage('PHP_CodeSniffer_Standards_EC');
$packagexml->setSummary('Empower Campaigns coding standards implementation using PHP_CodeSniffer');
$packagexml->setDescription('The PHP_CodeSniffer implementation of the EC coding standard');

$packagexml->setChannel('empower.github.com/pirum');
$packagexml->setAPIVersion('0.5.0');
$packagexml->setReleaseVersion('0.5.0');

$packagexml->setReleaseStability('alpha');

$packagexml->setAPIStability('alpha');

$packagexml->setNotes('* Added phpcs rule for lowercase true, false, and null to EC standard');
$packagexml->setPackageType('php');
$packagexml->addRelease();

$packagexml->detectDependencies();

$packagexml->addMaintainer('lead',
                           'shupp',
                           'Bill Shupp',
                           'bshupp@empowercampaigns.com');

$packagexml->setLicense('New BSD License',
                        'http://www.opensource.org/licenses/bsd-license.php');

$packagexml->setPhpDep('5.1.2');
$packagexml->setPearinstallerDep('1.4.0b1');
$packagexml->addPackageDepWithChannel('required', 'PHP_CodeSniffer', 'pear.php.net', '1.3.0RC1');

$packagexml->generateContents();
$packagexml->writePackageFile();

?>
