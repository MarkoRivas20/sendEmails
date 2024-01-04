<?php

namespace App\Livewire\Admin;

use App\Mail\MailableName;
use App\Models\Document;
use App\Models\Person;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class SendEmails extends Component
{
    public $subject;
    public $body;
    public function render()
    {
        return view('livewire.admin.send-emails');
    }

    public function send()
    {

        //if($this->subject && $this->body){

            set_time_limit(270);
            $people = Person::where('status', true)->get();
            $documents = Document::all();

    
            foreach ($people as $person) {
    
                foreach ($documents as $document) {
    
                    if(strpos($document->name, '_') !== false){
                        $documentName = explode('_',$document->name);
    
                        if((strpos($person->name, $documentName[1]) !== false) && (strpos($person->name, $documentName[0]) !== false)){
        
                            $data = [
                                "subject" => $this->subject,
                                "body" => $this->body,
                                "attachment" => public_path('/storage/'.$document->url)
                            ];
                            Mail::to($person->email)->send(new MailableName($data));
                      
                            break;
                        }
                    }
                } 
            }
    
            return redirect()->route('admin.email.index')->with('info','Los correos han sido enviados con éxito');

        /*}else{


        }*/

    }
}
