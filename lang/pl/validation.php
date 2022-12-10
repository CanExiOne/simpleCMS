<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute musi zostać zaakceptowane.',
    'accepted_if' => ':attribute musi być zaakceptowane gdy :other jest :value.',
    'active_url' => ':attribute nie jest prawidłowym adresem URL.',
    'after' => ':attribute musi być datą po :date.',
    'after_or_equal' => ':attribute musi być datą taką samą lub po :date.',
    'before' => ':attribute musi być datą przed :date.',
    'before_or_equal' => ':attribute musi być datą taką lub przed :date.',
    'date' => ':attribute nie jest prawidłową datą.',
    'date_equals' => ':attribute musi być datą równą :date.',
    'date_format' => ':attribute musi być w formacie :format.',
    'alpha' => ':attribute musi składać się z samych liter.',
    'alpha_dash' => ':attribute musi składać się z samych liter, cyfr, myślników i podkreślników.',
    'alpha_num' => ':attribute musi składać się z samych liter i cyfr.',
    'array' => ':attribute musi być tablicą(array).',
    'between' => [
        'array' => ':attribute musi posiadać od :min do :max elementów.',
        'file' => ':attribute musi mieć rozmar między :min a :max kilobajtów.',
        'numeric' => ':attribute musi być liczbą między :min a :max.',
        'string' => ':attribute musi mieć od :min do :max znaków.',
    ],
    'boolean' => ':attribute pole musi być prawdą albo fałszem.',
    'confirmed' => ':attribute nie zostało potwierdzone.',
    'current_password' => 'Hasło jest nieprawidłowe.',
    'declined' => ':attribute musi zostać odrzucone.',
    'declined_if' => ':attribute musi zostać odrzucone gdy :other jest :value.',
    'different' => ':attribute i :other muszą być różne.',
    'digits' => ':attribute musi być cyframi :digits.',
    'digits_between' => ':attribute musi być między cyframi :min oraz :max.',
    'dimensions' => ':attribute posiada nieprawidłowe rozmiary.',
    'distinct' => ':attribute pole posiada zduplikowaną wartość.',
    'doesnt_end_with' => ':attribute nie może kończyć się w taki sposób: :values.',
    'doesnt_start_with' => ':attribute nie może zaczynać się od: :values.',
    'email' => ':attribute musi być prawidłowym adresem e-mail.',
    'ends_with' => ':attribute musi kończyć się w taki sposób: :values.',
    'enum' => 'Wybrane :attribute jest nieprawidłowe.',
    'exists' => 'Wybrane :attribute jest nieprawidłowe.',
    'file' => ':attribute musi być plikiem.',
    'filled' => ':attribute musi zostać wypłenione.',
    'gt' => [
        'array' => ':attribute musi mieć więcej elementów niż :value.',
        'file' => ':attribute musi być większy niż :value kilobajtów.',
        'numeric' => ':attribute musi być większe niż :value.',
        'string' => ':attribute musi posiadać więcej znaków niż :value.',
    ],
    'gte' => [
        'array' => ':attribute musi posiadać :value lub więcej elementów.',
        'file' => ':attribute musi być większe lub równe :value kilobajtów.',
        'numeric' => ':attribute musi być równe lub większe od :value.',
        'string' => ':attribute musi posiadać :value lub więcej znaków.',
    ],
    'lt' => [
        'array' => ':attribute musi posiadać mniej niż :value elementów.',
        'file' => ':attribute musi być mniejsze niż :value kilobajtów.',
        'numeric' => ':attribute musi być mniejsze niż :value.',
        'string' => ':attribute musi składać się z mniej niż :value znaków.',
    ],
    'lte' => [
        'array' => ':attribute nie może mieć więcej niż :value elementów.',
        'file' => ':attribute musi być mniejsze niż lub równe :value kilobajtów.',
        'numeric' => ':attribute musi być mniejsze lub równe :value.',
        'string' => ':attribute musi składać się z :value lub mniej znaków.',
    ],
    'image' => ':attribute musi być obrazem.',
    'in' => 'Wybrany element :attribute jest nieprawidłowy.',
    'in_array' => ':attribute pole nie istnieje w :other.',
    'integer' => ':attribute musi być liczbą całkowitą.',
    'ip' => ':attribute musi być poprawnym adresem IP.',
    'ipv4' => ':attribute musi być poprawnym adresem IPV4.',
    'ipv6' => ':attribute musi być poprawnym adresem IPV6.',
    'mac_address' => ':attribute musi być poprawnym adresem MAC.',
    'json' => ':attribute musi być poprawnym tekstem JSON.',
    'lowercase' => ':attribute musi składać się z samych małych znaków.',
    'max' => [
        'array' => ':attribute nie może mieć więcej niż :max elementów.',
        'file' => ':attribute nie może być większe niż :max kilobajtów.',
        'numeric' => ':attribute nie może być większe niż :max.',
        'string' => ':attribute nie może składać się z więcej niż :max znaków.',
    ],
    'max_digits' => ':attribute nie może więcej niż :max cyfr.',
    'mimes' => ':attribute musi być plikiem typu: :values.',
    'mimetypes' => ':attribute musi być plikiem typu: :values.',
    'min' => [
        'array' => ':attribute musi mieć conajmniej :min elementów.',
        'file' => ':attribute musi ważyć conajmniej :min kilobajtow.',
        'numeric' => ':attribute musi być równe conajmniej :min.',
        'string' => ':attribute musi posiadać minimum :min znaków.',
    ],
    'min_digits' => ':attribute musi posiadać conajmniej :min digits.',
    'multiple_of' => ':attribute musi być wielokrotnością :value.',
    'not_in' => 'Wybrane :attribute jest nieprawidłowe.',
    'not_regex' => ':attribute format jest nieprawidłowy.',
    'numeric' => ':attribute musi być numerem.',
    'password' => [
        'letters' => ':attribute musi posiadać conajmniej jedną literę.',
        'mixed' => ':attribute musi posiadać conajmniej jedną dużą i jedną małą literę.',
        'numbers' => ':attribute musi posiadać conajmniej jedną cyfrę.',
        'symbols' => ':attribute musi posiadać conajmniej jeden znak specjalny.',
        'uncompromised' => 'Podane :attribute znalazło się w wycieku danych. Wybierz inne :attribute.',
    ],
    'present' => 'Pole :attribute musi istnieć.',
    'prohibited' => 'Pole :attribute jest zabronione.',
    'prohibited_if' => 'Pole :attribute jest zabronione gdy :other jest równe :value.',
    'prohibited_unless' => 'Pole :attribute jest zabronione, chyba że :other jest w :values.',
    'prohibits' => 'Pole :attribute zabrania, aby istniało :other.',
    'regex' => 'Format :attribute jest nieprawidłowy.',
    'required' => ':attribute jest wymagane.',
    'required_array_keys' => 'Pole :attribute musi zawierać elementy dla: :values.',
    'required_if' => 'Pole :attribute jest wymaganefield is required when :other is :value.',
    'required_if_accepted' => 'Pole :attribute jest wymagane, gdy :other jest zaakceptowane.',
    'required_unless' => 'Pole :attribute jest wymagane, chyba że :other jest w :values.',
    'required_with' => 'Pole :attribute jest wymagane, gdy istnieje :values.',
    'required_with_all' => 'Pole :attribute jest wymagane, gdy istnieją :values.',
    'required_without' => 'Pole :attribute jest wymagane, gdy :values nie istnieje.',
    'required_without_all' => 'Pole :attribute jest wymagane, kiedy :values nie istnieją.',
    'same' => ':attribute i :other muszą być takie same.',
    'size' => [
        'array' => ':attribute musi posiadać :size elementów.',
        'file' => ':attribute musi ważyć :size kilobajtów.',
        'numeric' => ':attribute musi być równe :size.',
        'string' => ':attribute musi mieć :size znaków.',
    ],
    'starts_with' => ':attribute musi zaczynać się od: :values.',
    'string' => ':attribute musi być wierszem.',
    'timezone' => ':attribute musi być prawidłową strefą czasową.',
    'unique' => ':attribute jest już zajęty/e.',
    'uploaded' => 'Nie udało się wysłać :attribute.',
    'uppercase' => ':attribute musi składać się z dużych liter.',
    'url' => ':attribute musi być poprawnym adresem URL.',
    'uuid' => ':attribute musi być poprawnym UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
