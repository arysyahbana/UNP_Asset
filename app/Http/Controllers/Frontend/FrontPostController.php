<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use FFMpeg\Format\Video\X264;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use FFMpeg\Coordinate\TimeCode;
use FFMpeg\Filters\Video\VideoFilters;

// use Illuminate\Support\Facades\Storage;


class FrontPostController extends Controller
{
    public function show($id, $name)
    {
        // $user = User::where('name', $name)->get('id');
        $data = Post::where('user_id', $id)->latest()->get();
        // $data = User::with('rPost')->where('name', $name);
        return view('frontend.Post.front-post_show', compact('data'));
    }

    public function create($id, $name)
    {
        $category = Category::get();
        return view('frontend.Post.front_post_create', compact('category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'file' => 'required|mimes:png,jpg,jpeg,mp4,mkv,webm,mp3,m4a,eps,psd,ai,aep,aepx,prproj,aup3,sesx,als,zip,rar',
            'body' => 'required',

        ], [
            'body.required' => 'deskripsi harus diisikan',
            'file.required' => 'harus ada file yang dimasukan',
            'file.mimes' => 'file harus berupa gambar, video, audio',
            'title.required' => 'title tidak boleh kosong'
        ]);
        $store = new Post();
        $pilkat = $store->category_id = $request->category_menu;
        $files = $request->file('file');
        $ext = $files->getClientOriginalExtension();

        // Image
        if ($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg') {
            $ext = $request->file('file')->extension();
            $final = 'photo' . time() . '.' . $ext;

            // Kompresi gambar
            $compressedImage = Image::make($files)->encode($ext, 10);
            $resolution = $compressedImage->height() . "x" . $compressedImage->width();

            $compressedImage->save(storage_path('app/public/uploads/photo/compress/') . $final);

            // menyimpan gambar asli
            $request->file('file')->move(storage_path('app/public/uploads/photo/'), $final);
            $store->resolution = $resolution;
            $store->file = $final;
        }

        // Video
        if ($ext == 'mp4' || $ext == 'mkv' || $ext == 'webm') {
            $ext = $request->file('file')->extension();
            $final = 'video' . time() . '.' . $ext;
            $request->file('file')->move(storage_path('app/public/uploads/video/'), $final);
            $store->file = $final;

            //    thumbnail video
            $video = FFMpeg::fromDisk('video')->open($final);
            $thumbnail = 'thumb' . time() . '.jpg';
            $video->getFrameFromSeconds(2)
                ->export()
                ->accurate()
                ->save('thumbnail/' . $thumbnail);

            $store->thumbnail = $thumbnail;
            // end thumbnail video

            // Konversi video
            $video2 = FFMpeg::fromDisk('video')->open($final);

            // 720p
            $q720p = '720p' . time() . '.mp4';
            $video2->addFilter(function (VideoFilters $filters) {
                $filters->resize(new \FFMpeg\Coordinate\Dimension(1280, 720));
            })
                ->export()
                ->toDisk('video')
                ->inFormat(new X264)
                ->save('720p/' . $q720p);
            $store->q720p = $q720p;
            // end 720p

            // 480p
            $q480p = '480p' . time() . '.mp4';
            $video2->addFilter(function (VideoFilters $filters) {
                $filters->resize(new \FFMpeg\Coordinate\Dimension(640, 480));
            })
                ->export()
                ->toDisk('video')
                ->inFormat(new X264)
                ->save('480p/' . $q480p);
            $store->q480p = $q480p;
            // end 480p

            // 360p
            $q360p = '360p' . time() . '.mp4';
            $video2->addFilter(function (VideoFilters $filters) {
                $filters->resize(new \FFMpeg\Coordinate\Dimension(640, 360));
            })
                ->export()
                ->toDisk('video')
                ->inFormat(new X264)
                ->save('360p/' . $q360p);
            $store->q360p = $q360p;
            // end 360p

            // end Konversi Video
        }

        // audio
        if ($ext == 'mp3' || $ext == 'm4a') {
            $ext = $request->file('file')->extension();
            $final = 'audio' . time() . '.' . $ext;
            $request->file('file')->move(storage_path('app/public/uploads/audio/'), $final);
            $store->file = $final;
        }

        if ($request->file('file2')) {
            $files2 = $request->file('file2');
            $ext2 = $files2->getClientOriginalExtension();
            if ($ext2 == 'eps' || $ext2 == 'psd' || $ext2 == 'ai' || $ext2 == 'cdr') {
                // $ext2 = $request->file('file2')->extension();
                $final2 = 'rawphoto' . time() . '.' . $ext2;
                $request->file('file2')->move(storage_path('app/public/uploads/rawphoto'), $final2);
                $store->file_mentah = $final2;
            }

            if ($ext2 == 'aep' || $ext2 == 'aepx' || $ext2 == 'prproj') {
                // $ext2 = $request->file('file2')->getClientOriginalExtension();

                $final2 = 'rawvideo' . time() . '.' . $ext2;
                $request->file('file2')->move(storage_path('app/public/uploads/rawvideo'), $final2);
                $store->file_mentah = $final2;
            }

            if ($ext2 == 'aup3' || $ext2 == 'sesx' || $ext2 == 'als') {
                $final2 = 'rawaudio' . time() . '.' . $ext2;
                $request->file('file2')->move(storage_path('app/public/uploads/rawaudio'), $final2);
                $store->file_mentah = $final2;
            }

            if ($ext2 == 'rar' || $ext2 == 'zip') {
                if ($pilkat == 3) {
                    $final2 = 'rawphoto' . time() . '.' . $ext2;
                    $request->file('file2')->move(storage_path('app/public/uploads/rawphoto'), $final2);
                    $store->file_mentah = $final2;
                } elseif ($pilkat == 4) {
                    $final2 = 'rawvideo' . time() . '.' . $ext2;
                    $request->file('file2')->move(storage_path('app/public/uploads/rawvideo'), $final2);
                    $store->file_mentah = $final2;
                } elseif ($pilkat == 5) {
                    $final2 = 'rawaudio' . time() . '.' . $ext2;
                    $request->file('file2')->move(storage_path('app/public/uploads/rawaudio'), $final2);
                    $store->file_mentah = $final2;
                }
            }
        }
        $store->user_id = Auth::guard()->user()->id;
        $store->name = $request->title;
        $store->body = $request->body;
        $store->save();
        return redirect()->back()->with('success', 'Upload Success');
    }

