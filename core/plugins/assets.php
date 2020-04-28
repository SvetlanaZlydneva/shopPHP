<?php

namespace core\plugins;

class Assets
{
    public static function assetsGenerate()
    {
        global $assets;
        $links = '';
        foreach ($assets as $asset) {
            if (array_key_exists('css', $asset)) {
                $links .= "<link rel=\"stylesheet\" href='$asset[css]'>";
            } else {
                if (array_key_exists('js', $asset)) {
                    $links .= "<script src='$asset[js]'></script>";
                }
            }
        }
        return $links;
    }
}