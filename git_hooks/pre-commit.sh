#!/usr/bin/php
<?php
echo PHP_EOL;

// output a little introduction
echo '>> Starting unit tests' . PHP_EOL;

// get the name for this project; probably the topmost folder name
$curDir = getcwd();
$projectName = basename(getcwd());
//echo 'Running from path:'.$curDir;

// execute unit tests (it is assumed that a phpunit.xml configuration is present 
// in the root of the project)
exec('phpunit -v -c '.$curDir.'/resources/phpunit_config.xml', $output, $returnCode);

// if the build failed, output a summary and fail
if ($returnCode !== 0) {
	$testFailures = "";
	$startCopy = false;

    // find the line with the summary; this might not be the last
    while (($curLine = array_pop($output)) !== null) {
        if (strpos($curLine, 'Tests:') !== false) {
            $minimalTestSummary = $curLine;
			$startCopy = true;
        }
		
		if($startCopy) {
			$testFailures = $curLine.PHP_EOL.$testFailures;
			
			if(strpos($curLine, 'There was') !== false) {
				break;
			}
		}
    }

    // output the status
    echo '>> Test suite for ' . $projectName . ' failed:' . PHP_EOL;
    echo $testFailures;
	//echo $minimalTestSummary;
    echo chr(27) . '[0m' . PHP_EOL; // disable colors and add a line break
    echo PHP_EOL;

    // abort the commit
    exit(1);
}

echo '>> All tests for ' . $projectName . ' passed.' . PHP_EOL;
echo PHP_EOL;

echo '>> Copying test results to remote server'.PHP_EOL;
exec('scp -r ./test jim@10.10.102.211:/var/www', $output, $returnCode);
if ($returnCode !== 0) {
	echo '>> Failed to copy test results to remote server'.PHP_EOL;
	exit(1);
}

exit(0);