<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use Illuminate\Http\Request;
use League\CommonMark\Node\Block\Document;

class DocumentsController extends Controller
{
    public function store(Request $request)
    {
        $img = $request->file('scanned_documents')->store('docums', 'public');
        $request['scanned_documents'] = $img;

        Documents::create([
            'type_of_documents' => $request->type_doc,
            'scanned_documents' => $request->scanned_documents,
            'students_id' => $request->students_id,
        ]);
        return to_route('student.index');
    }
}
