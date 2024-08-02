// CREATE APP
import { createApp, h } from "vue";
import { createInertiaApp, Head, Link } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";

// PRIMEVUE
import PrimeVue from "primevue/config";
import ToastService from "primevue/toastservice";
import ConfirmationService from "primevue/confirmationservice";
import FocusTrap from "primevue/focustrap";
import Tooltip from "primevue/tooltip";
import Button from "primevue/button";
import ScrollPanel from "primevue/scrollpanel";
import Sidebar from "primevue/sidebar";
import Menu from "primevue/menu";
import Avatar from "primevue/avatar";
import Badge from "primevue/badge";
import Tag from "primevue/tag";
import TabMenu from "primevue/tabmenu";
import InputText from "primevue/inputtext";
import Textarea from "primevue/textarea";
import Dialog from 'primevue/dialog';
import AppHead from "@/Components/Shared/AppHead.vue";
import Panel from "@/Components/Shared/Panel.vue";
import ActionButton from "@/Components/Action/ActionButton.vue";
import Anchor from "@/Components/Shared/Anchor.vue";
import "../css/tailwind.css";
import "../css/theme.css";
import "primeicons/primeicons.css";
import "../css/primevue.scss";
import "../css/app.scss";

// LAYOUTS
import DashboardLayout from "./Layouts/Dashboard/Layout.vue";
import DashboardAuthLayout from "./Layouts/Dashboard/Auth.vue";
import WebsiteLayout from "./Layouts/Website/Layout.vue";

// LANGUAGES
import { createI18n } from "vue-i18n";
import localeAr from "./Lang/ar.js";
import localeEn from "./Lang/en.js";

// DIRECTIVE
import { abilityIf, abilityElse } from "./Classes/AbilityDirective.js";

// COMPONENETS
import { ZiggyVue } from "ziggy-js";
import { Ziggy } from "./ziggy.js";
import RouterLink from "./Components/Shared/RouterLink.vue";
import { VueRecaptchaPlugin } from "vue-recaptcha/head";
import AosVue from "aos-vue";

createInertiaApp({
    title: (title) => title,
    resolve: (name) => {
        const page = resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob("./Pages/**/*.vue")
        );

        page.then((module) => {
            if (name.startsWith("Dashboard/Auth")) {
                return (module.default.layout = DashboardAuthLayout);
            }

            if (name.startsWith("Dashboard")) {
                return (module.default.layout = DashboardLayout);
            }

            if (name.startsWith("Website")) {
                return (module.default.layout = WebsiteLayout);
            }
        });

        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(
                createI18n({
                    legacy: false,
                    locale: props.initialPage.props.locale,
                    messages: {
                        ar: localeAr,
                        en: localeEn,
                    },
                })
            )
            .use(ZiggyVue, Ziggy)
            .use(PrimeVue, {
                ripple: true,
            })
            .use(ToastService)
            .use(ConfirmationService)
            .use(VueRecaptchaPlugin, {
                v3SiteKey: "6Le6ShMqAAAAAFqEuwQm5YCEoOvtn8iYY8h1m-D4",
            })
            .use(AosVue)
            .directive("focustrap", FocusTrap)
            .directive("tooltip", Tooltip)
            .directive("ability", abilityIf)
            .directive("else-ability", abilityElse)
            .component("ScrollPanel", ScrollPanel)
            .component("Sidebar", Sidebar)
            .component("Button", Button)
            .component("Menu", Menu)
            .component("Avatar", Avatar)
            .component("Badge", Badge)
            .component("Tag", Tag)
            .component("TabMenu", TabMenu)
            .component("InputText", InputText)
            .component("Textarea", Textarea)
            .component("Head", Head)
            .component("Link", Link)
            .component("router-link", RouterLink)
            .component("Icon", FontAwesomeIcon)
            .component("AppHead", AppHead)
            .component("Panel", Panel)
            .component("ActionButton", ActionButton)
            .component("Anchor", Anchor)
            .component("Dialog", Dialog)
            .mixin({
                methods: {
                    asset(path) {
                        return props.initialPage.props.assetUrl + path;
                    },
                    isEmpty(obj) {
                        for (const prop in obj) {
                            if (Object.hasOwn(obj, prop)) {
                                return false;
                            }
                        }

                        return true;
                    },
                },
            })
            .mount(el);
    },
});

// FONT AWESOME ICON
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import { library } from "@fortawesome/fontawesome-svg-core";
import {
    faHouse,
    faLanguage,
    faSun,
    faMoon,
    faUserPlus,
    faDownload,
    faCartShopping,
    faTrophy,
    faGifts,
    faNewspaper,
    faImages,
    faHeadset,
    faLockOpen,
    faArrowLeft,
    faArrowRight,
    faBars,
    faBell,
    faUser,
    faUsers,
    faCogs,
    faUserShield,
    faLock,
    faRightFromBracket,
    faPlus,
    faEllipsisVertical,
    faFileExcel,
    faEdit,
    faTrash,
    faInfoCircle,
    faCog,
    faSearch,
    faFilter,
    faSpinner,
    faChevronDown,

} from "@fortawesome/free-solid-svg-icons";
import {
    faFacebook,
    faTwitter,
    faInstagram,
    faYoutube,
    faTiktok,
} from "@fortawesome/free-brands-svg-icons";
library.add(
    faHouse,
    faLanguage,
    faSun,
    faMoon,
    faUserPlus,
    faDownload,
    faCartShopping,
    faTrophy,
    faGifts,
    faNewspaper,
    faImages,
    faHeadset,
    faLockOpen,
    faArrowLeft,
    faArrowRight,
    faBars,
    faBell,
    faUser,
    faUsers,
    faCogs,
    faUserShield,
    faLock,
    faRightFromBracket,
    faPlus,
    faEllipsisVertical,
    faFileExcel,
    faEdit,
    faTrash,
    faInfoCircle,
    faCog,
    faSearch,
    faFilter,
    faSpinner,
    faChevronDown,

    faFacebook,
    faTwitter,
    faInstagram,
    faYoutube,
    faTiktok
);
