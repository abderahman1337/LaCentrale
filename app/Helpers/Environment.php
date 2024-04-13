<?php
namespace App\Helpers;

use App\Models\ColorSetting;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;

class Environment{

   static function set($key, $value){
      /* $envFile = app()->environmentFilePath();
      $str = file_get_contents($envFile);
      if (is_bool(env($envKey))) {
         $oldValue = var_export(env($envKey), true);
      } else {
         $oldValue = env($envKey);
      }

      if (strpos($str, $envKey) != false) {
         $str = str_replace("{$envKey}={$oldValue}", "{$envKey}={$envValue}", $str);
      } else {
         $str .= "\n{$envKey}={$envValue}\n";
      }
      $fp = fopen($envFile, 'w');
      fwrite($fp, $str);
      fclose($fp);
      return $envValue; */
      $envFile = app()->environmentFilePath();
         $currentEnv = file_get_contents($envFile);

         // Check if the variable already exists in the .env file
         if (strpos($currentEnv, "{$key}=") !== false) {
            // If it exists, update the value
            $currentEnv = preg_replace("/{$key}=.*/", $key.'='.'"'.$value.'"', $currentEnv);
         } else {
            // If it doesn't exist, append the new variable
            $currentEnv .= '\n'.$key.'='.'"'.$value.'"\n';
         }

         // Write the updated contents back to the .env file
         file_put_contents($envFile, $currentEnv);
   }


}
