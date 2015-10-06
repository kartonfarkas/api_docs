<?php
function scanDirectories($rootDir, $allowext, $allData=array()) {
  $dirContent = scandir($rootDir);
  foreach($dirContent as $key => $content) {
    $path = $rootDir.'/'.$content;
    $ext = substr($content, strrpos($content, '.') + 1);

    if(in_array($ext, $allowext)) {
      if(is_file($path) && is_readable($path)) {
        $allData[] = $path;
      }
    }
    if(!in_array($content, array('.', '..')) && is_dir($path) && is_readable($path)) {
      $allData = scanDirectories($path, $allowext, $allData);
    }
  }
  return $allData;
}

$files = scanDirectories("source", array("rst"));
foreach($files as $file) {
  $content = file_get_contents($file);
  if (preg_match_all("/ url=https:\/\/documentation\.emarsys\.com(.*)/", $content, $matches)) {
    echo substr($file, 6) . " => " . $matches[1][0] . "\n";
  }
}
?>
