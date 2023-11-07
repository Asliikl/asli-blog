<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogUpdateRequest;
use App\Models\Blog;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blogAdd(){
        return view('admin.blogForm');
    }

    private function uploadFile($file){
        $filename = md5(time()).\Str::slug($file->getClientOriginalName()).'.'.$file->getClientOriginalExtension();
        $file->move(storage_path('app/public/images'), $filename);
        return '/storage/images/'.$filename;
    }

    public function blogStore(BlogUpdateRequest $request){
        /*
            2 çeşit dosya yükleme yeri: public-storage
            public: tema için yada yazılım çalışması için gerekli olan tüm dosytalar, ve herkes tarafından erişilebilri
            storage: kullanıcılar tarafından yüklenecek tüm dosyaların barındığı yer, kullanıcıya özel izin ayarlanabilir
            eğer storage kullanıcaksan php artisan storage:link kullanmak zorundasi
        */

        $newBlog=Blog::create([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'header_img' => $this->uploadFile($request->file('header_img'))
        ]);
        return redirect()->route('admin.blogStore');
    }

    public function blog(){
        $blogs=Blog::all();
        return view('admin.blog',['blogs'=>$blogs]);
    }

    public function blogEdit(Blog $blog){
      return view('admin.blogForm',['blog'=>$blog]); 
    }

    public function blogDelete(Blog $blog){
        $blog->delete();
        return redirect(route('admin.blog'))->with('succes',"Blog deleted succesfully");
    }

    public function blogUpdate(BlogUpdateRequest $request, Blog $blog){
        //$blog = Blog::where('id',$blogID)->first();  paramtere olarak blogID gönderilirse yapılması gerekiyor
        //$request->validate
        /*$validate = Validator::make($request->all(),[
            'title' => 'required'
        ]);*/
       
       $blog->update([
        'title' => $request->get('title'),
        'content' => $request->get('content'),
        'header_img' => $this->uploadFile($request->file('header_img')),
        ]);
        return redirect(route('admin.blog'))->with('succes',"Blog update succesfully");
    }
}
