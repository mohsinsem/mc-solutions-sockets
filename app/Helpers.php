    <?php
    
    use Illuminate\Support\Facades\Mail;

    use App\Models\Setting;
    use App\Models\Customers;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Crypt;
    use niklasravnsborg\LaravelPdf\Facades\Pdf;
    
    //get languages
    
    if (!function_exists("get_languages")) {
        function get_languages()
        {
            $languages = DB::select("select * from languages");
            return $languages;
        }
    }
    
    //get system currency
    if (!function_exists("get_currency")) {
        function get_currency()
        {
            if (cache()->has("currency")) {
                $currency = cache("currency");
            } else {
                $setting = setting("info");
                $currency = $setting["currency"];
                cache()->put("currency", $currency);
            }
            return $currency;
        }
    }
    
    //get formated price of things
    if (!function_exists("formated_price")) {
        function formated_price($price = 0)
        {
            if (cache()->has("currency")) {
                return number_format($price, 2) . " " . cache()->get("currency");
            } else {
                $setting = Setting::where("key", "info")->first()["value"];
                $setting = json_decode($setting, true);
                $currency = $setting["currency"];
                cache()->put("currency", $currency);
            }
    
            return $currency;
        }
    }
    
    if (!function_exists("get_currency")) {
        function get_currency()
        {
            if (cache()->has("currency")) {
                return cache()->get("currency");
            } else {
                $setting = Setting::where("key", "info")->first()["value"];
                $setting = json_decode($setting, true);
                $currency = $setting["currency"];
                cache()->put("currency", $currency);
            }
    
            return $currency;
        }
    }
    
    //get json setting as array
    if (!function_exists("setting")) {
        function setting($key)
        {
            $setting = Setting::where("key", $key)->first();
            if(isset($setting["value"]))
                $setting = json_decode($setting["value"], true);
    
            return $setting;
        }
    }
    
    function _print_r($data)
    {
        echo "<pre>";
        print_r($data);
        die();
    }
    
    function _echo($str)
    {
        echo $str;
        die();
    }
    
    
    function cleanText($string)
    {
        $string = str_replace("'", "", $string); // Replaces all spaces with hyphens.
        return preg_replace("/[^A-Za-z0-9@ ]/", "", $string); // Removes special chars.
    }
    
    
    function GeneratePassword()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return $randomPassword = substr(str_shuffle($characters), 0, 12); 
    }	