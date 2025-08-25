<?php

namespace App\Http\Controllers\Web\Frontend;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DocumentController extends Controller
{
    public function sendSmsDocument()
    {
        return Inertia::render('document/SmsDocument');
    }

    public function checkBalance()
    {
        return Inertia::render('document/CheckBalance');
    }

    public function sendSmsUsingJson()
    {
        return Inertia::render('document/SmsJson');
    }

    public function sendSmsUsingXml()
    {
        return Inertia::render('document/SmsXml');
    }

    public function utilities()
    {
        return Inertia::render('document/Utilities');
    }

     public function docGeneral()
    {
        return Inertia::render('document/DocGeneral');
    }

    public function contactsInterface()
    {
        return Inertia::render('document/ContactsInterface');
    }
}
