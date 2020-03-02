<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendInvoice;
use Illuminate\Support\Facades\Mail;

class InvoiceController extends Controller
{
    public function sendEmail()
    {
		$content = [
    		"CompanyName" => "Codingofcents",
    		"InvDate" => date("m/d/Y", strtotime(date("Y-m-d"))),
    		"InvNo" => "8910",
    		"CompanyAddress" => "Luwuk, Central Sulawesi, Indonesia",
    		"Details" => [
    			["Item" => "13 inch Macbook Pro", "Qty" =>  2, "Price" => 1299],
    			["Item" => "15 inch Macbook Pro", "Qty" =>  1, "Price" => 2399],
    		],
    		"Payment" => [
    			["Item" => "Total Tax", "Total" => 0],
    			["Item" => "Subtotal Price", "Total" => 4997],
    			["Item" => "Total Price", "Total" => 4997],
    		]
    	];

    	$subjects = "Invoice #8910";
    	$to = "bush7840@yahoo.com";
    	
    	Mail::to($to)->send(new SendInvoice($subjects, $content));
    	try {

    		return response()->json("Email Sent!");
    	} catch (\Exception $e) {
    		return response()->json($e->getMessage());
    	}
    }
}