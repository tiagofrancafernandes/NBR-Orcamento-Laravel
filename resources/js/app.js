import Alpine from "alpinejs";
import Tooltip from "@ryangjchandler/alpine-tooltip";
import AlpineFloatingUI from '@awcodes/alpine-floating-ui'
import NotificationsAlpinePlugin from '../../vendor/filament/notifications/dist/module.esm'

Alpine.plugin(AlpineFloatingUI);
Alpine.plugin(NotificationsAlpinePlugin);
Alpine.plugin(Tooltip);

window.Alpine = Alpine;
window.Alpine.start();

import './bootstrap';
