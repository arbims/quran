<?php
declare(strict_types=1);

namespace App\Utility;

class TextTools
{
    public static function arabicSlug(string $string): string
    {
        // 1. Normalisation des lettres arabes
        $normalize = [
            'أ' => 'ا', 'إ' => 'ا', 'آ' => 'ا',
            'ؤ' => 'و',
            'ئ' => 'ي',
            'ء' => '',
            'ة' => 'ه',
            'ى' => 'ي',
        ];

        $string = strtr($string, $normalize);

        // 2. Remplacer espaces & ponctuation par tirets
        $slug = preg_replace('/\s+/', '-', trim($string));

        // 3. Garder uniquement lettres arabes normalisées + latines + chiffres + tirets
        $slug = preg_replace('/[^\p{Arabic}a-zA-Z0-9\-]+/u', '', $slug);

        // 4. Nettoyer tirets multiples
        $slug = preg_replace('/-+/', '-', $slug);

        // 5. Trim des tirets en début/fin
        $slug = trim($slug, '-');

        // 6. Lowercase UTF-8
        return mb_strtolower($slug, 'UTF-8');
    }
}
