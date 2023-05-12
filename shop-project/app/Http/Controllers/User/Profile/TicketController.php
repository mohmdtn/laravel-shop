<?php

namespace App\Http\Controllers\User\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Profile\TicketAnswerRequest;
use App\Http\Requests\User\Profile\TicketRequest;
use App\Http\Services\file\FileService;
use App\Models\Ticket\Ticket;
use App\Models\Ticket\TicketCategory;
use App\Models\Ticket\TicketFile;
use App\Models\Ticket\TicketPriority;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    public function index() {
        $user = Auth::user();
        $tickets = $user->tickets()->whereNull("ticket_id")->get();
        return view("user.profile.tickets.tickets", compact("tickets"));
    }

    public function show(Ticket $ticket) {
        return view("user.profile.tickets.showTicket", compact("ticket"));
    }

    public function change(Ticket $ticket) {
        $ticket["status"] = $ticket["status"] == 0 ? 1 : 0;
        $ticket->save();
        return redirect()->back()->with("swal-success", "تغیرات شما با موفقیت اعمال شد");
    }

    public function answer(TicketAnswerRequest $request, Ticket $ticket) {
        $inputs                 = $request->all();
        $inputs["subject"]      = $ticket["subject"];
        $inputs["description"]  = $request["description"];
        $inputs["seen"]         = 0;
        $inputs["reference_id"] = $ticket["reference_id"];
        $inputs["user_id"]      = auth()->user()->id;
        $inputs["category_id"]  = $ticket["category_id"];
        $inputs["priority_id"]  = $ticket["priority_id"];
        $inputs["ticket_id"]    = $ticket["id"];
        $inputs["status"]       = 1;

        Ticket::create($inputs);
        return redirect()->back()->with("swal-success", "پاسخ شما با موفقیت ثبت شد.");
    }

    public function create() {
        $categories = TicketCategory::all();
        $priorities = TicketPriority::all();
        return view("user.profile.tickets.create", compact("categories", "priorities"));
    }

    public function store(TicketRequest $request, FileService $fileService) {
        DB::transaction(function () use($request, $fileService) {
            $inputs = $request->all();
            $inputs["user_id"] = auth()->user()->id;
            $ticket = Ticket::create($inputs);

            // ticket file
            if ($request->hasFile("file")){
                $fileService->setExclusiveDirectory("files" . DIRECTORY_SEPARATOR ."ticket-files");
                $fileService->setFileSize($request->file("file"));
                $fileSize = $fileService->getFileSize();
                $result = $fileService->moveToPublic($request->file("file"));
                $fileFormat = $fileService->getFileFormat();

                $inputs["ticket_id"] = $ticket->id;
                $inputs["user_id"]   = auth()->user()->id;
                $inputs["file_path"] = $result;
                $inputs["file_size"] = $fileSize;
                $inputs["file_type"] = $fileFormat;
                TicketFile::create($inputs);

            }
            // ticket file
        });

        return redirect()->route("user.profile.tickets")->with("swal-success", "تیکت شما با موفقیت ثبت شد.");
    }

}
