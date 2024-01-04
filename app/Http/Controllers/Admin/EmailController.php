<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\MailableName;
use App\Models\Document;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function index()
    {

        return view('admin.email.index');
    }

    public function send(Request $request)
    {
        set_time_limit(270);
        $people = Person::where('status', true)->get();
        $documents = Document::all();

        foreach ($people as $person) {

            foreach ($documents as $document) {

                if(strpos($document->name, '_') !== false){
                    $documentName = explode('_',$document->name);

                    if((strpos($person->name, $documentName[1]) !== false) && (strpos($person->name, $documentName[0]) !== false)){
    
                        $data = [
                            "subject" => $request->subject,
                            "body" => $request->body,
                            "attachment" => public_path('/storage/'.$document->url)
                        ];
                        Mail::to($person->email)->send(new MailableName($data));
                  
                        break;
                    }
                }  
            } 
        }
        return redirect()->route('admin.email.index')->with('info','Los correos han sido enviados con éxito');

    }
}
