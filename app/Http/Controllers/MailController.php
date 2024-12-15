<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Response;

class MailController extends Controller
{
    public function mail()
    {
        $details = [
            'body' => 'Alert Message.'
        ];

        Mail::to('ayushashah4@gmail.com')->send(new SendEmail($details));

        return "Email sent successfully!";
    }

    public function downloadPdf()
    {
        $csvFile = public_path('AI_Model/saved_model.csv');
        $data = array_map('str_getcsv', file($csvFile));

        $pdf = Pdf::loadView('pdf_table', ['data' => $data]);

        return $pdf->download('data_table.pdf');
    }

    public function downloadCsv()
    {
        // Path to the CSV file
        $csvFile = public_path('AI_Model/saved_model.csv');

        // Check if the file exists
        if (!file_exists($csvFile)) {
            abort(404, 'CSV file not found.');
        }

        // Return the CSV file as a download response
        return Response::download($csvFile, 'data.csv', [
            'Content-Type' => 'text/csv',
        ]);
    }
}


