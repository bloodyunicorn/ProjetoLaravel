<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
class BandController extends Controller
{


    public function numOfAlbums($id)
    {
        $albums = $this->getAlbumsFromBand($id);
        return count($albums);
    }

    public function all_bands()
    {

        $search = request()->query('search') ? request()->query('search') : null;

        if (request()->query('bands_id')) {

            $allBands = DB::table('bands')
                ->where('id', request()->query('bands_id'))
                ->get();


        } else {
            $allBands = DB::table('bands')
                ->get();

        }


        if ($search) {
            $allBands = DB::table('bands')
                ->where('name', 'LIKE', "%{$search}%")
                ->get();
        }

        foreach ($allBands as $band) {
            $band->num = $this->numOfAlbums($band->id);
        }

    return view('home.bands', compact('allBands'));
}
public function viewBand($id)
    {
        $myBand = DB::table('bands')
            ->where('id', $id)
            ->first();

        $allAlbums = $this->getAlbumsFromBand($id);


        return view('home.show_band', compact('myBand', 'allAlbums'));
    }

    public function deleteBand($id)
    {

        DB::table('album')
            ->where('bands_id', $id)
            ->delete();


        DB::table('bands')
            ->where('id', $id)
            ->delete();

        return back();
    }
    public function deleteAlbum($id)
    {

        DB::table('album')
            ->where('id', $id)
            ->delete();

        return back();
    }
    protected function getAlbums()
    {

        $allAlbums = DB::table('album')
            ->join('bands', 'bands.id', '=', 'album.bands_id')
            ->select('album.*', 'bands.name as band')
            ->get();

        return $allAlbums;
    }

    protected function getAlbumsFromBand($id)
    {

        $allAlbumsFromId = DB::table('album')
            ->where('bands_id', $id)
            ->select('album.*')
            ->get();

        return $allAlbumsFromId;
    }



}
