<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ThumbnailController extends Controller
{
    public function movingFromTo(Request $request)
    {
        // Make it compatible with the movebuddha-style query params
        // $from = $request->query('text', 'Alabama');           // primary text
        // $to   = $request->query('secondary-text', 'Florida'); // secondary text

        // return response()
        //     ->view('frontend.company_auth.route_pages.thumbnails.moving-from-to', compact('from', 'to'))
        //     ->header('Content-Type', 'image/svg+xml'); // return as image





        $from = $request->query('text', 'Alabama');
        $to   = $request->query('secondary-text', 'California');

        // Trim long names a bit
        $from = strlen($from) > 18 ? substr($from, 0, 18) . '…' : $from;
        $to   = strlen($to)   > 18 ? substr($to, 0, 18) . '…'   : $to;

        $width  = 1200;
        $height = 630;

        // Create image
        $im = imagecreatetruecolor($width, $height);
        imagealphablending($im, true);
        imagesavealpha($im, true);

        $transparent = imagecolorallocatealpha($im, 0, 0, 0, 127);
        imagefilledrectangle($im, 0, 0, $width, $height, $transparent);

        // Colors (same as SVG)
        $bg          = $this->rgb($im, 0xf4, 0xfa, 0xfb); // #f4fafb
        $headerColor = $this->rgb($im, 0x03, 0x36, 0x40); // #033640
        $accent      = $this->rgb($im, 0x0f, 0x7b, 0x86); // #0f7b86
        $accentLight = $this->rgb($im, 0xd7, 0xf0, 0xf3); // #d7f0f3
        $textColor   = $this->rgb($im, 0x03, 0x36, 0x40); // #033640
        $white       = $this->rgb($im, 255, 255, 255);
        $bottomText  = $this->rgb($im, 0xc7, 0xe6, 0xe9); // #c7e6e9

        // Background
        imagefilledrectangle($im, 0, 0, $width, $height, $bg);

        // Top header bar
        imagefilledrectangle($im, 0, 0, $width, 120, $headerColor);

        // Logo pill
        // $pillX1 = 40;
        // $pillY1 = 25;
        // $pillX2 = 300;
        // $pillY2 = 85;
        // // slightly more transparent so it doesn't look so heavy
        // $pillBg = imagecolorallocatealpha($im, 255, 255, 255, 110);
        // $this->filledRoundedRect($im, $pillX1, $pillY1, $pillX2, $pillY2, 30, $pillBg);

        // Logo image (optional)
        $logoPath = public_path('assets/img/logo.png');
        if (file_exists($logoPath)) {
            $logo = imagecreatefrompng($logoPath);
            $logoW = imagesx($logo);
            $logoH = imagesy($logo);
            $targetH = 50;
            $scale   = $targetH / $logoH;
            $targetW = (int)($logoW * $scale);

            imagecopyresampled($im, $logo, 60, 30, 0, 0, $targetW, $targetH, $logoW, $logoH);
            imagedestroy($logo);
        }

        // ====== TEXT USING BUILT-IN GD FONTS ======
        // Font sizes: 1..5 (5 = biggest)
        $fontBig    = 5;
        $fontMedium = 4;
        $fontSmall  = 3;

        // "Moving From" heading (centered and a bit lower)
        $this->centerString($im, 'Moving From', $fontBig, 600, 150, $textColor);

        // Cards
        // Left card
        $leftX1 = 100;
        $leftY1 = 230;
        $leftX2 = $leftX1 + 460;
        $leftY2 = $leftY1 + 220;
        $this->filledRoundedRect($im, $leftX1, $leftY1, $leftX2, $leftY2, 24, $accentLight);

        // Right card
        $rightX1 = 640;
        $rightY1 = 230;
        $rightX2 = $rightX1 + 500;
        $rightY2 = $rightY1 + 220;
        $this->filledRoundedRect($im, $rightX1, $rightY1, $rightX2, $rightY2, 24, $accentLight);

        // Labels and state names: move them down a bit and use biggest font
        imagestring($im, $fontSmall, $leftX1 + 35, $leftY1 + 25, 'FROM', $textColor);
        imagestring($im, $fontBig,   $leftX1 + 35, $leftY1 + 90, $from,  $textColor);

        imagestring($im, $fontSmall, $rightX1 + 35, $rightY1 + 25, 'TO', $textColor);
        imagestring($im, $fontBig,   $rightX1 + 35, $rightY1 + 90, $to,  $textColor);

        // Circle "to" badge – centered between cards
        $centerX = 600;
        $centerY = 345;
        $outerR  = 70;  // slightly bigger ring
        $innerR  = 56;

        imagefilledellipse($im, $centerX, $centerY, $outerR * 2, $outerR * 2, $accent);
        imagefilledellipse($im, $centerX, $centerY, $innerR * 2, $innerR * 2, $white);

        // "to" text centered inside badge
        $this->centerString($im, 'to', $fontMedium, $centerX, $centerY - (imagefontheight($fontMedium) / 2), $textColor);

        // Bottom dark bar for contrast
        imagefilledrectangle($im, 0, 540, $width, 630, $headerColor);

        // Bottom texts: better visible now
        $bottomYMain = 570;
        $bottomYSub  = 570;

        imagestring($im, $fontMedium, 60, $bottomYMain - imagefontheight($fontMedium) / 2, 'mymovingjourney.com', $white);

        $this->rightAlignString(
            $im,
            'Trusted movers. Real reviews. Smarter moves.',
            $fontSmall,
            1140,
            $bottomYSub - imagefontheight($fontSmall) / 2,
            $bottomText
        );

        // Output PNG
        ob_start();
        imagepng($im);
        $pngData = ob_get_clean();
        imagedestroy($im);

        return response($pngData, 200)
            ->header('Content-Type', 'image/png')
            ->header('Cache-Control', 'public, max-age=604800');
    }

    /* helpers stay the same */

    private function rgb($im, int $r, int $g, int $b)
    {
        return imagecolorallocate($im, $r, $g, $b);
    }

    private function filledRoundedRect($im, $x1, $y1, $x2, $y2, $radius, $color)
    {
        imagefilledrectangle($im, $x1 + $radius, $y1, $x2 - $radius, $y2, $color);
        imagefilledrectangle($im, $x1, $y1 + $radius, $x2, $y2 - $radius, $color);

        imagefilledellipse($im, $x1 + $radius, $y1 + $radius, $radius * 2, $radius * 2, $color);
        imagefilledellipse($im, $x2 - $radius, $y1 + $radius, $radius * 2, $radius * 2, $color);
        imagefilledellipse($im, $x1 + $radius, $y2 - $radius, $radius * 2, $radius * 2, $color);
        imagefilledellipse($im, $x2 - $radius, $y2 - $radius, $radius * 2, $radius * 2, $color);
    }

    private function centerString($im, string $text, int $font, int $centerX, int $topY, $color)
    {
        $w = imagefontwidth($font) * strlen($text);
        $x = (int)($centerX - $w / 2);
        imagestring($im, $font, $x, (int)$topY, $text, $color);
    }

    private function rightAlignString($im, string $text, int $font, int $rightX, int $topY, $color)
    {
        $w = imagefontwidth($font) * strlen($text);
        $x = (int)($rightX - $w);
        imagestring($im, $font, $x, (int)$topY, $text, $color);
    }
}
