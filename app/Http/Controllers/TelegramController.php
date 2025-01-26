<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class TelegramController extends Controller
{
    protected $client;
    protected $botToken;

    public function __construct()
    {
        $this->client = new Client();
        $this->botToken = env("TELEGRAM_BOT_TOKEN");
    }

    public function handle(Request $request){
      Log::info('Telegram webhook received 1', ['data' => 1]);

        $data = $request->all();

        Log::info('Telegram webhook received', ['data' => $request->all()]);


        if(isset($data['message'])){
            $chatId = $data['message']['chat']['id'];

            $text = $data['message']['text'];
        Log::info('Message received', ['chatId' => $chatId, 'text' => $text]);

            if($text === "/start"){
                Log::info('Message start', ['chatId' => $chatId, 'text' => $text]);

                $this->sendMessage($chatId, "Welcome! Please provide your customer ID");
            }elseif(is_numeric($text)){
               // save telegram chat id
               $this->saveCustomerId($chatId, $text);
            }else{
                $this->sendMessage($chatId, "Invalid input. Please provide a Customer ID.");
            }
        }
    }

    private function saveCustomerId($chatId, $customerId){
        $customer = Customer::find($customerId);
        if($customer){
            $customer->telegram_chat_id  = $chatId;
            $customer->save();
            $this->sendMessage($chatId, "Thank you! Your Telegram account has been linked.");
        }else{
            $this->sendMessage($chatId, "Customer ID: {$customerId} not found. Please try again.");
        }
    }

    public function sendMessage($chatId, $message)
    {
      // $url = "https://api.telegram.org/bot{$this->botToken}/sendMessage";
      $url = "https://api.telegram.org/bot7629579832:AAEb6E2x4risVCUMmjqdA37l4BdFqlABP3Y/sendMessage";
      try {
        $this->client->post($url, [
          'json' => [
            'chat_id' => $chatId,
            'text' => $message,
          ],
        ]);
      } catch (\Exception  $e) {
        Log::error($e->getMessage());

        Log::info('Telegram Bot Token:', ['token' => env("TELEGRAM_BOT_TOKEN")]);
      }
    }
}
