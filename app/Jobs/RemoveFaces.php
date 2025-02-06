<?php

namespace App\Jobs;

use App\Models\Image;
use Spatie\Image\Image as SpatieImage;
use Spatie\Image\Enums\Fit;
use Spatie\Image\Enums\AlignPosition;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;



class RemoveFaces implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
<<<<<<< HEAD

    public $article_image_id;

=======
    
    private $article_image_id;
    
>>>>>>> efcaa72d711a57902d23a549f8cdee5f52248b3b
    /**
     * Create a new job instance.
     */
    public function __construct($article_image_id)
    {
        $this->article_image_id = $article_image_id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $i = Image::find($this->article_image_id);
        if (!$i) {
            return;
        }

        $srcPath = storage_path('app/public/' . $i->path);
        $image = file_get_contents($srcPath);

        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('google_credential.json'));


        $imageAnnotator = new ImageAnnotatorClient();
        $response = $imageAnnotator->faceDetection($image);
        $faces = $response->getFaceAnnotations();


        foreach ($faces as $face) {
            $vertices = $face->getBoundingPoly()->getVertices();

            $bounds = [];

            foreach ($vertices as $vertex) {
                $bounds[] = [$vertex->getX(), $vertex->getY()];
            }

            $w = $bounds[2][0] - $bounds[0][0];
            $h = $bounds[2][1] - $bounds[0][1];

            $image = SpatieImage::load($srcPath);

<<<<<<< HEAD
            $image->watermark(
                base_path('public/img/article/covers'),
                AlignPosition::TopLeft,
                paddingX: $bounds[0][0],
                paddingY: $bounds[0][1],
                width: $w,
                height: $h,
                fit: Fit::Stretch

            );
=======
        $image->watermark(
            base_path('public/img/blur2.png'),
            AlignPosition:: TopLeft,
            paddingX: $bounds[0][0],
            paddingY: $bounds[0][1],
            width: $w,
            height: $h,
            fit: Fit::Stretch
        
        );
>>>>>>> efcaa72d711a57902d23a549f8cdee5f52248b3b


            $image->save($srcPath);
        }

        $imageAnnotator->close();
    }
}
