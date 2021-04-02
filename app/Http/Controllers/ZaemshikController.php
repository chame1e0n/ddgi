<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ZaemshikController extends Controller
{
    public function download_db()
    {
        $user = "root";
        $password = "root";
        $host = "localhost";
        $db_name = "ddgi2";
        $pathToFile = 'D:\Programs\OpenServer\domains\ddgi\storage\app\db\ddgi_db.sql';
        exec("D:\programs\openserver\modules\database\MySQL-8.0\bin\mysqldump --user=$user --password=$password --host=$host $db_name > $pathToFile");
        return response()->download($pathToFile)->deleteFileAfterSend(true);
    }
}
