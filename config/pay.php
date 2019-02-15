<?php
return [
    'alipay' => [
        'app_id' => '2016080300153264',
        'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAuc1PzJ2xToHgmTy1XRDzaitcWeq7903xs4K31RopfFpTN2j2qwzH8D7eS/O+rccyZslYfOyD+w4TpxpXtNaM87/Zcrk9iN0nGa1N2+NKkeyOHaDa2t5GnYSQIssKauQ+IpXYSyBMOGglZcAUp/L9TanAZYmFpNX/7w4VG7CnbYKPYM636msq+2s17Yc35dO7PgV34C1UGYPg9XCldw1Q0DO9LOYVWz8Z5JZeNaKbYrXx8qKe/Vnh/U8Z2QZ3vtBPwQoftwt6T5RhBK68xk3tmoVzOWLU7Hn+y+AA2jV/iYHWk0xe5fsVI6KpW1QiE5rVZ0C0O0wsnpujRCjPmWFHSQIDAQAB',
        'private_key' => 'MIIEpAIBAAKCAQEAshXGDd9t8+IJcNZ9TB933iSLxSLPBHH/G1ZxBQfjt4Tum3GtgAEcR6Jl4WuZHGpmmr1tyuMXE+1HRkqZjDU+Bqj+kwqGN0QsUNHIdxKKgEkWJLpNbsLwMzQNP2TwpmgOdk7w9ODiKd98kB3nuCrOsuMij8EbTB/Qs8bX2ilXmVMfiQ4YHlxv/Wi0VLwkcgRLTxiAjyYnhQDeqUnOhNHbr1MuNonyrS0YCSpahjp0GP5Bocdvg6sSMUjyDBkC6shGizO0RheKEd+v/h5J3xBOrWvKJDwhhG8W58NLBNW5JUssKw2jPFK/UmbO41DF/pCTscLSChsb0uKkvVCgM/F0TQIDAQABAoIBACJaNOREL0+WUL/lgDII9/RwFE4o0spGuzEo0ZBo3zJtgCGYIiHJFQ10dDaxrM1gcP50gBNdDvyXDuKuTURQmPBr9P+kThOnIO1OKl9dwj3Q22amUX2GOROHfO63p/xRokiMHcr+/mGZbMvYGPTbvReg3O/iDkP29ylWuBirVOyMW83UkMAFQzVVhbQG794yt8Rk2qdWF+toyatLXE6/V7wNp6J1JOnZ8nv5llTMD3Mco7xCr+VTyr5yO3jQD43rEoEQaSQrLOg53gG8rcqbEkJN/5qC+TAIv+AJR9edfk3luXMHhe/5++10O93A+iADSkte0ODQH2hDVDO2wGdxcTkCgYEA4ckCXoxuD4aVNrLQNJZLqibb5nKgX9Y63ft593m3Dd6U5OzLdSU14Ao+VPHVtqFjOtUnHN+iB8sNG6jD96PHra9XyJ1z9X3K4wvBYiFoDAMpcAAVqrDzIoiqMSfw1u1Ct5wz23buHD+YVXDiBHlbWNrDXVsGs9tfeoCz0ZbY708CgYEAyeqk7KDqdsR9fQi86y2E6W1RJ51BtvdgH56FxhJcfC4G6LGHlc+Xto9DIYROn0ViRN4Su1+OZ8mPblKTH3y7qF4Wmcvy0SNQVKuDwRPx8+fF+o0S6Kam7USg0ZfGL7Ui/viyo0pv24BQp6hciI6yXk3sdNAbfTizy8UT9JlAW6MCgYEAqW3ojEC/GoF4mUpHuR6Lewyb+WtM833UQN3EIbRBbHP5sWwMJUUeD5hAPAgZwmmLCAwJxL4AXe6+UGItZDiPz8MDkbSt3qtdw1D/9f5xkIoS30wA9kzAtsptRGPfc7kpVpUtyOOPPL1wN7V0tbzHkn7fGcAD4JWfKVNJHN8gvTsCgYEAoAyqZha3QyVFAxMmDJSsQgswxOHV8R3sx6N0DikHvjcNquztuEYwz7iHUc36NC1fU49j8bowuvv+AUja7Z6FcVQDPi13b2c6iaLacPVKWDdjqtKgJmHS90fq4bgYlEBUWR7xGpYqTCdNx1eg4W2a3T2PLJi48W08t0ykIMJJTVkCgYBrMRVVUtM8U+DLlCtaTnxzaFeJ7a+srgCu6SbGSflSl38nmtv9/YemNg6S/P/Ipo3RxCYQnnrtJ2oCmkQEBTgWEQ40SaE3hrPew5Gj0D7lcXsrqg16KqExuqBE2WeOZt1zdYO+XGLfCDJPWlvkA1iTq8uI9IaWwHbQqsxRKCY4jQ==',
        'log' => [
            'file' => storage_path('logs/alipay.log'),
        ],
    ],
    'wechat' => [
        'app_id' => '',
        'mch_id' => '',
        'key' => '',
        'cert_client' => '',
        'cert_key' => '',
        'log' => [
            'file' => storage_path('logs/wechat_pay.log'),
        ],
    ],
];