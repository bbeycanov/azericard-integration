<?php
namespace App\Library; 

class Azericard
{
  protected $DEBUG;
  protected $TEST_URL;
  protected $PROD_URL;
  protected $AMOUNT;
  protected $CURRENCY;
  protected $ORDER;
  protected $DESC;
  protected $MERCH_NAME;
  protected $MERCH_URL;
  protected $TERMINAL;
  protected $EMAIL;
  protected $TRTYPE;
  protected $COUNTRY;
  protected $MERCH_GMT;
  protected $TIMESTAMP;
  protected $NONCE;
  protected $BACKREF;
  protected $KEY_SIGN;
  protected $P_SIGN;
  protected $LANG;

  public function __construct()
  {
    $this->setLang();
    $this->setOrder();
    $this->setCurrency();
    $this->setTrtType();
    $this->setCountry();
    $this->setMerchantGmt();
    $this->setTimeStamp();
    $this->setNonce();
  }

  public function setDebug($debug = false)
  {
    if($debug != false)
    {
      $this->DEBUG = $debug;
    }
    else
    {
      $this->DEBUG = false;
    }
  }

  public function getDebug()
  {
    return $this->DEBUG;
  }

  public function setTestUrl($test_url)
  {
    $this->TEST_URL = $test_url;
  }

  public function getTestUrl()
  {
    return $this->TEST_URL;
  }

  public function setProdUrl($prod_url)
  {
    $this->PROD_URL = $prod_url;
  }

  public function getProdUrl()
  {
    return $this->PROD_URL;
  }

  public function setAmount($amount = false)
  {
    if($amount != false){
      $this->AMOUNT = round($amount, 2);
    }
  }

  public function getAmount()
  {
    return $this->AMOUNT;
  }

  public function setCurrency($currency = false)
  {
    if($currency != false){
      $this->CURRENCY = $currency;
    }
    else{
      $this->CURRENCY = "AZN";
    }
  }

  public function getCurrency()
  {
    return $this->CURRENCY;
  }

  public function setOrder($order = false)
  {
    if($order != false)
    {
      $this->ORDER = $order;
    }
    else
    {
      $this->ORDER = rand(111111111111,999999999999);
    }
  }

  public function getOrder()
  {
    return $this->ORDER;
  }

  public function setDescription($desc = false)
  {
    if($desc != false)
    {
      $this->DESC = (string) $desc;
    }
    else
    {
      $this->DESC = '';
    }
  }

  public function getDescription()
  {
    return $this->DESC;
  }

  public function setMerchantName($user_fullname = false)
  {
    if($user_fullname != false)
    {
      $this->MERCH_NAME = $user_fullname;
    }
    else
    {
      $this->exception("Required Merchant Name");
    }
  }

  public function getMerchantName()
  {
    return $this->MERCH_NAME;
  }

  public function setMerchantUrl($merchant_url = false)
  {
    if($merchant_url != false)
    {
      $this->MERCH_URL = $merchant_url;
    }
    else
    {
      $this->MERCH_URL = url('/azericard/return');
    }
  }

  public function getMerchantUrl()
  {
    return $this->MERCH_URL;
  }

  public function setMerchantGmt($gmt = false)
  {
    if($gmt != false)
    {
      $this->MERCH_GMT = $gmt;
    }
    else
    {
      $this->MERCH_GMT = "+4";
    }
  }

  public function getMerchantGmt()
  {
    return $this->MERCH_GMT;
  }

  public function setTerminal($termianl = false)
  {
    if($termianl != false)
    {
      $this->TERMINAL = $termianl;
    }
    else
    {
      $this->TERMINAL = 77777777;
    }
  }

  public function getTerminal()
  {
    return $this->TERMINAL;
  }

  public function setEmail($email)
  {
    if($email != false)
    {
      $this->EMAIL = $email;
    }
    else
    {
      $this->exception("Required Merchant Name");
    }
  }

  public function getEmail()
  {
    return $this->EMAIL;
  }


  public function setTrtType($trtType = false)
  {
    if($trtType != false)
    {
      $this->TRTYPE = $trtType;
    }
    else
    {
      $this->TRTYPE = 1;
    }
  }

  public function getTrtType()
  {
    return $this->TRTYPE;
  }

  public function setCountry($country = false)
  {
    if($country != false)
    {
      $this->COUNTRY = $country;
    }
    else
    {
      $this->COUNTRY = "AZ";
    }
  }

  public function getCountry()
  {
    return $this->COUNTRY;
  }

  public function setTimeStamp()
  {
    $this->TIMESTAMP = gmdate("YmdHis");
  }

  public function getTimeStamp()
  {
    return $this->TIMESTAMP;
  }


  public function setNonce()
  {
    $this->NONCE = substr(md5(rand()),0,16);
  }

