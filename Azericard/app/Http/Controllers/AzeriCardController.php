<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request; 
use App\Library\Azericard;

class AzeriCardController extends Controller
{
  public function example()
  {
    $azericard = new Azericard();
    $azericard->setDebug(true);
    $azericard->setTestUrl("https://testmpi.3dsecure.az/cgi-bin/cgi_link");			// Test Url
    $azericard->setProdUrl("https://mpi.3dsecure.az/cgi-bin/cgi_link");				// Production Url	
    $azericard->setAmount(1.99);													// Amount
    $azericard->setTerminal(77777777); 												// Terminal
    $azericard->setKeyForSing('00112233445566778899AABBCCDDEEFF');					// Key For Sing
	$azericard->setEmail("payment@example.com");									// Your Company Email
    $azericard->setMerchantUrl("Your Url");											// Your Company Url								
    $azericard->setDescription("Your Description");									// Your Company Description				
    $azericard->setMerchantName("Your Name");										// Your Company Name
    $azericard->setReturnUrl("https://www.example.com/azericard/return");			// URL that will be redirected after the payment is completed	
    $result = $azericard->initialize();												// Start Azericard 
    return $result;
  }
}
