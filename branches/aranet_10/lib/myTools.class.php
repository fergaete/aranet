<?php

class myTools
{
    
    public static function array_in_array($needle, $haystack) {
        //Make sure $needle is an array for foreach
        if(!is_array($needle)) $needle = array($needle);
        //For each value in $needle, return TRUE if in $haystack
        foreach($needle as $pin)
            if(in_array($pin, $haystack)) return true;
        //Return FALSE if none of the values from $needle are found in $haystack
        return false;
    }

    public static function removeStopWordsFromArray($words)
    {
        $stop_words = array(
            "de", "la", "que", "el", "en", "y", "a", "los", "del", "se", "las", "por", "un", "para", "con", "no", "una", "su", "al", "es", "lo", "como", "más", "pero", "sus", "le", "ya", "o", "fue", "este", "ha"
            , "sí", "porque", "esta", "son", "entre", "está", "cuando", "muy", "sin", "sobre", "ser", "tiene", "también", "me", "hasta", "hay", "donde", "han", "quien", "están", "estado", "desde"
            , "todo", "nos", "durante", "estados", "todos", "uno", "les", "ni", "contra", "otros", "fueron", "ese", "eso", "había", "ante", "ellos", "e", "esto", "mí", "antes", "algunos", "qué"
            , "unos", "yo", "otro", "otras", "otra", "él", "tanto", "esa", "estos", "mucho", "quienes", "nada", "muchos", "cual", "sea", "poco", "ella", "estar", "haber", "estas", "estaba", "estamos"
            , "algunas", "algo", "nosotros", "mi", "me", "mis", "tú", "te", "ti", "tu", "tus", "ellas", "nosotras", "vosostros", "vosostras", "os", "mío", "mía", "míos", "mías", "tuyo", "tuya", "tuyos"
            , "tuyas", "suyo", "suya", "suyos", "suyas", "nuestro", "nuestra", "nuestros", "nuestras", "vuestro", "vuestra", "vuestros", "vuestras", "esos", "esas", "estoy", "estás"
            , "está", "estamos", "estáis", "están", "esté", "estés", "estemos", "estéis", "estén", "estaré", "estarás", "estará", "estaremos", "estaréis", "estarán", "estaría", "estarías"
            , "estaríamos", "estaríais", "estarían", "estaba", "estabas", "estábamos", "estabais", "estaban", "estuve", "estuviste", "estuvo", "estuvimos", "estuvisteis"
            , "estuvieron", "estuviera", "estuvieras", "estuviéramos", "estuvierais", "estuvieran", "estuviese", "estuvieses", "estuviésemos", "estuvieseis", "estuviesen"
            , "estando", "estado", "estada", "estados", "estadas", "estad", "he", "has", "ha", "hemos", "habéis", "han", "haya", "hayas", "hayamos", "hayáis", "hayan", "habré", "habrás", "habrá"
            , "habremos", "habréis", "habrán", "habría", "habrías", "habríamos", "habríais", "habrían", "había", "habías", "habíamos", "habíais", "habían", "hube", "hubiste", "hubo"
            , "hubimos", "hubisteis", "hubieron", "hubiera", "hubieras", "hubiéramos", "hubierais", "hubieran", "hubiese", "hubieses", "hubiésemos", "hubieseis", "hubiesen"
            , "habiendo", "habido", "habida", "habidos", "habidas", "soy", "eres", "es", "somos", "sois", "son", "sea", "seas", "seamos", "seáis", "sean", "seré", "serás", "será", "seremos", "seréis"
            , "serán", "sería", "serías", "seríamos", "seríais", "serían", "era", "eras", "éramos", "erais", "eran", "fui", "fuiste", "fue", "fuimos", "fuisteis", "fueron", "fuera", "fueras", "fuéramos"
            , "fuerais", "fueran", "fuese", "fueses", "fuésemos", "fueseis", "fuesen", "sintiendo", "sentido", "sentida", "sentidos", "sentidas", "siente", "sentid", "tengo", "tienes", "tiene", "tenemos"
            , "tenéis", "tienen", "tenga", "tengas", "tengamos", "tengáis", "tengan", "tendré", "tendrás", "tendrá", "tendremos", "tendréis", "tendrán"
            , "tendría", "tendrías", "tendríamos", "tendríais", "tendrían", "tenía", "tenías", "teníamos", "teníais", "tenían", "tuve", "tuviste", "tuvo", "tuvimos", "tuvisteis", "tuvieron"
            , "tuviera", "tuvieras", "tuviéramos", "tuvierais", "tuvieran", "tuviese", "tuvieses", "tuviésemos", "tuvieseis", "tuviesen", "teniendo", "tenido", "tenida", "tenidos", "tenidas", "tened", "efe");

        return array_diff($words, $stop_words);
    }

