<?php

namespace App\Traits;

trait Translate
{
    protected function translate($values)
    {
        foreach ($values as $value) {
            $translate[] = [
                $value->lang_code => [
                    'title'       => $value->title,
                    'description' => $value->description
                ]
            ];
        }

        return $translate;
    }
}