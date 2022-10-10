<?php
namespace App\Http\Traits;
trait HasImage
{
    public function setImage($type,$file): string
    {
         $filename = date('YmdHi') . $file->getClientOriginalName();
        $file->move(public_path('/Image/'.$type), $filename);
        return $filename;
    }
}