  public function getNonce()
  {
    return $this->NONCE;
  }

  public function setReturnUrl($return_url)
  {
    if($return_url != false)
    {
      $this->BACKREF = $return_url;
    }
    else
    {
      $this->BACKREF = url('/azericard/return');
    }
  }

  public function getReturnUrl()
  {
    return $this->BACKREF;
  }

  public function setLang($lang = false)
  {
    if($lang != false)
    {
      $this->LANG = $lang;
    }
    else
    {
      $this->LANG = "AZ";
    }
  }

  public function getLang()
  {
    return $this->LANG;
  }

  public function setKeyForSing($key_for_sign = false)
  {
    if($key_for_sign != false)
    {
      $this->KEY_SIGN = $key_for_sign;
    }
    else
    {
      $this->exception("Required Key for Sing");
    }
  }

  public function getKeyForSing()
  {
    return $this->KEY_SIGN;
  }

  public function setPSing($p_sing = false)
  {
    if($p_sing != false)
    {
      $this->P_SIGN = $p_sing;
    }
    else
    {
      	$to_sign =
           strlen($this->getAmount()).$this->getAmount()
  				.strlen($this->getCurrency()).$this->getCurrency()
  				.strlen($this->getOrder()).$this->getOrder()
  				.strlen($this->getDescription()).$this->getDescription()
  				.strlen($this->getMerchantName()).$this->getMerchantName()
  				.strlen($this->getMerchantUrl()).$this->getMerchantUrl()
  				.strlen($this->getTerminal()).$this->getTerminal()
  				.strlen($this->getEmail()).$this->getEmail()
  				.strlen($this->getTrtType()).$this->getTrtType()
  				.strlen($this->getCountry()).$this->getCountry()
  				.strlen($this->getMerchantGmt()).$this->getMerchantGmt()
  				.strlen($this->getTimeStamp()).$this->getTimeStamp()
  				.strlen($this->getNonce()).$this->getNonce()
  				.strlen($this->getReturnUrl()).$this->getReturnUrl();

        $this->P_SIGN = hash_hmac('sha1',$to_sign, $this->hex2bin($this->getKeyForSing()));
    }
  }

  public function getPSing()
  {
    return $this->P_SIGN;
  }

  public function hex2bin($hexdata) {
    $bindata="";

    for ($i=0;$i<strlen($hexdata);$i+=2) {
      $bindata.=chr(hexdec(substr($hexdata,$i,2)));
    }

    return $bindata;
  }

  public function generate_template()
  {
    $template  = '<input name="AMOUNT" value="'.$this->getAmount().'" type="hidden"/>';
    $template .= '<input name="CURRENCY" value="'.$this->getCurrency().'" type="hidden"/>';
    $template .= '<input name="ORDER" value="'.$this->getOrder().'" type="hidden"/>';
    $template .= '<input name="DESC" value="'.$this->getDescription().'" type="hidden"/>';
    $template .= '<input name="MERCH_NAME" value="'.$this->getMerchantName().'" type="hidden"/>';
    $template .= '<input name="MERCH_URL" value="'.$this->getMerchantUrl().'" type="hidden"/>';
    $template .= '<input name="TERMINAL" value="'.$this->getTerminal().'" type="hidden"/>';
    $template .= '<input name="EMAIL" value="'.$this->getEmail().'" type="hidden"/>';
    $template .= '<input name="TRTYPE" value="'.$this->getTrtType().'" type="hidden"/>';
    $template .= '<input name="COUNTRY" value="'.$this->getCountry().'" type="hidden"/>';
    $template .= '<input name="MERCH_GMT" value="'.$this->getMerchantGmt().'" type="hidden"/>';
    $template .= '<input name="TIMESTAMP" value="'.$this->getTimeStamp().'" type="hidden"/>';
    $template .= '<input name="NONCE" value="'.$this->getNonce().'" type="hidden">';
    $template .= '<input name="BACKREF" value="'.$this->getReturnUrl().'" type="hidden"/>';
    $template .= '<input name="LANG" value="'.$this->getLang().'" type="hidden">';
    $template .= '<input name="P_SIGN" value="'.$this->getPSing().'" type="hidden"/>';
    return $template;
  }

  public function generate_form()
  {
    $url = ($this->getDebug()) ? $this->getTestUrl() :  $this->getProdUrl();
    $form  = '<form ACTION="'.$url.'" METHOD="POST">';
    $form .= $this->generate_template();
    $form .= '<input alt="submit" type="submit">';
    $form .= '</form>';
    return $form;
  }

  public function exception($message)
  {
	echo"<pre>";
    print_r($message);
	echo"</pre>";
    die();
  }

  public function initialize()
  {
    $this->setPSing();
    return $this->generate_form();
  }
}
