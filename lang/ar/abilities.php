<?php

use App\Enums\AbilityEnum;

$index = 'عرض';
$create = 'إضافة';
$update = 'تعديل';
$delete = 'حذف';
$show = 'عرض البيانات';
$changeStatus = 'تغيير الحالة';

return [

    AbilityEnum::ROLES_INDEX->value => $index,
    AbilityEnum::ROLES_CREATE->value => $create,
    AbilityEnum::ROLES_UPDATE->value => $update,
    AbilityEnum::ROLES_DELETE->value => $delete,
    AbilityEnum::ROLES_SHOW->value => $show,

    AbilityEnum::ADMINS_INDEX->value => $index,
    AbilityEnum::ADMINS_CREATE->value => $create,
    AbilityEnum::ADMINS_UPDATE->value => $update,
    AbilityEnum::ADMINS_DELETE->value => $delete,
    AbilityEnum::ADMINS_SHOW->value => $show,
    AbilityEnum::ADMINS_CHANGE_STATUS->value => $changeStatus,

    AbilityEnum::SETTINGS_INDEX->value => $index,

    AbilityEnum::EVENTS_INDEX->value => $index,
    AbilityEnum::EVENTS_CREATE->value => $create,
    AbilityEnum::EVENTS_UPDATE->value => $update,
    AbilityEnum::EVENTS_DELETE->value => $delete,
    AbilityEnum::EVENTS_SHOW->value => $show,
    AbilityEnum::EVENTS_CHANGE_STATUS->value => $changeStatus,

    AbilityEnum::BLOGS_INDEX->value => $index,
    AbilityEnum::BLOGS_CREATE->value => $create,
    AbilityEnum::BLOGS_UPDATE->value => $update,
    AbilityEnum::BLOGS_DELETE->value => $delete,
    AbilityEnum::BLOGS_SHOW->value => $show,
    AbilityEnum::BLOGS_CHANGE_STATUS->value => $changeStatus,

    AbilityEnum::MEDIA_INDEX->value => $index,
    AbilityEnum::MEDIA_CREATE->value => $create,
    AbilityEnum::MEDIA_UPDATE->value => $update,
    AbilityEnum::MEDIA_DELETE->value => $delete,
    AbilityEnum::MEDIA_SHOW->value => $show,
    AbilityEnum::MEDIA_CHANGE_STATUS->value => $changeStatus,

];
