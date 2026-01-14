<?php
declare(strict_types=1);

/**
 * (c) 2025 MayMeow. All rights reserved.
 *
 * NOTICE: This file is subject to the terms of the "LICENSE-COMMERCIAL" file
 * found in the root directory of this distribution.
 * Unlike the rest of this project, this specific file is NOT open source.
 * It is governed by the Proprietary License linked above.
 *
 * UNAUTHORIZED COPYING, MODIFICATION, OR BYPASSING OF THIS CODE IS STRICTLY PROHIBITED.
 */
namespace App\Service;

class LicenseService
{
    protected array $applicationKey = [
        48, 89, 48, 19, 6, 7, 42, 134, 72, 206, 61, 2, 1, 6, 8, 42, 134, 72, 206, 61,
        3, 1, 7, 3, 66, 0, 4, 251, 128, 214, 59, 121, 225, 237, 113, 119, 201, 76, 106,
        57, 25, 181, 64, 126, 148, 34, 8, 231, 128, 78, 147, 17, 79, 21, 127, 187, 5, 7,
        1, 83, 211, 55, 228, 92, 185, 148, 139, 247, 32, 186, 236, 74, 28, 74, 139, 198,
        246, 1, 121, 98, 21, 83, 131, 200, 2, 156, 88, 31, 143, 71, 96
    ];

    public function isValid()
    {
        return true;
    }

}