    public static function stemPhrase($phrase)
    {
        // split into words
        $words = str_word_count(strtolower($phrase), 1, 'áéíóúÁÉÍÓÚüÜñÑ');

        // ignore stop words
        $words = myTools::removeStopWordsFromArray($words);

        // stem words
        $stemmed_words = array();
        foreach ($words as $word)
        {
            // ignore 1 and 2 letter words
            if (strlen($word) <= 2)
            {
                continue;
            }

            $stemmed_words[] = PorterStemmer::stem($word, true);
        }

        return $stemmed_words;
    }

    public static function transformToHtml($string)
    {
        //$string = htmlentities($string, ENT_QUOTES, 'UTF-8');
        $string = myTools::removeHTML($string, '<p><em><b>,<strong><i><u><cite><br>,<br/><ul><ol><li><h3><h4><h5>');
        //require_once('/usr/share/php/symfony/helper/TextHelper.php');
        //require_once('/usr/share/php/symfony/helper/TagHelper.php');
        $html = myTools::simple_format_text($string);
        $html = preg_replace('/<p><([ul|li|h3|h4|h5]+)>/', '<$1>', $html);
        $html = preg_replace('/<\/([ul|li|h3|h4|h5]+)><\/p>/', '</$1>', $html);
        $html = preg_replace('/<([\/]*)h4>/', '<$1h3>', $html);
        $html = preg_replace('/<([\/]*)h5>/', '<$1h4>', $html);
        $html = preg_replace('/<br[ ]*[\/]*>[ ]*<\/ul>/', '</ul>', $html);
        $html = preg_replace('/<([\/]*)b>/', '<$1strong>', $html);
        $html = preg_replace('/<br[\s]*\/><ul>/', "</p>\n<ul>", $html);
        $html = preg_replace('/<\/ul>[\n]*<br[\s]*\/>/', "</ul>\n<p>", $html);
        $html = preg_replace('/<br[\s]*[\/]*>[\s]*<li>/', '<li>', $html);
        $html = preg_replace('/<br[\s]*[\/]*>[\s]*<\/li>/', '</li>', $html);
        $html = preg_replace('/<\/li><br[\s]*[\/]*>[\s]*/', '</li>', $html);
        $html = preg_replace('/<p><li>/', '<li>', $html);
        $html = preg_replace('/<\/li><\/p>/', '</li>', $html);
        $html = myTools::auto_link_text($html, 'all', array('rel' => "nofollow"));
        $html = ($html == '<p></p>') ? '' : $html;   
        return $html;
    } //END transformToHtml

    public static function removeHTML($html, $strip_tags = '<p><em><strong><b><i><u><cite><br>,<br/>')
    {
        // Web documents shouldn't contains \x00 symbol
        $html = str_replace("\x00", '', $html);
        // Remove white spaces inside tags
        $html = preg_replace('/\<\s*(\/{0,1})\s*([a-zA-Z]*)\s*\>/e', "'<\\1'.strtolower('\\2').'>'", $html);
        $search = array('@<script[^>]*?>.*?</script>@si',  // Strip out javascript
        '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
        '@<![\s\S]*?--[ \t\n\r]*>@',        // Strip multi-line comments including CDATA
        '@<p><ul>@si');
        $html = preg_replace($search, '', $html);
        $html = strip_tags($html, $strip_tags);
        // Replace self closed tags
        $html = preg_replace('/\<(br|hr)\>/', '<\\1/>', $html);

        $html = preg_replace('/<(.*?)>/ie', "'<'.myTools::removeEvilAttributes('\\1').'>'", $html);
        return $html;
    }

    public static function getStrippedTitle($title = '')
    {
        if (empty($title)) {
            return 'undefined';
        }
        $low=array("Ü" => "ü", "Á" => "á", "É" => "é", "Í" => "í", "Ó" => "ó", "Ú" => "ú", "Ñ" => "ñ");
        $result = trim(strtolower(strtr($title, $low)));

        // strip all non word chars
        $result = preg_replace('/[^a-záéíóúüñ0-9\W\-_,\.]/', '', $result);
        $result = str_replace(array('á','é','í','ó','ú','ñ'), array('a','e','i','o','u','ny'), $result);

        // strip all non word chars
        $result = preg_replace('/\W/', ' ', $result);

        // replace all white space sections
        $result = preg_replace('/\ /', '-', $result);

        // trim dashes
        $result = preg_replace('/\-+/', '-', $result);
        $result = preg_replace('/\-$/', '', $result);
        $result = preg_replace('/^\-/', '', $result);

        return $result;
    }

    public static function removeEvilAttributes($tagSource)
    {
        $stripAttrib = "' (style|class)=\"(.*?)\"'i";
        $tagSource = stripslashes($tagSource);
        $tagSource = preg_replace($stripAttrib, '', $tagSource);
        return $tagSource;
    }

    /* Copied from TextHelper.php */

