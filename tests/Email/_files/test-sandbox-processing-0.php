<?php

declare(strict_types=1);

// Stored result from Litmus API for a test in sandbox mode, 2022-10-23
// State: processing; test email details are populated; 0 test client have completed

return (object)[
    'Html' => null,
    'ID' => 64556223,
    'InboxGUID' => 'gvn1lfg.api',
    'Results' => [
        (object)[
            'ApplicationLongName' => 'Gmail (Edge)',
            'ApplicationName' => 'gmailnew',
            'AverageTimeToProcess' => 34,
            'BusinessOrPopular' => false,
            'Completed' => false,
            'DesktopClient' => false,
            'FoundInSpam' => false,
            'FullpageImage' => 's3.amazonaws.com',
            'FullpageImageContentBlocking' => 's3.amazonaws.com',
            'FullpageImageNoContentBlocking' => 's3.amazonaws.com',
            'FullpageImageThumb' => 's3.amazonaws.com',
            'FullpageImageThumbContentBlocking' => 's3.amazonaws.com',
            'FullpageImageThumbNoContentBlocking' => 's3.amazonaws.com',
            'Id' => 3409097539,
            'PlatformLongName' => 'Web-based',
            'PlatformName' => 'Web-based',
            'RenderedHtmlUrl' => null,
            'ResultType' => 'email',
            'SpamHeaders' => [],
            'SpamScore' => 0.0,
            'State' => 'pending',
            'Status' => 0,
            'SupportsContentBlocking' => true,
            'WindowImage' => 's3.amazonaws.com',
            'WindowImageContentBlocking' => 's3.amazonaws.com',
            'WindowImageNoContentBlocking' => 's3.amazonaws.com',
            'WindowImageThumb' => 's3.amazonaws.com',
            'WindowImageThumbContentBlocking' => 's3.amazonaws.com',
            'WindowImageThumbNoContentBlocking' => 's3.amazonaws.com',
        ],
        (object)[
            'ApplicationLongName' => 'SpamAssassin',
            'ApplicationName' => 'spamassassin3',
            'AverageTimeToProcess' => 368,
            'BusinessOrPopular' => false,
            'Completed' => false,
            'DesktopClient' => false,
            'FoundInSpam' => false,
            'FullpageImage' => 's3.amazonaws.com',
            'FullpageImageContentBlocking' => 's3.amazonaws.com',
            'FullpageImageNoContentBlocking' => 's3.amazonaws.com',
            'FullpageImageThumb' => 's3.amazonaws.com',
            'FullpageImageThumbContentBlocking' => 's3.amazonaws.com',
            'FullpageImageThumbNoContentBlocking' => 's3.amazonaws.com',
            'Id' => 3409097538,
            'PlatformLongName' => 'Hosted or server-based',
            'PlatformName' => 'Hosted',
            'RenderedHtmlUrl' => null,
            'ResultType' => 'spam',
            'SpamHeaders' => [],
            'SpamScore' => 0.0,
            'State' => 'pending',
            'Status' => 0,
            'SupportsContentBlocking' => false,
            'WindowImage' => 's3.amazonaws.com',
            'WindowImageContentBlocking' => 's3.amazonaws.com',
            'WindowImageNoContentBlocking' => 's3.amazonaws.com',
            'WindowImageThumb' => 's3.amazonaws.com',
            'WindowImageThumbContentBlocking' => 's3.amazonaws.com',
            'WindowImageThumbNoContentBlocking' => 's3.amazonaws.com',
        ],
    ],
    'Sandbox' => true,
    'Source' => 'https://s3.amazonaws.com/sitevista/6ece85e6-040a-4d67-8971-bf12db9add9f',
    'State' => 'processing',
    'Subject' => 'Reseller SDK sample',
    'TestType' => 'email',
    'UserGuid' => null,
    'ZipFile' => 'http://zip.litmus.com/resellers/?guid=356447df-edfb-4831-812a-eee2e102ce3c',
];
