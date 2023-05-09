<?php
namespace Modules\Admin\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\{AboutUsPage,GalleryPhoto,Page,ContactUsPage};
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class PageController extends Controller
{
    function __construct() {
        $this->middleware('permission:Pages-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Pages-list', ['only' => ['index']]);
    }
    public function index()
    {
      $pages = array(
        array('about-us'),
        array('gallery'),
        array('contact-us'),
      );      
      return view('admin::pages.index')->with('pages', $pages);
    }

    public function update( Request $request,$pagename,$id=null)
    {
      $updatedata="";
        switch ($pagename) {
          case 'about-us':
              $updatedata = AboutUsPage::first();
              return view('admin::pages.about_us_page',compact('updatedata','pagename'));
          break;
          case 'gallery':
              $pages = array(
                array('gallery-photos'),
              );  
              return view('admin::pages.gallery.index',compact('pages'));
              break;
            case 'contact-us':
              $pages = array(
                array('contact-us'),
              );
              $updatedata = ContactUsPage::first();  
              return view('admin::pages.contact_us_page',compact('pages','pagename','updatedata'));
              break;
          default:
              alert()->warning('Success', 'Something is wrong')->autoclose(4000);
              return redirect()->back();
              break;
      }      
    }
    public function gallery( Request $request,$pagename,$id=null)
    {

      $updatedata="";
      $pages = array(
                  array('gallery-photos')
                );  
      switch($pagename) {
        case 'gallery-photos':
            $data = GalleryPhoto::orderBy('id', 'DESC')->get();
            if ($id)
            {
              try
              {
                $updatedata = GalleryPhoto::findorfail($id);
              } 
              catch (\Exception $ex) 
              {
                return redirect()->route('admin::pages.gallery.index');
              }
            } 
            return view('admin::pages.gallery.gallery-photos',compact('data','id','updatedata','pagename'));
        break;
        default: 
            return view('admin::pages.gallery.index',compact('pages'));
            break;
      } 
    }

    public function GalleryPhotosUpdateStore(Request $request,$id=null )
    {
      $pages = array(
                array('gallery-photos'),
              ); 
      $validatedData = $request->validate([
        'heading' => 'required|max:20|unique:gallery_photos,heading,'.$id,
        'image' => 'image|mimes:jpeg,png,jpg|max:2048',
      ]);
      
      if($request->hasfile("image")){
        $validatedData['image'] = upload($request->image,"gallery_photos");
      }
     if ($id) {
     try {
          $updatedata = GalleryPhoto::findorfail($id);
          } catch (\Exception $ex) {
            return redirect()->route('admin::pages.gallery.index');
        } 
           $addresses = GalleryPhoto::where('id',$id)->update($validatedData);
           alert()->Success('Success', 'Gallery Photo update Successfully')->autoclose(3000);
          return redirect()->back();
        }
         $addresses = GalleryPhoto::create($validatedData);
         alert()->Success('Success', 'Gallery Photo add Successfully')->autoclose(3000);
        return redirect()->back();
    }
    public function Aboutusupdate(Request $request){
      $page = AboutUsPage::first();
      if ($page=="") {
        $page=new AboutUsPage;
      }
      $request->validate([
        'page_heading'     =>  'required|max:100', 
        'section_heading'  =>  'required|max:100', 
        'section_content'  =>  'required|max:4000', 
        'section_image'    =>  'required|sometimes', 
      ]);
      
      if($request->hasfile("section_image")){
        $page->section_image= upload($request->section_image,"about_us_images");
      }

      $page->page_heading    = $request->input('page_heading');
      $page->section_heading = $request->input('section_heading');
      $page->section_content = $request->input('section_content');
      $page->save();
      
      toastr()->success('About us update successfully!');
      return redirect()->back();
    }
    public function ContactUsUpdate(Request $request){
      $page = ContactUsPage::first();
      if ($page=="") {
        $page=new ContactUsPage;
      }
      $request->validate([
        'page_heading'     =>  'required|max:100', 
        'section_heading'  =>  'required|max:100', 
        'section_content'  =>  'required|max:4000', 
      ]);

      $page->page_heading    = $request->input('page_heading');
      $page->section_heading = $request->input('section_heading');
      $page->section_content = $request->input('section_content');
      $page->save();
      
      toastr()->success('Saved Successfully!');
      return redirect()->back();
    }
}

