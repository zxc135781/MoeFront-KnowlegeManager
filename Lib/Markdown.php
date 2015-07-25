<?php
class Markdown
{ 
    /**
     * convert 
     * 
     * @param string $text 
     * @return string
     */
    public static function convert($text)
    {
        static $parser;

        if (empty($parser)) {
            $parser = new MarkdownExtraExtended();
        }

        return $parser->transform($text);
    }
}

