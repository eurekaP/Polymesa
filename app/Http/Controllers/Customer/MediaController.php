<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

use App\Models\User;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Media;
use App\Models\Mediarate;
use App\Models\Mediacomment;

use Image;

use File;

class MediaController extends Controller
{
    protected $user;
    protected $category;
    protected $media;
    protected $subcategory;
    protected $media_rate;
    protected $media_comment;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $user, Category $category, Media $media, Subcategory $subcategory, Mediarate $media_rate, Mediacomment $media_comment)
    {
        $this->user = $user;
        $this->category = $category;
        $this->media = $media;
        $this->subcategory = $subcategory;
        $this->media_rate = $media_rate;
        $this->media_comment = $media_comment;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
    }

    public function upload(Request $request)
    {
        
        $now = date('Y-m-d');

        if(date('w', strtotime($now)) == '1')
            $start_date = $now;
        else
            $start_date = date('Y-m-d', strtotime("previous monday", strtotime($now)));

        $end_date = date('Y-m-d', strtotime($start_date. ' +6 day'));

        $uploaded_week = $this->media->query()->whereBetween('created_at', [$start_date. ' 00:00:00', $end_date. ' 23:59:59'])->get()->count();

        $remaining_week = Auth::user()->limit - $uploaded_week;

        var_dump(Auth::user()->limit);
        var_dump($uploaded_week);
        var_dump(Auth::user()->limit - $uploaded_week);
        exit(0);
        

        $categories = $this->category->query()->get();
        $subcategories = [];
        if(count($categories) > 0)
        {
            $subcategories = $this->subcategory->query()->where('parentID', $categories[0]->id)->get();
        }
        return view('upload', ['categories' => $categories, 'subcategories' => $subcategories, 'remaining_week' => $remaining_week]);
    }

    public function curation(Request $request)
    {
        $accepted_me =  $this->media_rate->query()->where('userId', Auth::user()->id)->where('voted', 1)->get()->count();
        $accepted = $this->media_rate->query()->where('voted', 1)->get()->count();

        $declined_me =  $this->media_rate->query()->where('userId', Auth::user()->id)->where('voted', -1)->get()->count();
        $declined = $this->media_rate->query()->where('voted', -1)->get()->count();

        $vote_medias = $this->media->query()->get();
        $media = NULL;
        foreach($vote_medias as $vote_media)
        {
            if($vote_media->voted_by_me == false && $vote_media->declined < Setting('minimumLikes'))
            {
                $media = $vote_media;
                break;
            }
        }
        
        return view('community-voting', ['media' => $media, 'media_cnt' => count($vote_medias), 'accepted' => $accepted, 'declined' => $declined,  'accepted_me' => $accepted_me, 'declined_me' => $declined_me]);
    }

    public function vote(Request $request)
    {
        $mode = $request->action;
        $mediaId = $request->mediaId;

        $media_rate = $this->media_rate->query()->where('userId', Auth::user()->id)->where('mediaId', $mediaId)->first();        
        if($media_rate == NULL)
        {
            $data = array(
                'userId' => Auth::user()->id,
                'mediaId' => $mediaId,
                'voted' => $mode == 'accept' ? 1 : -1,
            );
            $this->media_rate->create($data);
        } else {
            $data = array(
                'voted' => $mode == 'accept' ? 1 : -1,
            );
            $this->media_rate->where('userId', Auth::user()->id)->where('mediaId', $mediaId)->update($data);
        }
        if($mode == 'accept')
            return redirect()->back()->with('success','You have approved the media');
        else
            return redirect()->back()->with('success', 'You have declined the media');
    }

    public function mediaSetLike(Request $request)
    {
        $mediaId = $request->mediaId;
        $media_rate = $this->media_rate->query()->where('userId', Auth::user()->id)->where('mediaId', $mediaId)->first();
        
        if($media_rate == NULL)
        {
            $data = array(
                'mediaId' => $mediaId,
                'userId' => Auth::user()->id,
                'liked' => 1,
            );
            $this->media_rate->create($data);
        } else {
            $data = array(
                'liked' => ($media_rate->liked == 0 ? 1 : 0),
            );
            $this->media_rate->where('userId', Auth::user()->id)->where('mediaId', $mediaId)->update($data);
        }
        
        return redirect()->back();
    }

    public function mediaAddComment(Request $request)
    {
        $mediaId = $request->mediaId;
        $comment = $request->comment;
        $data = array(
            'userId' => Auth::user()->id,
            'mediaId' => $mediaId,
            'comment' => $comment,
        );

        $this->media_comment->create($data);
        return redirect()->back()->with('Your comment successfully submitted');
    }

    public function mediaDownload(Request $request)
    {
        $mediaID = $request->id;
     
        $media = $this->media->query()->where('id', $mediaID)->first();
        $media->downloads = $media->downloads + 1;
        $media->save();
    }

    public function mediaDetail(Request $request, $id)
    {
        $media = $this->media->query()->where('id', $id)->first();
        $media->views = $media->views + 1;
        $media->save();

        $categories = $this->category->query()->get();
        
        // Media Detail Info

        $image = 'public/assets/medias/'. $media->path;
        $fileExtension = substr($media->path, strripos($media->path, '.') + 1);
        
        $width = getimagesize($image)[0];
        $height = getimagesize($image)[1];
        
        $exif = @exif_read_data($image, 0, true); 
        $final_img_info['make'] = @$exif['IFD0']['Make'];         
        $final_img_info['model'] = @$exif['IFD0']['Model'];         
        $final_img_info['ApertureFNumber'] = @$exif['COMPUTED']['ApertureFNumber']; 
        $final_img_info['ISO'] = @$exif['EXIF']['ISOSpeedRatings'];  
        $shutterSpeedValue = explode('/', @$exif['EXIF']['ShutterSpeedValue']);
        if(count($shutterSpeedValue) == 2)
            $final_img_info['ShutterSpeedValue'] = intval($shutterSpeedValue[0]) / intval($shutterSpeedValue[1]);
        else
            $final_img_info['ShutterSpeedValue'] = null;

        $focalLength = explode('/', @$exif['EXIF']['FocalLength']);
        if(count($focalLength) == 2)
            $final_img_info['FocalLength'] = intval($focalLength[0]) / intval($focalLength[1]);
        else
            $final_img_info['FocalLength'] = null;

        $final_img_info['width'] = $width;
        $final_img_info['height'] = $height;
        $final_img_info['fileExtension'] = $fileExtension;

        // Get Thumbnail Images Size
        $image_640 = 'public/assets/medias/640_'. $media->path;
        $image_1280 = 'public/assets/medias/1280_'. $media->path;
        $image_1920 = 'public/assets/medias/1920_'. $media->path;
        $image_original = 'public/assets/medias/'. $media->path;


        $height_640 = getimagesize($image_640)[1];
        $height_1280 = getimagesize($image_1280)[1];
        $height_1920 = getimagesize($image_1920)[1];

        // Get Thumbnail File Size
        $fileSize = \File::size($image_640);
        $size_640 = $fileSize / 1024 / 1024 < 1 ? number_format($fileSize / 1024, 0). " KB" : number_format($fileSize / 1024 / 1024, 1). "MB";
        
        $fileSize = \File::size($image_1280);
        $size_1280 = $fileSize / 1024 / 1024 < 1 ? number_format($fileSize / 1024, 0). " KB" : number_format($fileSize / 1024 / 1024, 1). "MB";

        $fileSize = \File::size($image_1920);
        $size_1920 = $fileSize / 1024 / 1024 < 1 ? number_format($fileSize / 1024, 0). " KB" : number_format($fileSize / 1024 / 1024, 1). "MB";

        $fileSize = \File::size($image_original);
        $size_original = $fileSize / 1024 / 1024 < 1 ? number_format($fileSize / 1024, 0). " KB" : number_format($fileSize / 1024 / 1024, 1). "MB";

        // Media Comments
        $comments = $this->media_comment->query()->where('mediaId', $id)->orderBy('created_at', 'DESC')->get();
        
        return view('media-detail', ['media' => $media, 'categories' => $categories, 'final_img_info' => $final_img_info, 'comments' => $comments, 
                                    'height_640' => $height_640, 'height_1280' => $height_1280, 'height_1920' => $height_1920, 
                                    'size_640' => $size_640, 'size_1280' => $size_1280, 'size_1920' => $size_1920, 'size_original' => $size_original]);
    }

    public function store(Request $request)
    {

        // Check Uploaded file type
        $media = $request->file('file');
        $extension = $media->extension();
        
        switch($extension) {
            case 'jpg': case 'png': case 'jpeg': case 'JPG': case 'PNG': case 'JPEG':       // When uploaded file is image
                $image = $request->file('file');
                $width = getimagesize($image)[0];
                $height = getimagesize($image)[1];
                
                $exif = @exif_read_data($image, 0, true); 

                $orientation = @$exif['IFD0']['Orientation'];

                $final_img_info['make'] = @$exif['IFD0']['Make'];         
                $final_img_info['model'] = @$exif['IFD0']['Model'];         
                $final_img_info['ApertureFNumber'] = @$exif['COMPUTED']['ApertureFNumber']; 
                $final_img_info['ISO'] = @$exif['EXIF']['ISOSpeedRatings'];  
                $shutterSpeedValue = explode('/', @$exif['EXIF']['ShutterSpeedValue']);
                if(count($shutterSpeedValue) == 2)
                    $final_img_info['ShutterSpeedValue'] = intval($shutterSpeedValue[0]) / intval($shutterSpeedValue[1]);
                $focalLength = explode('/', @$exif['EXIF']['FocalLength']);
                if(count($focalLength) == 2)
                    $final_img_info['FocalLength'] = intval($focalLength[0]) / intval($focalLength[1]);
                    
                $final_img_info['width'] = $width;
                $final_img_info['height'] = $height;
                $final_img_info['mega_size'] = number_format($image->getSize() / 1024 / 1024, 2);
                $final_img_info['size'] = $image->getSize() / 1024 / 1024;

                if(!empty($orientation))
                {
                    $imageResource = imagecreatefromjpeg($image->getRealpath());
                    switch($orientation) {
                        case 3:
                            $image1 = imagerotate($imageResource, 180, 0);
                            break;
                        case 6:
                            $image1 = imagerotate($imageResource, -90, 0);
                            break;
                        case 8:
                            $image1 = imagerotate($imageResource, 90, 0);
                            break;
                        default:
                            $image1 = $imageResource;
                            break;
                    }
                    imagejpeg($image1, "abc", 90);

                }


                $final_img_info['resolution_error'] = false;
                $final_img_info['size_error'] = false;

                if($width <= 3000 || $height <= 3000)
                    $final_img_info['resolution_error'] = true;

                if($final_img_info['size'] > 20)
                    $final_img_info['size_error'] = true;

                $final_img_info['extension'] = $extension;
                $final_img_info['fileType'] = "image";

                if($image && $final_img_info['resolution_error'] == false && $final_img_info['size_error'] == false)
                {
                    $fileName = time().'_'.$image->getClientOriginalName();

                    $image_640 = Image::make($image->getRealPath());
                    $image_640->orientate()
                        ->resize(640, 640, function ($const) {
                        $const->aspectRatio();
                    })->save('public/assets/medias'. '/640_'. $fileName);

                    $image_1280 = Image::make($image->getRealPath());
                    $image_1280->orientate()
                        ->resize(1280, 1280, function ($const) {
                        $const->aspectRatio();
                    })->save('public/assets/medias'. '/1280_'. $fileName);

                    $image_1920 = Image::make($image->getRealPath());
                    $image_1920->orientate()
                        ->resize(1920, 1920, function ($const) {
                        $const->aspectRatio();
                    })->save('public/assets/medias'. '/1920_'. $fileName);

                    $final_img_info['fileName'] = $fileName;
                    $image->move('public/assets/medias/', $fileName);
                }
                break;
            case 'mp3': case 'flac': case 'wav': case 'wma': case 'aac': case 'MP3': case 'FLAC': case 'WAV': case 'WMA': case 'AAC':      // When uploaded file is audio
                $final_img_info['length_error'] = false;
                $final_img_info['size_error'] = false;

                $audio = $request->file('file');
                $fileSize = $audio->getSize();

                $final_img_info['size'] = ($fileSize / 1024 / 1024) < 1 ? number_format($fileSize / 1024, 0). " KB" : number_format($fileSize / 1024 / 1024, 1). "MB";
                
                $audio_obj = new \wapmorgan\Mp3Info\Mp3Info($audio->getRealpath(), true);
                $duration = $audio_obj->duration;

                $final_img_info['duration_time_format'] = floor($audio_obj->duration / 60). ':'. floor($audio_obj->duration % 60);
                $final_img_info['duration'] = (floor($audio_obj->duration / 60) != 0 ? floor($audio_obj->duration / 60).' min ' : '') .floor($audio_obj->duration % 60).' sec';

                if(($duration / 60) > 15)
                    $final_img_info['length_error'] = true;

                if(($fileSize / 1024 / 1024) > 20)
                    $final_img_info['size_error'] = true;

                $final_img_info['extension'] = $extension;
                $final_img_info['fileType'] = "audio";

                if($audio && $final_img_info['length_error'] == false && $final_img_info['size_error'] == false)
                {   
                    $fileName = time().'_'.$audio->getClientOriginalName();

                    $final_img_info['fileName'] = $fileName;
                    $audio->move('public/assets/medias/', $fileName);
                }
                break;
            case 'mp4': case 'avi': case 'mk': case 'MP4': case 'AVI': case 'MK':      // When uploaded file is video
                $final_img_info['fileType'] = "video";

                break;
        }
        return json_encode($final_img_info);
    }

    public function fileDestroy(Request $request)
    {
        $fileName = $request->fileName;
        $path = 'public/assets/medias/'. $fileName;
        $path_640 = 'public/assets/medias/640_'. $fileName;
        $path_1280 = 'public/assets/medias/1280_'. $fileName;
        $path_1920 = 'public/assets/medias/1920_'. $fileName;

        if (file_exists($path)) {
            unlink($path);
        }

        if (file_exists($path_640)) {
            unlink($path_640);
        }
        if (file_exists($path_1280)) {
            unlink($path_1280);
        }
        if (file_exists($path_1920)) {
            unlink($path_1920);
        }
    }

    public function addMedia(Request $request)
    {
        $userId = Auth::user()->id;
        $categoryId = $request->categoryId;
        $subcategoryId = $request->subcategoryId;
        $path = $request->path;
        $taglist = $request->taglist; 
        $title = $request->title;
        $mediaType = $request->mediaType; 
        $duration = $request->duration;

        $data = array(
            'userId' => $userId,
            'categoryId' => $categoryId,
            'subcategoryId' => $subcategoryId,
            'path' => $path,
            'taglist' => $taglist,
        );
        if($mediaType == "Audio"){
            $data['title'] = $title;
            $data['duration'] = $duration;
        }

        $this->media->create($data);
        return json_encode("success");
        // return redirect()->route('user-dashboard')->with('success', 'New media uploaded.');
    }

    public function mediaSearch(Request $request, $id)
    {
        $tagKey = $request->key == NULL ? '%%' : ('%"'. $request->key. '"%');
        $searchKey = $request->key == NULL ? '%%' : ('%'. $request->key. '%');

        
        $medias = $this->media->query()->where('categoryId', $id)->where(function($query) use($searchKey, $tagKey){
            $query->where('taglist', 'LIKE', $tagKey)
                  ->orWhere('title', 'LIKE', $searchKey);
        })->get();
        
        $mediaType = $this->category->query()->where('id', $id)->first()->mediaType;
        $categories = $this->category->query()->get();

        return view('media-search', ['mediaType' => $mediaType, 'medias' => $medias, 'categories' => $categories, 'search' => true, 'key' => $request->key, 'id'=> $id]);
    }

    public function mediasByCategory(Request $request)
    {
        $categoryId = $request->category_id;

        $tagKey = $request->key == NULL ? '%%' : ('%"'. $request->key. '"%');
        $searchKey = $request->key == NULL ? '%%' : ('%'. $request->key. '%');

        
        $medias = $this->media->query()->where('categoryId', $categoryId)->where(function($query) use($searchKey, $tagKey){
            $query->where('taglist', 'LIKE', $tagKey)
                  ->orWhere('title', 'LIKE', $searchKey);
        })->get();

        // $medias = $this->media->query()->where('categoryId', $categoryId)->get();

        return json_encode($medias);
    }
}
