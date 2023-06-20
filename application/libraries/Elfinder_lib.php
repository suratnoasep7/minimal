<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

include_once 'elfinder/elFinderConnector.class.php';
include_once 'elfinder/elFinder.class.php';
include_once 'elfinder/elFinderVolumeDriver.class.php';
include_once 'elfinder/elFinderVolumeLocalFileSystem.class.php';

class Elfinder_lib
{
    public function __construct($opts)
    {
        // //for this part see the documentation
        $connector = new elFinderConnector(new elFinder($opts));
        $connector->run();
    }
}
