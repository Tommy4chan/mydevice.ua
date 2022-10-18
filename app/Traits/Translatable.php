<?php

namespace App\Traits;

use Illuminate\Support\Facades\App;

trait Translatable
{
    public function __($originFieldName){
        $locale = App::getLocale() ?? 'ua';
        if($locale === 'eng'){
            $fieldName = $originFieldName . '_eng';
        }
        else{
            return $this->$originFieldName;
        }

        if($locale === 'eng' && (is_null($this->$fieldName) || empty($this->$fieldName))){
            return $this->$originFieldName;
        }

        return $this->$fieldName;
    }
}