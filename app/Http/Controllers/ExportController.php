<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use App\Http\Requests\NoteRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Dompdf\Dompdf;
use PDF;

class ExportController extends Controller
{
    public function exportToPDF(Request $request)
    {
        $user = Auth::user();

        $exportType = $request->query('type');

        if ($exportType === '3days') {
            $startDate = Carbon::now()->subDays(3)->toDateString();
            $endDate = Carbon::now()->endOfDay();
        } elseif ($exportType === 'week') {
            $startDate = Carbon::now()->subDays(7)->toDateString();
            $endDate = Carbon::now()->endOfDay();
        } elseif ($exportType === 'month') {
            $startDate = Carbon::now()->startOfMonth()->toDateString();
            $endDate = Carbon::now()->endOfMonth()->endOfDay();
        } else {
        }

        $data = Note::where('user_id', $user->id)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->get();

        $html = view('pdf.export', ['notes' => $data])->render();
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        $dompdf->render();

        return $dompdf->stream('Dienasgramata.pdf');
    }
}
