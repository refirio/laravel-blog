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

    'accepted'             => ':attributeを承認してください。',
    'active_url'           => ':attributeは有効なURLではありません。',
    'after'                => ':attributeには、:dateより後の日付を指定してください。',
    'after_or_equal'       => ':attributeには、:date以降の日付を指定してください。',
    'alpha'                => ':attributeはアルファベットのみで入力してください。',
    'alpha_dash'           => ':attributeはアルファベットと数字とダッシュ(-)及び下線(_)で入力してください。',
    'alpha_num'            => ':attributeはアルファベットと数字で入力してください。',
    'array'                => ':attributeは配列を指定してください。',
    'before'               => ':attributeには、:dateより前の日付を指定してください。',
    'before_or_equal'      => ':attributeには、:date以前の日付を指定してください。',
    'between'              => [
        'numeric' => ':attributeは:minから:maxの間を指定してください。',
        'file'    => ':attributeは:min KBから:max KBの間を指定してください。',
        'string'  => ':attributeは:min文字から:max文字の間を指定してください。',
        'array'   => ':attributeは:min個から:max個の間を指定してください。',
    ],
    'boolean'              => ':attributeには、trueかfalseを指定してください。',
    'confirmed'            => ':attributeと、確認フィールドが一致していません。',
    'date'                 => ':attributeには、有効な日付を指定してください。',
    'date_format'          => ':attributeは:format形式で指定してください。',
    'different'            => ':attributeと:otherには異なった内容を指定してください。',
    'digits'               => ':attributeは:digits桁で指定してください。',
    'digits_between'       => ':attributeは:min桁から:max桁の間で指定してください。',
    'dimensions'           => 'The :attribute has invalid image dimensions.',
    'distinct'             => 'The :attribute field has a duplicate value.',
    'email'                => ':attributeには、有効なメールアドレスを指定してください。',
    'exists'               => '選択された:attributeは正しくありません。',
    'file'                 => ':attributeには、ファイルを指定してください。',
    'filled'               => ':attributeは必ず指定してください。',
    'image'                => ':attributeには、画像ファイルを指定してください。',
    'in'                   => '選択された:attributeは正しくありません。',
    'in_array'             => 'The :attribute field does not exist in :other.',
    'integer'              => ':attributeは整数で指定してください。',
    'ip'                   => ':attributeには、有効なIPアドレスを指定してください。',
    'ipv4'                 => ':attributeには、有効なIP4アドレスを指定してください。',
    'ipv6'                 => ':attributeには、有効なIP6アドレスを指定してください。',
    'json'                 => ':attributeには、有効なJSON文字列を指定してください。',
    'max'                  => [
        'numeric' => ':attributeは:max以下の数字を指定してください。',
        'file'    => ':attributeは:max KB以下のファイルを指定してください。',
        'string'  => ':attributeは:max文字以下で指定してください。',
        'array'   => ':attributeは:max個以下指定してください。',
    ],
    'mimes'                => ':attributeには、:valuesタイプのファイルを指定してください。',
    'mimetypes'            => ':attributeには、:valuesタイプのファイルを指定してください。',
    'min'                  => [
        'numeric' => ':attributeは:min以上の数字を指定してください。',
        'file'    => ':attributeは:min KB以上のファイルを指定してください。',
        'string'  => ':attributeは:min文字以上で指定してください。',
        'array'   => ':attributeは:min個以上指定してください。',
    ],
    'not_in'               => '選択された:attributeは正しくありません。',
    'numeric'              => ':attributeには、数字を指定してください。',
    'present'              => 'The :attribute field must be present.',
    'regex'                => ':attributeに正しい形式を指定してください。',
    'required'             => ':attributeを入力してください。',
    'required_if'          => ':otherが:valueの場合、:attributeも指定してください。',
    'required_unless'      => 'The :attribute field is required unless :other is in :values.',
    'required_with'        => ':valuesを指定する場合は、:attributeも指定してください。',
    'required_with_all'    => ':valuesを指定する場合は、:attributeも指定してください。',
    'required_without'     => ':valuesを指定しない場合は、:attributeを指定してください。',
    'required_without_all' => ':valuesのどれも指定しない場合は、:attributeを指定してください。',
    'same'                 => ':attributeと:otherには同じ値を指定してください。',
    'size'                 => [
        'numeric' => ':attributeは:sizeを指定してください。',
        'file'    => ':attributeは:size KBのファイルでなければなりません。',
        'string'  => ':attributeは:size文字で指定してください。',
        'array'   => ':attributeは:size個指定してください。',
    ],
    'string'               => ':attributeは文字列を指定してください。',
    'timezone'             => ':attributeには、有効なゾーンを指定してください。',
    'unique'               => ':attributeの値は既に存在しています。',
    'uploaded'             => 'The :attribute failed to upload.',
    'url'                  => ':attributeに正しい形式を指定してください。',

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
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'comment'  => 'コメント',
        'email'    => 'メールアドレス',
        'name'     => '名前',
        'password' => 'パスワード',
        'title'    => 'タイトル',
    ],

];
