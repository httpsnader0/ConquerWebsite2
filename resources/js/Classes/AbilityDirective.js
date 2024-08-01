import { usePage } from "@inertiajs/vue3";

export const abilityIf = {
    beforeMount: (el, binding, vnode) => {
        if (!checkAbility(binding.value)) {
            el.classList.add("hidden");
            vnode.children?.map((item) => item.el.remove());
        }
    },
};

export const abilityElse = {
    beforeMount: (el, binding, vnode) => {
        if (checkAbility(binding.value)) {
            el.classList.add("hidden");
            vnode.children?.map((item) => item.el.remove());
        }
    },
};

function checkAbility(abilities) {
    if (Array.isArray(abilities)) {
        let result = true;
        for (const abilityKey in abilities) {
            let item = abilities[abilityKey];
            if (Array.isArray(item)) {
                let temp_result = false;
                for (const itemKey in item) {
                    temp_result = temp_result || isValidAbility(item[itemKey]);
                }
                result = result && temp_result;
            } else {
                result = result && isValidAbility(item);
            }
        }
        return result;
    } else {
        return isValidAbility(abilities);
    }
}

function isValidAbility(ability) {
    const permissions = usePage().props.permissions;
    return permissions[0] === "*" || permissions.includes(ability);
}
