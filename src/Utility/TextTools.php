<?php
declare(strict_types=1);

namespace App\Utility;

class TextTools
{
    public static function arabicSlug(string $string): string
    {
        // 1. Normalisation des lettres (Optionnel selon vos besoins SEO)
        $normalize = [
            'أ' => 'ا', 'إ' => 'ا', 'آ' => 'ا',
            'ؤ' => 'و', 'ئ' => 'ي', 'ء' => '',
            'ة' => 'ه', 'ى' => 'ي',
        ];
        $string = strtr($string, $normalize);

        // 2. Remplacer la ponctuation arabe et latine par des espaces
        // On ajoute ici la virgule arabe (،) et les points (.)
        $string = preg_replace('/[،.,;:!?|()\[\]{}«»"\'\s]+/u', ' ', $string);

        // 3. Garder uniquement l'arabe, l'alphanumérique et les espaces
        $slug = preg_replace('/[^\p{Arabic}a-zA-Z0-9\s\-]+/u', '', $string);

        // 4. Transformer les espaces en tirets
        $slug = preg_replace('/\s+/', '-', trim($slug));

        // 5. Nettoyer les tirets doubles
        $slug = preg_replace('/-+/', '-', $slug);

        // 6. Lowercase et trim final
        return mb_strtolower(trim($slug, '-'), 'UTF-8');
    }
}
