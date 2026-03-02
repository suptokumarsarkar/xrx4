<?php
namespace App;

use Illuminate\Support\Facades\Session;

class Util {

    public static function getVersion(){
        return rand();
    }
    public static function translate($d){
        $langCode = session('lang') ?? 'en';
        $lang = Util::loadLang($langCode);
        if(isset($lang[$d])){
            return Util::enterSepartor($lang[$d]);
        }else{
            return Util::enterSepartor(Util::updateLang($d));
        }
    }
    public static function enterSepartor($line) {
        return str_replace("\n","<br>", $line);
    }
    public static function loadLang($lang = 'en'){
        $file = file_get_contents(__DIR__."/../resources/lang/{$lang}.json");
        if($data = json_decode($file, true)){
            return $data;
        }else{
            Util::notify("Failed to load language file");
            return Util::loadLang('en');
        }
    }
    public static function updateLang($d, $lang = 'en'){
        $file = file_get_contents(__DIR__."/../resources/lang/{$lang}.json");
        if($data = json_decode($file, true)){
            if(isset($data[$d])){
                return $data[$d];
            }else{
                $data[$d] = Util::modifyText($d);
                $update = json_encode($data, true);
                file_put_contents(__DIR__."/../resources/lang/{$lang}.json",$update);
                return $data[$d];
            }
        }else{
            Util::notify("Failed to load language file");
        }
    }

    public static function modifyText($text){
        $text = preg_replace('/([a-z])([A-Z])/', '$1 $2', $text);
        $text = str_replace('_', ' ', $text);
        return $text;
    }
    public static function getFlagIcon($languageCode) {
        $flags = [
            'en' => '🇬🇧', // English
            'fr' => '🇫🇷', // French
            'nl' => '🇳🇱', // Dutch
            'bn' => '🇧🇩', // Bangla (Bangladesh)
            'hi' => '🇮🇳', // Hindi (India)
            'el' => '🇬🇷', // Greek
            // Add more languages and their flags here
        ];
    
        return $flags[$languageCode] ?? '🏳️'; // Default flag if language code not found
    }
    public static function getLangName($languageCode) {
        $flags = [
            'en' => 'English', // English
            'fr' => 'French', // French
            'nl' => 'Dutch', // Dutch
            'bn' => 'Bangla', // Bangla (Bangladesh)
            'hi' => 'Hindi', // Hindi (India)
            'el' => 'Greek', // Greek
            // Add more languages and their flags here
        ];
    
        return $flags[$languageCode] ?? '🏳️'; // Default flag if language code not found
    }



    public static function notify($message, $params = ['time' => 5000, 'animate' => true, 'type' => 'S']){
        if($params['type'] == 'S') $params['title'] = Util::translate("Success");
        if($params['type'] == 'W') $params['title'] = Util::translate("Warning");
        if($params['type'] == 'E') $params['title'] = Util::translate("Error");
        if($params['type'] == 'N') $params['title'] = Util::translate("Notice");
        $_SESSION['notify'][time() . "_" . rand()] = json_encode([$message, $params]);
    }
}