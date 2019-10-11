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
            if (strpos($path, '.blade.php') !== false) {
                $fileName = str_replace(base_path('resources/views/'), '', str_replace('.blade.php', '', $path));
                
                $lessons[] = [
                    "view" => str_replace('/', '.', $fileName),
                    "label" => basename($fileName)
                ];
            }
        }

        return view('lessons.index')->with(['lessons' => $lessons]);
    }

    public function show($viewName)
    {
        return view($viewName);
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
