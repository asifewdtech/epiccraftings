<?php
namespace App\Traits;
use Illuminate\Http\Request;
use App\ProductImage;

trait ImageUploadTrait{
    private $image_to_resize;
    private $new_width ;
    private $new_height;
    private $ratio;
    private $new_image_name;
    private $save_folder;

    public function uploadImage($name,$path,$request,$old='')
    {
        if($request->hasFile($name))
        {
            $image_changed_name = time().'.'.$request->$name->getClientOriginalExtension();
            $request->file($name)->move(public_path($path), $image_changed_name);
            $path = '/public'.'/'.$path;
            $img_url = url($path)."/".$image_changed_name;
        }
        else{ $img_url = $old; }
        return $img_url;
    }

    public function uploadMultipleFiles($request,$name,$path,$product,$update=false){
        for($i = 0; $i<count($request->file('images')); $i++)
        {
            $file = $request->file("images")[$i];
            $image_changed_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path($path), $image_changed_name); 
            $path = '/public'.'/'.$path;
            // $img_url = url($path)."/".$image_changed_name;
            $img_url = $image_changed_name;
            $productImage = ProductImage::create(["product_id"=>$product->id,"image_url"=>$img_url]);
        }

        return url($path)."/".ProductImage::where("product_id",$product->id)->first()->image_url;

    }

    // image resize
    public function resize()
    {
        $info = GetImageSize($this->image_to_resize);
        $width = $info[0];
        $height = $info[1];
        $mime = $info['mime'];
    
        /* Keep Aspect Ratio? */
    
        if ($this->ratio) {
            $thumb = ($this->new_width < $width && $this->new_height < $height) ? true : false; // Thumbnail
            $bigger_image = ($this->new_width > $width || $this->new_height > $height) ? true : false; // Bigger Image
    
            if ($thumb) {
                if ($this->new_width >= $this->new_height) {
                    $x = ($width / $this->new_width);
                    $this->new_height = ($height / $x);
                } elseif ($this->new_height >= $this->new_width) {
                    $x = ($height / $this->new_height);
                    $this->new_width = ($width / $x);
                }
            } elseif ($bigger_image) {
                if ($this->new_width >= $width) {
                    $x = ($this->new_width / $width);
                    $this->new_height = ($height * $x);
                } elseif ($this->new_height >= $height) {
                    $x = ($this->new_height / $height);
    
                    $this->new_width = ($width * $x);
                }
            }
        }
    
        // getImageType
        $image_create_func = $this->getImageTypeWithDynamicFunction($this->image_to_resize)[0];
        $image_save_func = $this->getImageTypeWithDynamicFunction($this->image_to_resize)[1];
        $new_image_ext = $this->getImageTypeWithDynamicFunction($this->image_to_resize)[2];
    
        // New Image
        $image_c = ImageCreateTrueColor($this->new_width, $this->new_height);
        // imagesavealpha($image_c, true);
        imageinterlace($image_c, true);
        $new_image = $image_create_func($this->image_to_resize);
        $bg = imagecolorallocatealpha($image_c, 255, 255, 255, 127);
        imagefill($image_c, 0, 0, $bg);
        ImageCopyResampled($image_c, $new_image, 0, 0, 0, 0, $this->new_width, $this->new_height, $width, $height);
    
        if ($this->save_folder) {
            if ($this->new_image_name) {
                $new_name = $this->new_image_name . '.' . $new_image_ext;
            } else {
                $new_name = $this->new_thumb_name(basename($this->image_to_resize)) . '_resized.' . $new_image_ext;
            }
    
            $save_path = $this->save_folder .'/'. $new_name;
        } else {
            /* Show the image without saving it to a folder */
            header("Content-Type: " . $mime);
    
            $image_save_func($image_c);
    
            $save_path = '';
        }
    
        $process = $image_save_func($image_c, $save_path);
        // return array('result' => $process, 'newFile' => url(str_replace('\\', '', explode('public\\', $save_path)[1])));
    }

    // get type of image with dynamic functions using image path
    private function getImageTypeWithDynamicFunction($url)
    {
        switch (substr(strchr(GetImageSize($url)['mime'], '/'), 1)) {
            case 'jpeg':
                return ['ImageCreateFromJPEG','ImageJPEG','jpg'];
            case 'png':
                return ['ImageCreateFromPNG','ImagePNG','png'];
            default:
                return ['ImageCreateFromJPEG','ImageJPEG','jpg'];
        }
    }
}

?>