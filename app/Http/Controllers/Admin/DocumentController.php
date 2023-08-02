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

            $document = new Document();

            $document->name = $file->getClientOriginalName();
            $document->url = $url;

            $document->save();
            
        }
        return redirect()->route('admin.document.index')->with('info','los documentos se agregaron con éxito');
    }

    public function deleteAllDocuments(){

        $documents = Document::all();

        foreach ($documents as $document) {
            Storage::delete($document->url);
            $document->delete();
        }

        return redirect()->route('admin.document.index')->with('info','los documentos se eliminaron con éxito');
    }

    public function destroy(Document $document)
    {
        Storage::delete($document->url);
        $document->delete();
        return redirect()->route('admin.document.index')->with('info','el documento se eliminó con éxito');
    }
}
