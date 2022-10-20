<?php
namespace App\Console\Commands;
use App\Models\Gallery;
use Exception;
use Illuminate\Support\Facades\File;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class RemoveUnusedImage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remove:unused-image';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove All Unused Images from public directory';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
       // Storage::delete('public/image.jpg);
        $files =  Storage::disk('gallery')->files();
$count = 0;
  foreach ($files as $file){
      $GFile = Gallery::where('image',$file)->get('image')->first();
      if($GFile)  continue;
$CurrentFile =  public_path('Image/gallery').'/'.$file;
try {
    File::delete($CurrentFile);
    $count++;
}catch (Exception $err){
    $this->comment($err);
          }
  }
        $this->comment($count.' File has been removed');
    }

}

