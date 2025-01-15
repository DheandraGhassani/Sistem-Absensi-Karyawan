<?php

namespace App\Http\Controllers;

use App\Models\RequestCuti;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RequestCutiController extends Controller
{
    //
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'employee_id' => 'required|exists:employees,id',
            'jenis_cuti' => 'required|in:Cuti,Izin,Sakit',
            'tanggal_pengajuan_mulai' => 'required|date',
            'tanggal_pengajuan_selesai' => 'required|date|after_or_equal:tanggal_pengajuan_mulai',
            'jumlah' => 'required|integer|min:1',
            'lampiran_file' => 'nullable|file|mimes:jpg,png,pdf|max:10240',
        ]);


        // Store the file if uploaded
        $lampiranFile = null;
        if ($request->hasFile('lampiran_file')) {
            $lampiranFile = $request->file('lampiran_file')->store('lampiran_cuti', 'public');
        }

        $employee = Auth::user()->employee->first();

        $tanggalMulai = Carbon::createFromFormat('m/d/Y', $request->tanggal_pengajuan_mulai);
        $tanggalSelesai = Carbon::createFromFormat('m/d/Y', $request->tanggal_pengajuan_selesai);

        // Calculate the difference in days
        $selisihHari = $tanggalMulai->diffInDays($tanggalSelesai);

        $tanggalMulaiFormatted = $tanggalMulai->format('Y-m-d');
        $tanggalSelesaiFormatted = $tanggalSelesai->format('Y-m-d');

        // Create a new leave request
        RequestCuti::create([
            'employee_id' => $employee->id,
            'jenis_cuti' => $request->jenis_cuti,
            'status' => 'Pending',
            'tanggal_pengajuan_mulai' => $tanggalMulaiFormatted,
            'tanggal_pengajuan_selesai' =>  $tanggalSelesaiFormatted,
            'jumlah' => $selisihHari,
            'lampiran_file' => $lampiranFile,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Success request cuti',
        ]);
    }
}
