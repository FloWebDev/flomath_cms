<?php

namespace Core;

class CaptchaService
{
    /**
     * Put center-rotated ttf-text into image
     * Same signature as imagettftext();
     *
     * @source https://www.php.net/manual/fr/function.imagettftext.php#48938
     */
    private static function imagettftextCr($img, $size, $angle, $x, $y, $color, $fontfile, $text)
    {
        // retrieve boundingbox
        $bbox = imagettfbbox($size, $angle, $fontfile, $text);
    
        // calculate deviation
    $dx = ($bbox[2] - $bbox[0]) / 2.0 - ($bbox[2] - $bbox[4]) / 2.0;         // deviation left-right
    $dy = ($bbox[3] - $bbox[1]) / 2.0 + ($bbox[7] - $bbox[1]) / 2.0;        // deviation top-bottom
    
    // new pivotpoint
        $px = $x - $dx;
        $py = $y - $dy;
    
        return imagettftext($img, $size, $angle, $px, $py, $color, $fontfile, $text);
    }

    /**
     * Génère un captcha sous forme de base64
     */
    public static function generateCaptcha()
    {
        $_SESSION['captcha'] = mt_rand(1000, 9999);
        $img                 = imagecreate(100, 30);
        $font                = 'assets/media/core/fonts/destroy.ttf';
    
        // RGB colors
        $bg        = imagecolorallocate($img, 0, 130, 160); // automatiquement la couleur de fond car 1ère couleur déclarée
        $textcolor = imagecolorallocate($img, 255, 255, 255);
    
        self::imagettftextCr($img, 10, 0, 50, 12, $textcolor, $font, $_SESSION['captcha']);
    
        imagepng($img);
        $output = ob_get_clean();
        imagedestroy($img);
        return base64_encode($output);
    }

    /**
     * Vérifie la validité du captcha fourni en paramètre
     */
    public static function check(int $captcha = null)
    {
        if (empty($captcha)) {
            return false;
        }

        if ($captcha === intval($_SESSION['captcha'])) {
            return true;
        }

        return false;
    }
}