    public function delete($id)
    {
        $delete = Post::where('id', $id)->first();

        if (file_exists(storage_path('app/public/uploads/photo/' . $delete->file))) {
            unlink(storage_path('app/public/uploads/photo/' . $delete->file));
            unlink(storage_path('app/public/uploads/photo/compress/' . $delete->file));
        } elseif (file_exists(storage_path('app/public/uploads/video/' . $delete->file))) {
            unlink(storage_path('app/public/uploads/video/' . $delete->file));
            unlink(storage_path('app/public/uploads/video/thumbnail/' . $delete->thumbnail));
            unlink(storage_path('app/public/uploads/video/720p/' . $delete->q720p));
            unlink(storage_path('app/public/uploads/video/480p/' . $delete->q480p));
            unlink(storage_path('app/public/uploads/video/360p/' . $delete->q360p));
        } elseif (file_exists(storage_path('app/public/uploads/audio/' . $delete->file))) {
            unlink(storage_path('app/public/uploads/audio/' . $delete->file));
        } elseif (file_exists(storage_path('app/public/uploads/rawphoto/' . $delete->file))) {
            unlink(storage_path('app/public/uploads/rawphoto/' . $delete->file_mentah));
        } elseif (file_exists(storage_path('app/public/uploads/rawvideo/' . $delete->file))) {
            unlink(storage_path('app/public/uploads/rawvideo/' . $delete->file_mentah));
            // } elseif (file_exists(storage_path('app/public/uploads/rawaudio/' . $delete->file))) {
            //     unlink(storage_path('app/public/uploads/rawaudio/' . $delete->file_mentah));
        }
        $delete->delete();
        return redirect()->back()->with('success', 'berhasil di hapus');
    }

    public function view($id, $name)
    {
        $view = Post::where('id', $id)->where('name', $name)->first();
        return view('detail', compact('view'));
    }


