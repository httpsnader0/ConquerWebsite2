<?php

use App\Enums\AbilityEnum;

$index = 'Index';
$create = 'Create';
$update = 'Edit';
$delete = 'Delete';
$show = 'Show Details';
$changeStatus = 'Change Status';

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

];
