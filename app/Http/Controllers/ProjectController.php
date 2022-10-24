<?php

namespace App\Http\Controllers;
use App\Models\Projek;
use App\Models\Siswa;
use Illuminate\Http\Request;
use File;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projek = Projek::all();
        $data = Siswa::all('id','nisn','nama');
        return view('masterproject', compact('projek','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id_siswa = request()->query('siswa');
        $siswa = Siswa::all();
        return view('masterprojectc',compact('siswa','id_siswa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required'=>':attribute minimal diisi dong kak',
            'min'=>':attribute minimal :min karakter lah ya',
            'max'=>':attribute maksimal :max karakter dong'
        ];

        $this->validate($request,[
            'siswa_id'=>'required',
            'nama_projek'=>'required',
            'tanggal'=>'required',
            'deskripsi'=>'required',
            'foto'=>'required'
        ], $messages);

        $file = $request->file('foto');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = './template/img';
        $file->move($tujuan_upload, $nama_file);

        Projek::create([
            'siswa_id'=>$request->siswa_id,
            'nama_projek'=>$request->nama_projek,
            'tanggal'=>$request->tanggal,
            'deskripsi'=>$request->deskripsi,
            'foto'=>$nama_file
        ]);

        return redirect('/masterproject');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Siswa::find($id)->projek()->get();
        return view('masterprojects', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Projek::find($id);
        return view('masterprojecte', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'required'=>':attribute minimal diisi dong kak',
            'min'=>':attribute minimal :min karakter lah ya',
            'max'=>':attribute maksimal :max karakter dong'
        ];

        $this->validate($request,[
            'nama_projek'=>'required|min:5|max:20',
            // 'tanggal'=>'required',
            'deskripsi'=>'required',
            'foto'=>'mimes:jpg,jpeg,png,gif,svg'
        ], $messages);

        if($request->foto != ''){
            // ganti foto

            // 1. hapus foto lama
            $projek=Projek::find($id);
            file::delete('./template/img'.$projek->foto);
            // 2. ambil informasi yang diiupload
        $file = $request->file('foto');

        // 3. rename
        $nama_file = time()."_".$file->getClientOriginalName();

        // 4. proses upload
        $tujuan_upload = './template/img';
        $file->move($tujuan_upload, $nama_file);

        // 5. menyimpan ke database
        $projek->nama_projek=$request->nama_projek;
        // $projek->tanggal=$request->tanggal;
        $projek->deskripsi=$request->deskripsi;
        $projek->foto=$nama_file;
        $projek->save();
        return redirect ('masterproject');

        }else{
            // tanpa ganti foto
            $projek=Projek::find($id);
            $projek->nama_projek=$request->nama_projek;
            // $projek->tanggal=$request->tanggal;
            $projek->deskripsi=$request->deskripsi;
            $projek->update();
            return redirect ('masterproject');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hapus($id)
    {
        $data = Projek::destroy($id);
        return redirect ('masterproject');
    }
}
