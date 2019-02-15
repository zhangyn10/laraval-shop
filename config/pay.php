<?php
return [
    'alipay' => [
        'app_id' => '2016080300153264',
        'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAuc1PzJ2xToHgmTy1XRDzaitcWeq7903xs4K31RopfFpTN2j2qwzH8D7eS/O+rccyZslYfOyD+w4TpxpXtNaM87/Zcrk9iN0nGa1N2+NKkeyOHaDa2t5GnYSQIssKauQ+IpXYSyBMOGglZcAUp/L9TanAZYmFpNX/7w4VG7CnbYKPYM636msq+2s17Yc35dO7PgV34C1UGYPg9XCldw1Q0DO9LOYVWz8Z5JZeNaKbYrXx8qKe/Vnh/U8Z2QZ3vtBPwQoftwt6T5RhBK68xk3tmoVzOWLU7Hn+y+AA2jV/iYHWk0xe5fsVI6KpW1QiE5rVZ0C0O0wsnpujRCjPmWFHSQIDAQAB',
        'private_key' => 'MIIEpAIBAAKCAQEAvLePEcI7muEBUiXquAmhQVyq0kedeih2n984oGK4GYxPUwVCP80aZXYsgwJR8MjBI4noUm+szCBcMlz9o31nHxI84rzTLxxB+en/XX/AXt35KR1f12HpYhClL7OF/EDDD/vFYjUP+C6IOzOUR5PX6ZfyF30NaM3e1iGbE+1vvFzv7stE76BxrkoHA+T5E0bRykBEkCa80/PExVat7J8e+OXbFvtxBVtovVx6g9Q/jxdoTXl9+XKjaAfGW7OauihcxkBXIwq8SwCHSkmVeED/Q/Gpoo3mz3SiweFI37dWzvdLkLG7cwzevXPku8yTV6JELSUBTOSPyWtgbtgkM5UfwwIDAQABAoIBABwhXIEwK8Rdb9336vH99XyRvKDVrgKsj2orUvyNWpXsVVKxwPtTrnCbWe05Zk93DVsnzmqjXOWcmUGknOZG5h06kbrWnMAz/R2spLUiOuGpQt+/Ei8/2BMXGhhvMTS1zp3OUNDfyf6bqRDyElNNFW0rihm4OUx7C5FttvkUdohkLDadi3oG26u+eWOLuitgAdw0dIVS/zyYUx5nEHF7ZjvEDS1DTaM3ojJp2rDdBImaNVmGNRi7QQW5bK6ZCkYZjwC/zRy+wZOw+CP3o7UB+LB3TElJp/XN4abH0kJEcO73Nu8Q2ibqR676rbayi+a7lYlvAn7tPq5kkR0mHkuOUsECgYEA9FOn8ruG3VAotaRLeodM/00t0enwCnrkza9kQ0FluZaEE5eoPurCkv8C1xy+08hA3ppQCjzSXKQJ48pJ3LcJkFXHnD3vljel1HaOi6B+mcOPZl8uU97vPg4zPpiQnU728tTzAmbDVa00lYTmJLIuQS7kaNQM/poxUSp3qqI7PqMCgYEAxbu+ZuQIqKk7GbZ3nkddmyMnPGI/6AA73Mhf0/lLRolKF1Y48MladJKqHLbwYeGMRfCZTnK+eK/1ioR5ktkrgWfGzKXZjF6aCpBw6X0Lfbrf3xdMJjpLExTCHMbOK+bhMOuMlhieX2PioRHxmzAlNIVTmKg6ZdL6PIFFoQPuTGECgYEA4dIUT7BtpU36YnB45sX5L5qI+BRtrXIK2eT7GYJvYAozBtzMP2LB9hVG7cV+xsW210fvJJc0ozVmgqisfhia+VGfTdSdBc1nMylk9L6hZMMwXiEo85IAs+1yBbADMbITYzvZY2XRsvWEvZF5GX+qasrJh+4+GHAxluBWfFq3wVsCgYEAkmTapgDEbGLGz9WpIDVEF1ziarFvEQxDRcXQNPdIBRQWF8sNYzAgWVhQu+uxczZzDUEBr/QCEwZraz+DZvaEYE1+APv1YhiUQagJAMVEobSelOQBy/eyp5Dh2j5SXGyWYwqxzlqxvnwMSSYo07XEhesEJmy+t66I+AzZiUmIv2ECgYByfOjUIno2VjH9fScsG05GeDiM9/pQkdurcYAd3x4c5FVN8DvzpoEktf95IhstQv1dt4vfltqSZrnDuFjRF9TUlrlY+Bkp97qCiPzINLCOqqrtSnBio6zk9k6uY/bfovJC4K6Sa8DcNYKbdirGZdPZbTQLG9k4nN7H98Z5mIzUnA==',
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