    public static function simple_format_text($text, $options = array())
    {
        $css = (isset($options['class'])) ? ' class="'.$options['class'].'"' : '';

        $text = sfToolkit::pregtr($text, array("/(\r\n|\r)/"        => "\n",               // lets make them newlines crossplatform
        "/\n{3,}/"           => "\n\n",             // zap dupes
        "/\n\n/"             => "</p>\\0<p$css>",   // turn two newlines into paragraph
        "/([^\n])\n([^\n])/" => "\\1\n<br />\\2")); // turn single newline into <br/>

        return '<p'.$css.'>'.$text.'</p>'; // wrap the first and last line in paragraphs before we're done
    }

    /**
    * Turns all urls and email addresses into clickable links. The +link+ parameter can limit what should be linked.
    * Options are :all (default), :email_addresses, and :urls.
    * 
    * Example:
    *   auto_link("Go to http://www.symfony-project.com and say hello to fabien.potencier@example.com") =>
    *     Go to <a href="http://www.symfony-project.com">http://www.symfony-project.com</a> and
    *     say hello to <a href="mailto:fabien.potencier@example.com">fabien.potencier@example.com</a>
    */
    public static function auto_link_text($text, $link = 'all', $href_options = array())
    {
        if ($link == 'all')
        {
            return myTools::_auto_link_urls(myTools::_auto_link_email_addresses($text), $href_options);
        }
        else if ($link == 'email_addresses')
        {
            return myTools::_auto_link_email_addresses($text);
        }
        else if ($link == 'urls')
        {
            return myTools::_auto_link_urls($text, $href_options);
        }
    }


    /*
    * Turns all links into words, like "<a href="something">else</a>" to "else".
    */
    public static function strip_links_text($text)
    {
        return preg_replace('/<a.*>(.*)<\/a>/m', '\\1', $text);
    }

    /**
    * Turns all urls into clickable links.
    */
    private static function _auto_link_urls($text, $href_options = array())
    {
        define('SF_AUTO_LINK_RE', '/
        (                       # leading text
            <\w+.*?>|             #   leading HTML tag, or
            [^=!:\'"\/]|          #   leading punctuation, or
            ^                     #   beginning of line
            )
            (
                (?:http[s]?:\/\/)|    # protocol spec, or
                (?:www\.)             # www.*
                )
                (
                    ([\w]+:?[=?&\/.-]?)*  # url segment
                    \w+[\/]?              # url tail
                    (?:\#\w*)?            # trailing anchor
                    )
                    ([[:punct:]]|\s|<|$)    # trailing text
                    /x');

        $href_options = myTools::_tag_options($href_options);
        return preg_replace_callback(
            SF_AUTO_LINK_RE,
            create_function('$matches', '
            if (preg_match("/<a\s/i", $matches[1]))
            {
                return $matches[0];
            }
            else
            {
                return $matches[1].\'<a href="\'.($matches[2] == "www." ? "http://www." : $matches[2]).$matches[3].\'"'.$href_options.'>\'.$matches[2].$matches[3].\'</a>\'.$matches[5];
            }
            ')
            , $text);
    }

    /**
    * Turns all email addresses into clickable links.
    */
    private static function _auto_link_email_addresses($text)
    {
        return preg_replace('/([\w\.!#\$%\-+.]+@[A-Za-z0-9\-]+(\.[A-Za-z0-9\-]+)+)/', '<a href="mailto:\\1">\\1</a>', $text);
    }

    private static function _tag_options($options = array())
    {
        $options = myTools::_parse_attributes($options);

        $html = '';
        foreach ($options as $key => $value)
        {
            $html .= ' '.$key.'="'.myTools::escape_once($value).'"';
        }

        return $html;
    }

    private static function _parse_attributes($string)
    {  
        return is_array($string) ? $string : sfToolkit::stringToArray($string);
    }

    /**
    * Escapes an HTML string.
    * 
    * @param  string HTML string to escape
    * @return string escaped string
    */
    public static function escape_once($html)
    {
        return myTools::fix_double_escape(htmlspecialchars($html));
    }

    /**
    * Fixes double escaped strings.
    *
    * @param  string HTML string to fix
    * @return string escaped string
    */
    public static function fix_double_escape($escaped)
    {  
        return preg_replace('/&amp;([a-z]+|(#\d+));/i', '&$1;', $escaped);
    }

    public static function my_array_unique($array_1, $array_2 = null, $keep_key_assoc = false)
    {
        if ($array_2) {
            $array = array_merge($array_1, $array_2);
        }
        $duplicate_keys = array();
        $tmp = array();

        foreach ($array as $key=>$val)
        {
            // convert objects to arrays, in_array() does not support objects
            if (is_object($val))
                $val = (array)$val;

            if (!in_array($val, $tmp))
                $tmp[] = $val;
            else
                $duplicate_keys[] = $key;
        }

        foreach ($duplicate_keys as $key)
            unset($array[$key]);

        return $keep_key_assoc ? $array : array_values($array);
    }

    function count_array($strPattern, $arrInput){
        $arrReturn = preg_grep($strPattern, $arrInput);
        return (count($arrReturn));
    }

} //Tools
?>
