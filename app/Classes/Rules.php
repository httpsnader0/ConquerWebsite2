<?php

namespace App\Classes;

class Rules
{
    const MAX_EMAIL = 64;
    const MAX_NAME = 64;
    const MAX_ADDRESS = 255;
    const MAX_DESCRIPTION = 255;
    const MIN_UNIT = 1;
    const MAX_UNIT = 999999999;
    const MIN_PRICE = 0;
    const MAX_PRICE = 999999999999;
    const MAX_IMAGE = 1000;
    const MAX_ICON = 2000;
    const MAX_AVATAR = 1000;
    const MAX_FILE = 20000;
    const MAX_WEIGHT = 999;
    const MAX_HEIGHT = 999;
    const MIN_PASSWORD = 6;
    const MAX_PASSWORD = 16;
    const MIN_QUANTITY = 1;
    const MIN_CALORIES = 0;
    const MAX_CALORIES = 255;
    const MIN_NUTRITION = 0;
    const MAX_NUTRITION = 999999;
    const MIN_DAYS = 1;
    const MAX_DAYS = 31;
    const MIN_USE = 1;
    const MAX_USE = 999999999999;
    const MIN_LATITUDE = -90;
    const MAX_LATITUDE = 90;
    const MIN_LONGITUDE = -180;
    const MAX_LONGITUDE = 180;
    const MAX_DEVICE_Id = 255;
    const MAX_CARD_QUANTITY = 9999999999;
    const MAX_OTP = 4;
}
