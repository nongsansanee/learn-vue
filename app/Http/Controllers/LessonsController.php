<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LessonsController extends Controller
{
    public function index()
    {
        $files = $this->getDirContents(base_path('resources/views/lessons'));
        $lessons = [];
        foreach ($files as $path) {
            $path = str_replace('\\', '/', $path);
            if (strpos($path, '.blade.php') !== false) {
                $basePath = str_replace('\\', '/', base_path('resources/views/'));
                $fileName = str_replace($basePath, '', str_replace('.blade.php', '', $path));

                $baseName = basename($fileName);

                $lessons[] = [
                    "view" => str_replace('/', '=>', $fileName),
                    "label" => strpos($baseName, '=') === false ? $baseName : explode('=', $baseName)[1]
                ];
            }
        }

        return view('lessons/index')->with(['lessons' => $lessons]);
    }

    public function show($viewName)
    {
        return view(str_replace('=>', '.', $viewName));
    }

    protected function getDirContents($dir, &$results = array()){
        $files = scandir($dir);

        foreach($files as $key => $value){
            $path = realpath($dir.DIRECTORY_SEPARATOR.$value);
            if(!is_dir($path)) {
                $results[] = $path; // basename($path);
            } else if($value != "." && $value != "..") {
                $this->getDirContents($path, $results);
            }
        }

        return $results;
    }
}
