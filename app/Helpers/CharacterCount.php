<?php

namespace App\Helpers;

class CharacterCount
{
    public function isGsm7bit($text): bool
    {
        $gsm7bitChars = "\\@£\$¥èéùìòÇ\nØø\rÅåΔ_ΦΓΛΩΠΨΣΘΞÆæßÉ !\"#¤%&'()*+,-./0123456789:;<=>?¡ABCDEFGHIJKLMNOPQRSTUVWXYZÄÖÑÜ§¿abcdefghijklmnopqrstuvwxyzäöñüà^{}[~]|€";
        $textlen = mb_strlen($text);

        for ($i = 0; $i < $textlen; $i++) {
            $char = mb_substr($text, $i, 1);
            if (strpos($gsm7bitChars, $char) === false) {
                return false;
            }
        }

        return true;
    }

    public function getNumberOfSMSsegments($text, $MaxSegments = 6): int|false
    {
        $TotalSegment = 0;
        $textlen = mb_strlen($text);
        if ($textlen == 0) return false;

        // Line breaks count
        $lineBreaks = substr_count($text, "\n") + substr_count($text, "\r");
        $textlen += $lineBreaks;

        // 7-bit বা UCS-2 detect করা
        if ($this->isGsm7bit($text)) {
            $SingleMax = 160;
            $ConcatMax = 153;
        } else {
            $SingleMax = 70;
            $ConcatMax = 67;
        }

        if ($textlen <= $SingleMax) {
            $TotalSegment = 1;
        } else {
            $TotalSegment = ceil($textlen / $ConcatMax);
        }

        // MaxSegments limit check
        if ($TotalSegment > $MaxSegments) {
            return $MaxSegments;
        }

        return $TotalSegment;
    }
}
