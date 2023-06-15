<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class BackofficeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $allAlbums = DB::table('album')
            ->get();
        $allBands = DB::table('bands')
            ->get();
        return view('backoffice.backoffice', compact('allBands', 'allAlbums'));

    }
    public function addBand()
    {
        $allBands = DB::table('bands')
            ->get();
        return view('backoffice.addBand', compact('allBands'));
    }
    public function addAlbum()
    {
        $allBands = DB::table('bands')
            ->get();
        $allAlbums = DB::table('album')
            ->get();
        return view('backoffice.addAlbum', compact('allAlbums', 'allBands'));
    }
    public function editarBanda($id)
    {
        $myBand = DB::table('bands')
            ->where('id', $id)
            ->first();

        return view('backoffice.editBand', compact('myBand'));
    }
    public function editBand(Request $request)
    {
        $request->validate(['name' => 'required']);

        $image = $request->file('image');

        $query = [
            'name' => $request->name,
        ];

        if (!empty($image)) {
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);
            $query['image'] = $imageName;
        }

        DB::table('bands')
            ->where('id', $request->id)
            ->update($query);

        return redirect('/backoffice')->with('message', 'Banda editada com sucesso');
    }
    public function createBand(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string',
            ]
        );
        $query = [
            'name' => $request->name,
        ];

        $image = $request->file('image');

        if (!empty($image)) {
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);
            $query['image'] = $imageName;
        }

        DB::table('bands')->insert(
            ($query)
        );


        return redirect('/backoffice')->with('message', 'Banda adicionada com sucesso');
    }
    public function createAlbum(Request $request)
    {
        $request->validate(
            [
                'bands_id'=> 'required',
                'name' => 'required|string',
                'year' => 'required',
            ]
        );
        $query = [
            'bands_id' => $request->bands_id,
            'name' => $request->name,
            'year' => $request->year,
        ];

        $image = $request->file('image');

        if (!empty($image)) {
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);
            $query['image'] = $imageName;
        }

        DB::table('album')->insert(
            ($query)
        );



        return redirect('/backoffice')->with('message', 'Album adicionada com sucesso');
    }
    public function editarAlbum($id)
    {

        $allBands = DB::table('bands')
            ->get();
        $myAlbum = DB::table('album')
            ->where('id', $id)
            ->first();

        return view('backoffice.editAlbum', compact('myAlbum', 'allBands'));
    }
    public function editAlbum(Request $request)
    {
        $request->validate(['name' => 'required']);

        $image = $request->file('image');

        $query = [
            'bands_id' => $request->bands_id,
            'name' => $request->name,
            'year' => $request->year,
        ];

        if (!empty($image)) {
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);
            $query['image'] = $imageName;
        }

        DB::table('album')
            ->where('id', $request->id)
            ->update($query);

        return redirect('/backoffice')->with('message', 'Album editado com sucesso');
    }
}
