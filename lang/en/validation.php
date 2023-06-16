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

    'accepted' => 'Anda harus menerima :attribute.',
'accepted_if' => 'Anda harus menerima :attribute ketika :other adalah :value.',
'active_url' => ':attribute bukan URL yang valid.',
'after' => ':attribute harus berupa tanggal setelah :date.',
'after_or_equal' => ':attribute harus berupa tanggal setelah atau sama dengan :date.',
'alpha' => ':attribute hanya boleh berisi huruf.',
'alpha_dash' => ':attribute hanya boleh berisi huruf, angka, tanda hubung, dan garis bawah.',
'alpha_num' => ':attribute hanya boleh berisi huruf dan angka.',
'array' => ':attribute harus berupa array.',
'ascii' => ':attribute hanya boleh berisi karakter alfanumerik dan simbol satu byte.',
'before' => ':attribute harus berupa tanggal sebelum :date.',
'before_or_equal' => ':attribute harus berupa tanggal sebelum atau sama dengan :date.',
'between' => [
    'array' => ':attribute harus memiliki antara :min dan :max item.',
    'file' => ':attribute harus memiliki ukuran antara :min dan :max kilobyte.',
    'numeric' => ':attribute harus memiliki nilai antara :min dan :max.',
    'string' => ':attribute harus memiliki panjang antara :min dan :max karakter.',
],
'boolean' => 'Bidang :attribute harus bernilai true atau false.',
'confirmed' => 'Konfirmasi :attribute tidak cocok.',
'current_password' => 'Kata sandi salah.',
'date' => ':attribute bukan tanggal yang valid.',
'date_equals' => ':attribute harus berupa tanggal yang sama dengan :date.',
'date_format' => ':attribute tidak cocok dengan format :format.',
'decimal' => ':attribute harus memiliki :decimal desimal.',
'declined' => ':attribute harus ditolak.',
'declined_if' => ':attribute harus ditolak ketika :other adalah :value.',
'different' => ':attribute dan :other harus berbeda.',
'digits' => ':attribute harus berisi :digits digit.',
'digits_between' => ':attribute harus memiliki panjang antara :min dan :max digit.',
'dimensions' => ':attribute memiliki dimensi gambar yang tidak valid.',
'distinct' => 'Bidang :attribute memiliki nilai yang duplikat.',
'doesnt_end_with' => ':attribute tidak boleh diakhiri dengan salah satu dari berikut: :values.',
'doesnt_start_with' => ':attribute tidak boleh diawali dengan salah satu dari berikut: :values.',
'email' => ':attribute harus berupa alamat email yang valid.',
'ends_with' => ':attribute harus diakhiri dengan salah satu dari berikut: :values.',
'enum' => ':attribute yang dipilih tidak valid.',
'exists' => ':attribute yang dipilih tidak valid.',
'file' => ':attribute harus berupa file.',
'filled' => 'Bidang :attribute harus memiliki nilai.',
'gt' => [
    'array' => ':attribute harus memiliki lebih dari :value item.',
    'file' => ':attribute harus lebih besar dari :value kilobyte.',
    'numeric' => ':attribute harus lebih besar dari :value.',
    'string' => ':attribute harus lebih besar dari :value karakter.',
],
'gte' => [
    'array' => ':attribute harus memiliki :value item atau lebih.',
    'file' => ':attribute harus lebih besar dari atau sama dengan :value kilobyte.',
    'numeric' => ':attribute harus lebih besar dari atau sama dengan :value.',
    'string' => ':attribute harus lebih besar dari atau sama dengan :value karakter.',
],
'image' => ':attribute harus berupa gambar.',
'in' => ':attribute yang dipilih tidak valid.',
'in_array' => 'Bidang :attribute tidak ada dalam :other.',
'integer' => ':attribute harus berupa bilangan bulat.',
'ip' => ':attribute harus berupa alamat IP yang valid.',
'ipv4' => ':attribute harus berupa alamat IPv4 yang valid.',
'ipv6' => ':attribute harus berupa alamat IPv6 yang valid.',
'json' => ':attribute harus berupa string JSON yang valid.',
'lowercase' => ':attribute harus berupa huruf kecil.',
'lt' => [
    'array' => ':attribute harus memiliki kurang dari :value item.',
    'file' => ':attribute harus kurang dari :value kilobyte.',
    'numeric' => ':attribute harus kurang dari :value.',
    'string' => ':attribute harus kurang dari :value karakter.',
],
'lte' => [
    'array' => ':attribute tidak boleh memiliki lebih dari :value item.',
    'file' => ':attribute harus kurang dari atau sama dengan :value kilobyte.',
    'numeric' => ':attribute harus kurang dari atau sama dengan :value.',
    'string' => ':attribute harus kurang dari atau sama dengan :value karakter.',
],
'mac_address' => ':attribute harus berupa alamat MAC yang valid.',
'max' => [
    'array' => ':attribute tidak boleh memiliki lebih dari :max item.',
    'file' => ':attribute tidak boleh lebih besar dari :max kilobyte.',
    'numeric' => ':attribute tidak boleh lebih besar dari :max.',
    'string' => ':attribute tidak boleh lebih besar dari :max karakter.',
],
'max_digits' => ':attribute tidak boleh memiliki lebih dari :max digit.',
'mimes' => ':attribute harus berupa file dengan tipe: :values.',
'mimetypes' => ':attribute harus berupa file dengan tipe: :values.',
'min' => [
    'array' => ':attribute harus memiliki setidaknya :min item.',
    'file' => ':attribute harus memiliki setidaknya :min kilobyte.',
    'numeric' => ':attribute harus memiliki setidaknya :min.',
    'string' => ':attribute harus memiliki setidaknya :min karakter.',
],
'min_digits' => ':attribute harus memiliki setidaknya :min digit.',
'missing' => 'Bidang :attribute harus hilang.',
'missing_if' => 'Bidang :attribute harus hilang ketika :other adalah :value.',
'missing_unless' => 'Bidang :attribute harus hilang kecuali :other adalah :value.',
'missing_with' => 'Bidang :attribute harus hilang ketika :values hadir.',
'missing_with_all' => 'Bidang :attribute harus hilang ketika :values hadir.',
'multiple_of' => ':attribute harus merupakan kelipatan dari :value.',
'not_in' => ':attribute yang dipilih tidak valid.',
'not_regex' => 'Format :attribute tidak valid.',
'numeric' => ':attribute harus berupa angka.',
'password' => [
    'letters' => ':attribute harus mengandung setidaknya satu huruf.',
    'mixed' => ':attribute harus mengandung setidaknya satu huruf besar dan satu huruf kecil.',
    'numbers' => ':attribute harus mengandung setidaknya satu angka.',
    'symbols' => ':attribute harus mengandung setidaknya satu simbol.',
    'uncompromised' => ':attribute yang diberikan telah muncul dalam kebocoran data. Harap pilih :attribute yang berbeda.',
],
'present' => 'Bidang :attribute harus ada.',
'prohibited' => 'Bidang :attribute dilarang.',
'prohibited_if' => 'Bidang :attribute dilarang jika :other adalah :value.',
'prohibited_unless' => 'Bidang :attribute dilarang kecuali :other ada dalam :values.',
'prohibits' => 'Bidang :attribute melarang :other hadir.',
'regex' => 'Format :attribute tidak valid.',
'required' => 'Bidang :attribute diperlukan.',
'required_array_keys' => 'Bidang :attribute harus berisi entri untuk: :values.',
'required_if' => 'Bidang :attribute diperlukan ketika :other adalah :value.',
'required_if_accepted' => 'Bidang :attribute diperlukan ketika :other diterima.',
'required_unless' => 'Bidang :attribute diperlukan kecuali :other ada dalam :values.',
'required_with' => 'Bidang :attribute diperlukan ketika :values hadir.',
'required_with_all' => 'Bidang :attribute diperlukan ketika :values hadir.',
'required_without' => 'Bidang :attribute diperlukan ketika :values tidak hadir.',
'required_without_all' => 'Bidang :attribute diperlukan ketika tidak ada dari :values hadir.',
'same' => ':attribute dan :other harus cocok.',
'size' => [
    'array' => ':attribute harus mengandung :size item.',
    'file' => ':attribute harus berukuran :size kilobyte.',
    'numeric' => ':attribute harus berukuran :size.',
    'string' => ':attribute harus berukuran :size karakter.',
],
'starts_with' => ':attribute harus diawali dengan salah satu dari berikut: :values.',
'string' => ':attribute harus berupa string.',
'timezone' => ':attribute harus berupa zona waktu yang valid.',
'unique' => ':attribute sudah ada.',
'uploaded' => ':attribute gagal diunggah.',
'uppercase' => ':attribute harus berupa huruf kapital.',
'url' => ':attribute harus berupa URL yang valid.',
'ulid' => ':attribute harus berupa ULID yang valid.',
'uuid' => ':attribute harus berupa UUID yang valid.',


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
