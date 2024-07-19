<?php
    namespace App\Helpers {

        use App\Models\Contact;

        class Contactor
        {
            private static array $contacts = [];

            public static function get ( $key, $default = NULL )
            {
                if ( empty( self::$contacts ) )
                {
                    $options = Contact::all();

                    foreach ( $options as $option )
                    {
                        self::$contacts[ $option->key ] = $option->value;
                    }
                }

                return array_key_exists( $key, self::$contacts ) ? self::$contacts[ $key ] : $default;
            }
        }
    }