    public function edit($id)
    {
        $edit = Post::where('id', $id)->first();
        $post = Post::where('id', $id)->first();
        return view('frontend.Post.front_post_edit', compact('edit', 'post'));
    }
    public function update(Request $request, $id)
    {
        $update = Post::where('id', $id)->first();
        $user = User::where('id', $update->user_id)->first();
        $pilkat = $update->category_id;

        $request->validate([
            'file' => 'mimes:png,jpg,jpeg,mp4,mkv,webm,mp3,m4a,eps,psd,ai,aep,aepx,prproj,aup3,sesx,als',

        ], [
            'file.required' => 'harus ada file yang dimasukan',
            'file.mimes' => 'file harus berupa gambar, video, audio',
        ]);

        // File 1
        if ($request->hasFile('file')) {
            $files = $request->file('file');
            $ext = $files->getClientOriginalExtension();

            // Photo
            if (storage_path('app/public/uploads/photo/' . $update->file == '')) {
                if ($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg') {
                    $ext = $request->file('file')->extension();
                    $final = 'photo' . time() . '.' . $ext;

                    // Kompresi gambar
                    $compressedImage = Image::make($files)->encode($ext, 10);
                    $resolution = $compressedImage->height() . "x" . $compressedImage->width();

                    $compressedImage->save(storage_path('app/public/uploads/photo/compress/') . $final);

                    // menyimpan gambar asli
                    $request->file('file')->move(storage_path('app/public/uploads/photo/'), $final);
                    $update->resolution = $resolution;
                    $update->file = $final;
                }
            } elseif (storage_path('app/public/uploads/photo/' . $update->file)) {
                unlink(storage_path('app/public/uploads/photo/' . $update->file));
                unlink(storage_path('app/public/uploads/photo/compress/' . $update->file));
                if ($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg') {
                    $ext = $request->file('file')->extension();
                    $final = 'photo' . time() . '.' . $ext;

                    // Kompresi gambar
                    $compressedImage = Image::make($files)->encode($ext, 10);
                    $resolution = $compressedImage->height() . "x" . $compressedImage->width();

                    $compressedImage->save(storage_path('app/public/uploads/photo/compress/') . $final);

                    // menyimpan gambar asli
                    $request->file('file')->move(storage_path('app/public/uploads/photo/'), $final);
                    $update->resolution = $resolution;
                    $update->file = $final;
                }
            }
            // end Photo

            // Video
            if (storage_path('app/public/uploads/video/' . $update->file == '')) {
                if ($ext == 'mp4' || $ext == 'mkv' || $ext == 'webm') {
                    $ext = $request->file('file')->extension();
                    $final = 'video' . time() . '.' . $ext;
                    $request->file('file')->move(storage_path('app/public/uploads/video/'), $final);
                    $update->file = $final;

                    //    thumbnail video
                    $video = FFMpeg::fromDisk('video')->open($final);
                    $thumbnail = 'thumb' . time() . '.jpg';
                    $video->getFrameFromSeconds(2)
                        ->export()
                        ->accurate()
                        ->save('thumbnail/' . $thumbnail);

                    $update->thumbnail = $thumbnail;
                    // end thumbnail video

                    // Konversi video
                    $video2 = FFMpeg::fromDisk('video')->open($final);

                    // 720p
                    $q720p = '720p' . time() . '.mp4';
                    $video2->addFilter(function (VideoFilters $filters) {
                        $filters->resize(new \FFMpeg\Coordinate\Dimension(1280, 720));
                    })
                        ->export()
                        ->toDisk('video')
                        ->inFormat(new X264)
                        ->save('720p/' . $q720p);
                    $update->q720p = $q720p;
                    // end 720p

                    // 480p
                    $q480p = '480p' . time() . '.mp4';
                    $video2->addFilter(function (VideoFilters $filters) {
                        $filters->resize(new \FFMpeg\Coordinate\Dimension(640, 480));
                    })
                        ->export()
                        ->toDisk('video')
                        ->inFormat(new X264)
                        ->save('480p/' . $q480p);
                    $update->q480p = $q480p;
                    // end 480p

                    // 360p
                    $q360p = '360p' . time() . '.mp4';
                    $video2->addFilter(function (VideoFilters $filters) {
                        $filters->resize(new \FFMpeg\Coordinate\Dimension(640, 360));
                    })
                        ->export()
                        ->toDisk('video')
                        ->inFormat(new X264)
                        ->save('360p/' . $q360p);
                    $update->q360p = $q360p;
                    // end 360p

                    // end Konversi Video
                }
            } elseif (storage_path('app/public/uploads/video/' . $update->file)) {
                unlink(storage_path('app/public/uploads/video/' . $update->file));
                unlink(storage_path('app/public/uploads/video/thumbnail/' . $update->thumbnail));
                unlink(storage_path('app/public/uploads/video/720p/' . $update->q720p));
                unlink(storage_path('app/public/uploads/video/480p/' . $update->q480p));
                unlink(storage_path('app/public/uploads/video/360p/' . $update->q360p));
                if ($ext == 'mp4' || $ext == 'mkv' || $ext == 'webm' || $ext == 'jpg') {
                    $ext = $request->file('file')->extension();
                    $final = 'video' . time() . '.' . $ext;
                    $request->file('file')->move(storage_path('app/public/uploads/video/'), $final);
                    $update->file = $final;

                    //    thumbnail video
                    $video = FFMpeg::fromDisk('video')->open($final);
                    $thumbnail = 'thumb' . time() . '.jpg';
                    $video->getFrameFromSeconds(2)
                        ->export()
                        ->accurate()
                        ->save('thumbnail/' . $thumbnail);

                    $update->thumbnail = $thumbnail;
                    // end thumbnail video

                    // Konversi video
                    $video2 = FFMpeg::fromDisk('video')->open($final);

                    // 720p
                    $q720p = '720p' . time() . '.mp4';
                    $video2->addFilter(function (VideoFilters $filters) {
                        $filters->resize(new \FFMpeg\Coordinate\Dimension(1280, 720));
                    })
                        ->export()
                        ->toDisk('video')
                        ->inFormat(new X264)
                        ->save('720p/' . $q720p);
                    $update->q720p = $q720p;
                    // end 720p

                    // 480p
                    $q480p = '480p' . time() . '.mp4';
                    $video2->addFilter(function (VideoFilters $filters) {
                        $filters->resize(new \FFMpeg\Coordinate\Dimension(640, 480));
                    })
                        ->export()
                        ->toDisk('video')
                        ->inFormat(new X264)
                        ->save('480p/' . $q480p);
                    $update->q480p = $q480p;
                    // end 480p

                    // 360p
                    $q360p = '360p' . time() . '.mp4';
                    $video2->addFilter(function (VideoFilters $filters) {
                        $filters->resize(new \FFMpeg\Coordinate\Dimension(640, 360));
                    })
                        ->export()
                        ->toDisk('video')
                        ->inFormat(new X264)
                        ->save('360p/' . $q360p);
                    $update->q360p = $q360p;
                    // end 360p

                    // end Konversi Video
                }
            }
            // end Video

            // Audio
            if (storage_path('app/public/uploads/audio/' . $update->file == '')) {
                if ($ext == 'mp3' || $ext == 'm4a') {
                    $ext = $request->file('file')->extension();
                    $final = 'audio' . time() . '.' . $ext;
                    $request->file('file')->move(storage_path('app/public/uploads/audio/'), $final);
                    $update->file = $final;
                }
            } elseif (storage_path('app/public/uploads/audio/' . $update->file)) {
                unlink(storage_path('app/public/uploads/audio/' . $update->file));
                if ($ext == 'mp3' || $ext == 'm4a') {
                    $ext = $request->file('file')->extension();
                    $final = 'audio' . time() . '.' . $ext;
                    $request->file('file')->move(storage_path('app/public/uploads/audio/'), $final);
                    $update->file = $final;
                }
            }
            // end Audio
        }
        // end File 1

        // File 2
        if ($request->hasFile('file2')) {
            // $request->validate([
            //     'file' => 'required|mimes:eps,psd,ai,aep,aepx,prproj,aup3,sesx,als',
            // ]);

            $files2 = $request->file('file2');
            $ext2 = $files2->getClientOriginalExtension();

            // Project Photo
            if (storage_path('app/public/uploads/rawphoto/' . $update->file_mentah == '')) {
                if ($ext2 == 'eps' || $ext2 == 'psd' || $ext2 == 'ai' || $ext2 == 'cdr') {
                    $final2 = 'rawphoto' . time() . '.' . $ext2;
                    $request->file('file2')->move(storage_path('app/public/uploads/rawphoto'), $final2);
                    $update->file_mentah = $final2;
                }
            } elseif (storage_path('app/public/uploads/rawphoto/' . $update->file_mentah)) {
                unlink(storage_path('app/public/uploads/rawphoto/' . $update->file_mentah));
                if ($ext2 == 'eps' || $ext2 == 'psd' || $ext2 == 'ai' || $ext2 == 'cdr') {
                    $final2 = 'rawphoto' . time() . '.' . $ext2;
                    $request->file('file2')->move(storage_path('app/public/uploads/rawphoto'), $final2);
                    $update->file_mentah = $final2;
                }
            }
            // end Project Photo

            // Project Video
            if (storage_path('app/public/uploads/rawvideo/' . $update->file_mentah == '')) {
                if ($ext2 == 'aep' || $ext2 == 'aepx' || $ext2 == 'prproj') {
                    $final2 = 'rawvideo' . time() . '.' . $ext2;
                    $request->file('file2')->move(storage_path('app/public/uploads/rawvideo'), $final2);
                    $update->file_mentah = $final2;
                }
            } elseif (storage_path('app/public/uploads/rawvideo/' . $update->file_mentah)) {
                unlink(storage_path('app/public/uploads/rawvideo/' . $update->file_mentah));
                if ($ext2 == 'aep' || $ext2 == 'aepx' || $ext2 == 'prproj') {
                    $final2 = 'rawvideo' . time() . '.' . $ext2;
                    $request->file('file2')->move(storage_path('app/public/uploads/rawvideo'), $final2);
                    $update->file_mentah = $final2;
                }
            }
            // end Project Video

            // Project Audio
            if (storage_path('app/public/uploads/rawaudio/' . $update->file_mentah == '')) {
                if ($ext2 == 'aup3' || $ext2 == 'sesx' || $ext2 == 'als') {
                    $final2 = 'rawaudio' . time() . '.' . $ext2;
                    $request->file('file2')->move(storage_path('app/public/uploads/rawaudio'), $final2);
                    $update->file_mentah = $final2;
                }
            } elseif (storage_path('app/public/uploads/rawaudio/' . $update->file_mentah)) {
                unlink(storage_path('app/public/uploads/rawaudio/' . $update->file_mentah));
                if ($ext2 == 'aup3' || $ext2 == 'sesx' || $ext2 == 'als') {
                    $final2 = 'rawaudio' . time() . '.' . $ext2;
                    $request->file('file2')->move(storage_path('app/public/uploads/rawaudio'), $final2);
                    $update->file_mentah = $final2;
                }
            }
            // end Project Audio

            if ($ext2 == 'zip' || $ext2 == 'rar') {
                if ($pilkat == 3) {
                    if (storage_path('app/public/uploads/rawphoto/' . $update->file_mentah == '')) {
                        $final2 = 'rawphoto' . time() . '.' . $ext2;
                        $request->file('file2')->move(storage_path('app/public/uploads/rawphoto'), $final2);
                        $update->file_mentah = $final2;
                    } elseif (storage_path('app/public/uploads/rawphoto/' . $update->file_mentah)) {
                        unlink(storage_path('app/public/uploads/rawphoto/' . $update->file_mentah));
                        $final2 = 'rawphoto' . time() . '.' . $ext2;
                        $request->file('file2')->move(storage_path('app/public/uploads/rawphoto'), $final2);
                        $update->file_mentah = $final2;
                    }
                } elseif ($pilkat == 4) {
                    if (storage_path('app/public/uploads/rawvideo/' . $update->file_mentah == '')) {
                        $final2 = 'rawvideo' . time() . '.' . $ext2;
                        $request->file('file2')->move(storage_path('app/public/uploads/rawvideo'), $final2);
                        $update->file_mentah = $final2;
                    } elseif (storage_path('app/public/uploads/rawvideo/' . $update->file_mentah)) {
                        unlink(storage_path('app/public/uploads/rawvideo/' . $update->file_mentah));
                        $final2 = 'rawvideo' . time() . '.' . $ext2;
                        $request->file('file2')->move(storage_path('app/public/uploads/rawvideo'), $final2);
                        $update->file_mentah = $final2;
                    }
                } elseif ($pilkat == 5) {
                    if (storage_path('app/public/uploads/rawaudio/' . $update->file_mentah == '')) {
                        $final2 = 'rawaudio' . time() . '.' . $ext2;
                        $request->file('file2')->move(storage_path('app/public/uploads/rawaudio'), $final2);
                        $update->file_mentah = $final2;
                    } elseif (storage_path('app/public/uploads/rawaudio/' . $update->file_mentah)) {
                        unlink(storage_path('app/public/uploads/rawaudio/' . $update->file_mentah));
                        $final2 = 'rawaudio' . time() . '.' . $ext2;
                        $request->file('file2')->move(storage_path('app/public/uploads/rawaudio'), $final2);
                        $update->file_mentah = $final2;
                    }
                }
            }
        }
        // end File 2

        $request->validate([
            'title' => 'required',
            'body' => 'required',

        ], [
            'body.required' => 'deskripsi harus diisikan',
            'title.required' => 'title tidak boleh kosong'
        ]);
        $update->name = $request->title;
        $update->body = $request->body;
        $update->update();
        return redirect()->route('post_show', [$update->user_id, $user->name])->with('success', 'berhasil di edit');
    }
}
