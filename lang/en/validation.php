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
    'User register successfully.' => 'User register successfully.',
    'accepted' => 'The :attribute must be accepted.',
    'active_url' => 'The :attribute is not a valid URL.',
    'after' => 'The :attribute must be a date after :date.',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    'alpha' => 'The :attribute may only contain letters.',
    'alpha_dash' => 'The :attribute may only contain letters, numbers, dashes and underscores.',
    'alpha_num' => 'The :attribute may only contain letters and numbers.',
    'array' => 'The :attribute must be an array.',
    'before' => 'The :attribute must be a date before :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between' => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file' => 'The :attribute must be between :min and :max kilobytes.',
        'string' => 'The :attribute must be between :min and :max characters.',
        'array' => 'The :attribute must have between :min and :max items.',
    ],
    'boolean' => 'The :attribute field must be true or false.',
    'confirmed' => 'The :attribute confirmation does not match.',
    'date' => 'The :attribute is not a valid date.',
    'date_equals' => 'The :attribute must be a date equal to :date.',
    'date_format' => 'The :attribute does not match the format :format.',
    'different' => 'The :attribute and :other must be different.',
    'digits' => 'The :attribute must be :digits digits.',
    'digits_between' => 'The :attribute must be between :min and :max digits.',
    'dimensions' => 'The :attribute has invalid image dimensions.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'email' => 'The :attribute must be a valid email address.',
    'exists' => 'The selected :attribute is invalid.',
    'file' => 'The :attribute must be a file.',
    'filled' => 'The :attribute field must have a value.',
    'gt' => [
        'numeric' => 'The :attribute must be greater than :value.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'string' => 'The :attribute must be greater than :value characters.',
        'array' => 'The :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'The :attribute must be greater than or equal :value.',
        'file' => 'The :attribute must be greater than or equal :value kilobytes.',
        'string' => 'The :attribute must be greater than or equal :value characters.',
        'array' => 'The :attribute must have :value items or more.',
    ],
    'image' => 'The :attribute must be an image.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => 'The :attribute must be an integer.',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'The :attribute must be less than :value.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'string' => 'The :attribute must be less than :value characters.',
        'array' => 'The :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'The :attribute must be less than or equal :value.',
        'file' => 'The :attribute must be less than or equal :value kilobytes.',
        'string' => 'The :attribute must be less than or equal :value characters.',
        'array' => 'The :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file' => 'The :attribute may not be greater than :max kilobytes.',
        'string' => 'The :attribute may not be greater than :max characters.',
        'array' => 'The :attribute may not have more than :max items.',
    ],
    'mimes' => 'The :attribute must be a file of type: :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => 'The :attribute must be at least :min.',
        'file' => 'The :attribute must be at least :min kilobytes.',
        'string' => 'The :attribute must be at least :min characters.',
        'array' => 'The :attribute must have at least :min items.',
    ],
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => 'The :attribute must be a number.',
    'present' => 'The :attribute field must be present.',
    'regex' => 'The :attribute format is invalid.',
    'required' => 'The :attribute field is required.',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'numeric' => 'The :attribute must be :size.',
        'file' => 'The :attribute must be :size kilobytes.',
        'string' => 'The :attribute must be :size characters.',
        'array' => 'The :attribute must contain :size items.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values',
    'string' => 'The :attribute must be a string.',
    'timezone' => 'The :attribute must be a valid zone.',
    'unique' => 'The :attribute has already been taken.',
    'uploaded' => 'The :attribute failed to upload.',
    'url' => 'The :attribute format is invalid.',
    'uuid' => 'The :attribute must be a valid UUID.',

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

    'attributes' => [
        'rate' => 'Rate',
        'comment' => 'Comment',
        'cart_id' => 'cart_id',
        'quantity' => 'quantity',
        'products' => 'products',
        'address_id' => 'address_id',
        'payment_type' => 'payment_type',
        'total' => 'total',
        'capon_id' => 'capon_id',
        'order_id' => 'order_id',
        'id' => 'id',
        'product_id' => 'product_id',
        'c_password' => 'confirm password',
        'contact_type' => 'contact message type',
        'city_id' => 'city_id',
        'field' => 'Field',
        'required' => 'Required',
        'unique' => 'Unique',
        'receiver_id' => 'Receiver ID',
        'data' => 'Data',
        'image' => 'Image',
        'message' => 'Message',
        'type' => 'Type',
        'store_id' => 'Store',
        'mony_stock_id' => 'Mony Stock',
        'price' => 'Price',
        'period' => 'Period',
        'category_id' => 'Category',
        'job' => 'job',
        'description' => 'description',
        'file' => 'file',

        'address' => 'Address',
        'ar.name' => 'ِِArabic Name',
        'en.name' => 'English Name',

        'ar.description' => 'ِِArabic Description',
        'en.description' => 'English Description',

        'ar.address' => 'ِِArabic Address',
        'en.address' => 'English Address',

        'ar.content' => 'ِِArabic Content',
        'en.content' => 'English Content',
        'ar.title' => 'ِِArabic Title',
        'en.title' => 'English Title',
        'ar.description' => 'ِِArabic Description',
        'en.description' => 'English Description',

        'category_id' => 'Category',

        'first_mony' => 'First Stock',
        'fin_mony' => 'Fin Mony',

        'order_date' => 'Order Date',
        'disc1' => 'Discount',
        'disc2' => 'Discount',
        'disc3' => 'Discount',
        'adds1' => 'Adds',
        'adds2' => 'Adds',

        'from_store_id' => 'From Store',
        'to_store_id' => 'To Store',

        'paid' => 'Paid',
        'supplier_id' => 'Supplier',
        'client_id' => 'Client',
        'title' => 'Title',
        'content' => 'Content',

        'sale_price' => 'Sale Price',
        'sale_goml' => 'Sell Goml',
        'purchase_price' => 'Purchase Price',
        'sale_havegoml' => 'Have Gomle Price',
        'first_stock' => 'First Stock',
        'fin_stock' => 'Final Stock',
        'req_stock' => 'Required Stock',
        'store_place' => 'Store Place',
        'stock' => 'Stock',
        'description' => 'Description',
        'mony_item_group_id' => 'Mony Account Group',
        'mony_item_kind__id' => 'Mony Account Kind',

        'name' => 'Name',
        'username' => 'Last Name',
        'firstname'=>'First Name',
        'user_id' => 'User ID',
        'email' => 'Email',
        'first_name' => 'First Name',
        'last_name' => 'Last Name',
        'fname' => 'Frist Name',
        'lname' => 'Last Name',
        'password' => 'Password',
        'password_confirmation' => 'Password Confirmation',
        'password_regex' => 'Password at least 8 characters including a lower-case letter, an upper–case letter, a number and one special character (!@$%^&*)',
        'city' => 'city',
        'country' => 'country',
        'address' => 'Adddress',
        'phone' => 'phone',
        'phone_code' => 'Phone Code',
        'mobile' => 'mobile',
        'age' => 'age',
        'sex' => 'sex',
        'gender' => 'gender',
        'day' => 'day',
        'month' => 'month',
        'year' => 'year',
        'hour' => 'hour',
        'minute' => 'minute',
        'second' => 'second',
        'title' => 'title',
        'content' => 'content',
        'description' => 'description',
        'excerpt' => 'excerpt',
        'date' => 'date',
        'time' => 'time',
        'available' => 'available',
        'size' => 'size',
        'code' => 'Verification Code',
        'v_code' => 'Verification Code',
        'user_type' => 'User Type',
        'birthdate' => 'Birth Date',

    ],

];
