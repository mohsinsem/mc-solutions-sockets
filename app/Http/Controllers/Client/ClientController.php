<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ResetPasswordRequest;
use App\Http\Requests\Admin\ResetMailRequest;
use App\Http\Requests\Admin\LoginRequest;
use App\Http\Requests\Client\ChangePasswordRequest;
use App\Models\{User,CustomerLoginLogs,Payments,CustomerPaymentMethod,EcommercePstatus,PaymentMethods,Countries};
use App\Models\Client\Customers;
use App\Models\Setting;
use App\Models\ImeiOrder;
use App\Mail\ResetPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;
use Psy\Util\Str;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Crypt;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportSelectedInovices;
use App\Exports\ExportSelectedImeiOrders;
use App\Exports\ExportSelectedServerOrders;
use App\Rules\ValidatePassword;
use Twilio\Rest\Pricing\V2\Voice\CountryList;
use Illuminate\Support\Facades\Hash;
use Response;
use App\Mail\GeneralMail;
use App\Mail\ImeiOrderMail;

class ClientController extends Controller
{

   
	
}
