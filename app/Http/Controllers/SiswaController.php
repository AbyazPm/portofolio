<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use App\Models\Siswa;
use File;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Siswa::all();
        // return($data);
        return view('mastersiswa', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mastersiswac');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages=[
        'required' => ':attribute harus diisi gess',
        'min' => ':attribute minimal :min karakter ya gess',
        'max' => ':attribute maksimal :max karakter ya gess',
        'numeric' => ':attribute harus diisi angka gess',
        'nimes' => 'file: attribute harus bertipe jpg,png,jpeg,svg,gif'
        ];
       $this->validate($request,[
        'nisn'=> 'required|numeric|',
        'nama' => 'required|min:5|max:20',
        'alamat' => 'required|min:5',
        'jk' => 'required',
        'email' => 'required',
        'foto' => 'required|mimes:jpg,jpeg,png,gif,svg',
        'about' => 'required|min:10'
       ], $messages); 

    //    ambil informasi file yang diupload
    $file = $request->file('foto');

    // rename|ambil nama file
    $nama_file = time()."_".$file->getClientOriginalName();

    // proses upload
    $tujuan_upload = './template/img';
    $file->move($tujuan_upload,$nama_file);

    // proses insert Database
    Siswa::create([
        'nisn'=> $request->nisn,
        'nama' => $request->nama,
        'alamat' => $request->alamat,
        'jk' => $request->jk,
        'email' => $request->email,
        'foto' => $nama_file,
        'about' => $request->about
    ]);

    return redirect('/mastersiswa');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Siswa::find($id);
        $kontak = Siswa::find($id)->kontak;
        // $kontak = $data->kontak;

        // return response()->json($kontak);        
        return view('mastersiswas', compact('data','kontak'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Siswa::find($id);
        return view('mastersiswae', compact('data'));
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
        $messages=[
            'required' => ':attribute harus diisi gess',
            'min' => ':attribute minimal :min karakter ya gess',
            'max' => ':attribute maksimal :max karakter ya gess',
            'mimes' => 'file: attribute harus bertipe png,jpeg,svg,gif',
            'numeric' => ':attribute harus diisi angka gess',
            ];
           $this->validate($request,[
            'nisn'=> 'required|numeric|',
            'nama' => 'required|min:5|max:20',
            'alamat' => 'required|min:5',
            'jk' => 'required',
            'email' => 'required',
            'foto' => 'image|file|mimes:jpg,jpeg,gif,svg',
            'about' => 'required|min:10'
           ], $messages); 

           if($request->foto !=''){

    $siswa=Siswa::find($id);
    file::delete('./template/img/'.$siswa->foto);

    //    ambil informasi file yang diupload
    $file = $request->file('foto');

    // rename|ambil nama file
    $nama_file = time()."_".$file->getClientOriginalName();

    // proses upload
    $tujuan_upload = './template/img';
    $file->move($tujuan_upload,$nama_file);

    $siswa=Siswa::find($id);
    $siswa->nisn=$request->nisn;
    $siswa->nama=$request->nama;
    $siswa->alamat=$request->alamat;
    $siswa->jk=$request->jk;
    $siswa->email=$request->email;
    $siswa->about=$request->about;
    $siswa->foto=$nama_file;
    $siswa->save();
    return redirect('mastersiswa');

           }else{
            $siswa=Siswa::find($id);
            $siswa->nisn=$request->nisn;
            $siswa->nama=$request->nama;
            $siswa->alamat=$request->alamat;
            $siswa->jk=$request->jk;
            $siswa->email=$request->email;
            $siswa->about=$request->about;
            $siswa->save();
            return redirect('mastersiswa');
           }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
    public function hapus($id)
    {
        $data=Siswa::find($id)->delete();
        return redirect('mastersiswa');
    }
}
