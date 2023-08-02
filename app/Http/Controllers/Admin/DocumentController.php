<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index()
    {

        $documents = Document::all();
    
        return view('admin.document.index', compact('documents'));
    }

    public function store(Request $request)
    {
        foreach ($request->file('stock_file') as $file) {
            
            $url = Storage::put('/documents', $file);

            $name = explode("/", $url);

            $document = new Document();

            $document->name = $name[1];
            $document->url = $url;

            $document->save();
            
        }
        return redirect()->route('admin.document.index')->with('info','los documentos se agregaron con éxito');
    }

    public function deleteAllDocuments(){
        Storage::deleteDirectory('documents');
        Storage::createDirectory('documents');

        $documents = Document::all();

        foreach ($documents as $document) {
            $document->delete();
        }

        return redirect()->route('admin.document.index')->with('info','los documentos se eliminaron con éxito');
    }
}
